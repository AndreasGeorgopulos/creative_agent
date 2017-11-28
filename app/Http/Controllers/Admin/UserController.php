<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller implements ICrud
{
    public function index () {
        return view('admin.user.index');
    }

    // GET /admin/user
    // felhasználó adatok lekérése
    public function read($page_index = -1, $searchText = '')
    {
        $limit = $page_index >= 0 ? config('creative_agent.pager.users') : 100000;
        $offset = $page_index >= 0 ? $page_index * $limit : 0;

        $fields = [
            'users.*',
            DB::raw('LOWER(COALESCE(GROUP_CONCAT(DISTINCT jobs.id ORDER BY jobs.id ASC SEPARATOR \',\'), \'\')) AS jobs_ids'),
            DB::raw('LOWER(COALESCE(GROUP_CONCAT(DISTINCT jobs.name ORDER BY jobs.name ASC SEPARATOR \', \'), \'\')) AS jobs_title'),
        ];

        $where = '1 = 1';
        if ($searchText != '') {
            $searchCriterias = [
                'users.name LIKE \'%' . $searchText . '%\'',
                'users.email LIKE \'%' . $searchText . '%\'',
                'jobs.name LIKE \'%' . $searchText . '%\''
            ];
            $where .= ' and (' . implode(' or ', $searchCriterias) . ')';
        }

        $total = User::selectRaw('count(distinct(users.id)) as total')
            ->leftJoin('users_join_jobs', 'users_join_jobs.user_id', '=', 'users.id')
            ->leftJoin('jobs', 'jobs.id', '=', 'users_join_jobs.job_id')
            ->whereRaw($where)
            ->first()
            ->total;

        $data = User::select($fields)
            ->leftJoin('users_join_jobs', 'users_join_jobs.user_id', '=', 'users.id')
            ->leftJoin('jobs', 'jobs.id', '=', 'users_join_jobs.job_id')
            ->whereRaw(DB::raw($where))
            ->groupBy('users.id')
            ->orderBy('users.name', 'asc')
            ->offset($offset)
            ->limit($limit)
            ->get();

        return response()->json([
            'data' => $data,
            'total' => $total,
            'limit' => $limit
        ]);
    }

    // POST /admin/user
    // új felhasználó létrehozása
    public function create(Request $request)
    {
        return $this->save($request, new User());
    }

    // PUT /admin/user
    // felhasználó módosítása
    public function update(Request $request)
    {
        if (!$user = User::find($request->get('id'))) {
            return response()->json(null, 401);
        }
        return $this->save($request, $user);
    }

    // DELETE /admin/user
    // felhasználó törlése
    public function delete($id)
    {
        if (!$user = User::find($id)) {
            return response()->json(null, 401);
        }
        $user->delete();
        return response()->json(null, 204);
    }

    // felhasználó mentése
    private function save (Request $request, User $user) {
        // adatok ellenőrzése
        $rules = $this->getRules($user);
        $v = Validator::make($request->all(), $rules);
        if ($v->fails()) {
            return response()->json(['messages' => $v->messages()], 500);
        }

        // adatok beállítása és mentés
        foreach ($rules as $key => $v) {
            if ($key == 'job_ids') continue;

            $value = $request->get($key);
            if ($key == 'password') {
                $user->$key = $user->id && $value == '' ? $user->password : bcrypt($value);
            }
            else {
                $user->$key = strip_tags($value);
            }
        }
        $user->save();

        // munkakörök mentése
        $user->setJobs($request->get('job_ids'));

        // json kimenet
        return response()->json(['data' => $user], 201);
    }

    // form validator szabályok
    private function getRules (User $user) {
        return [
            'name' => 'required|max:100',
            'email' => 'required|max:255|email|unique:users,email' . ($user->id ? ',' . $user->id : ''),
            'password' => (!$user->id ? 'required|' : '') . 'same:password_confirmation',
            'job_ids' => 'required|array|min:1'
        ];
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class JobController extends Controller implements ICrud
{
    public function index () {
        return view('admin.job.index');
    }

    // GET /admin/job
    // munkakör adatok lekérése
    public function read($page_index = -1)
    {
        $limit = $page_index >= 0 ? config('creative_agent.pager.job') : 100000;
        $offset = $page_index >= 0 ? $page_index * $limit : 0;
        $total = Job::selectRaw('count(id) as total')->first()->total;
        $data = Job::orderBy('name', 'asc')->offset($offset)->limit($limit)->get();
        return response()->json([
            'data' => $data,
            'total' => $total,
            'limit' => $limit
        ]);
    }

    // POST /admin/job
    // új munkakör létrehozása
    public function create(Request $request)
    {
        return $this->save($request, new Job());
    }

    // PUT /admin/job
    // munkakör módosítása
    public function update(Request $request)
    {
        if (!$job = Job::find($request->get('id'))) {
            return response()->json(null, 401);
        }
        return $this->save($request, $job);
    }

    // DELETE /admin/job
    // munkakör törlése
    public function delete($id)
    {
        if (!$job = Job::find($id)) {
            return response()->json(null, 401);
        }
        $job->delete();
        return response()->json(null, 204);
    }

    // munkakör mentése
    private function save (Request $request, Job $job) {
        // adatok ellenőrzése
        $rules = $this->getRules();
        $v = Validator::make($request->all(), $rules);
        if ($v->fails()) {
            return response()->json($v->messages(), 500);
        }

        // adatok beállítása és mentés
        foreach ($rules as $key => $value) {
            $job->$key = strip_tags($request->get($key));
        }
        $job->save();

        // json kimenet
        return response()->json(['data' => $job], 201);
    }

    // form validator szabályok
    private function getRules () {
        return [
            'name' => 'required|max:100',
            'description' => 'required|max:500',
        ];
    }
}

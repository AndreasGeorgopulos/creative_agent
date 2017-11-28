<?php

/*SELECT
jobs.id,
jobs.name,
ROUND((COUNT(users_join_jobs.user_id) * 100) / (SELECT COUNT(*) FROM users_join_jobs)) AS user_percents
FROM jobs
LEFT JOIN users_join_jobs ON users_join_jobs.job_id = jobs.id
GROUP BY jobs.id
HAVING user_percents >= 1*/

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller {
    public function index () {
        return view('admin.dashboard', [
            'job_statistics' => DB::table('jobs')
                    ->select(DB::raw('jobs.id, jobs.name, 
                    ROUND((COUNT(users_join_jobs.user_id) * 100) / (SELECT COUNT(*) FROM users_join_jobs)) AS user_percents'
                    ))->leftJoin('users_join_jobs', 'users_join_jobs.job_id', '=', 'jobs.id')
                    ->groupBy(DB::raw('jobs.id'))
                    ->havingRaw('user_percents >= 1')
                    ->get()
        ]);
    }

}

?>
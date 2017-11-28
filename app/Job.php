<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Job extends Model
{

    // delete metódus felülírása
    public function delete () {
        if ($this->id) {
            DB::table('users_join_jobs')->where('job_id', $this->id)->delete();
            parent::delete();
        }
    }
}

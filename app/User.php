<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    // felhasználóhoz rendelt munkakörök beállítása
    public function setJobs (array $ids) {
        $this->clearJobs();
        foreach ($ids as $job_id) {
            if (is_numeric($job_id))
                DB::table('users_join_jobs')->insert(['user_id' => $this->id, 'job_id' => $job_id]);
        }
    }

    // felhasználóhoz rendelt munkakörök törlése
    private function clearJobs () {
        DB::table('users_join_jobs')->where('user_id', $this->id)->delete();
    }

    // delete metódus felülírása
    // csak deletable = 1 esetén törölhető
    public function delete () {
        if ($this->id && $this->deletable == '1') {
            $this->clearJobs();
            parent::delete();
        }
    }
}

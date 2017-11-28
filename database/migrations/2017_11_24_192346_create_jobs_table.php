<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    private $table = 'jobs';
    private $join_table = 'users_join_jobs';

    public function up()
    {
        // job tábla létrehozása
        Schema::create($this->table, function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100)->default('');
            $table->text('description');
            $table->timestamps();
        });

        // job tábla feltöltése teszt munkakörökkel
        for ($i = 1; $i <= 5; $i++) {
            $now = date('Y-m-d H:i:s');
            DB::table($this->table)->insert([
                'name' => 'Job ' . ($i < 10 ? '0' : '') . $i,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        // kapcsoló tábla létrehozása
        Schema::create($this->join_table, function (Blueprint $table) {
            $table->integer('user_id');
            $table->integer('job_id');
            $table->primary(['user_id', 'job_id']);
        });

        // munkakörök random hozzárendelése dolgozókhoz
        for ($i = 1; $i <= 20; $i++) {
            for ($j = 1; $j <= rand(1, 5); $j++) {
                DB::table($this->join_table)->insert(['user_id' => $i, 'job_id' => $j]);
            }
        }
    }

    public function down()
    {
        // job, users_join_jobs táblák eldobása
        Schema::dropIfExists($this->table);
        Schema::dropIfExists($this->join_table);
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    protected $table = 'users';

    public function up()
    {
        // users tábla létrehozása
        Schema::create($this->table, function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->enum('deletable', ['0', '1'])->default('1');
            $table->rememberToken();
            $table->timestamps();
        });

        // felhasználók felvétele
        $now = date('Y-m-d H:i:s');
        DB::table($this->table)->insert([
            'name' => 'System administrator',
            'email' => 'admin@creative-agent.hu',
            'password' => bcrypt('123456'),
            'deletable' => '0',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        for ($i = 1; $i <= 20; $i++) {
            $title = ($i < 10 ? '0' : '') . $i;
            $now = date('Y-m-d H:i:s');
            DB::table($this->table)->insert([
                'name' => 'User ' . $title,
                'email' => 'user' . $title . '@creative-agent.hu',
                'password' => bcrypt('123456'),
                'deletable' => '1',
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }

    public function down()
    {
        // users tábla eldobása
        Schema::dropIfExists($this->table);
    }
}

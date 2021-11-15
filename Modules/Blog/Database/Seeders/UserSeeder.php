<?php

namespace Modules\Blog\Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('users')->insert([
            'name' => 'TestUser',
            'email' => 'testuser@google.com',
            'password' => bcrypt('testpassword'),
        ]);
        DB::table('users')->insert([
            'name' => 'SuperAdmin',
            'email' => 'admin@mail.ru',
            'password' => bcrypt('qwerty'),
        ]);

    }
}

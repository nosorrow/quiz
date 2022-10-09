<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

         \App\Models\User::factory()->create([
             'name' => 'Администратор',
             'email' => 'admin@gmail.com',
             'role_id'=>1,
             'email_verified_at' => now(),
             'password' => bcrypt('1'), // password
             'remember_token' => Str::random(10),
         ]);

        \App\Models\User::factory(3)->create();

        DB::table('roles')
            ->insert([
                ['name'=>'admin'],
                ['name'=>'manager'],
                ['name'=>'user'],
            ]);

    }
}

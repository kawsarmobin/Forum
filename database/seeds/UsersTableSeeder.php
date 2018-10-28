<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        App\User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'admin' => 1,
            'avatar' => asset('avatars/default.png'),
        ]);

        App\User::create([
            'name' => 'Kawsar Mobin',
            'email' => 'kawsar@gmail.com',
            'password' => bcrypt('123456'),
            'avatar' => asset('avatars/default.png'),
        ]);
    }
}

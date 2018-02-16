<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name' => 'Domingo',
            'username' => 'p4pu',
            'email' => 'p4pupro@gmail.com',
            'password' => bcrypt('123456'),
            'admin' => true
        ]);
    }
}

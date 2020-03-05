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
    
        $user = new User;
        $user->name = 'Admin';
        $user->email = 'admin@yahoo.com';
        $user->role_id = 2; // admin
        $user->street_and_house = 'Street 505';
        $user->phone = '112233';
        $user->password = bcrypt('password');
        $user->save();

    }
}

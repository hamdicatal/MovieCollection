<?php

use Illuminate\Database\Seeder;

// for using and creating User and Role models here
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $allUsers = User::all();
        User::truncate(); // delete all datas from Users table when UsersTableSeeder run

        // detach all relations
        foreach ($allUsers as $user) {
            $user->roles()->detach();
        }

        // get admin and user roles from Roles table
        $adminRole = Role::where('name', 'admin')->first();
        $userRole = Role::where('name', 'user')->first();

        // creating some users for testing purpose
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin123')
        ]);

        $user = User::create([
            'name' => 'user',
            'email' => 'user@user.com',
            'password' => bcrypt('user1234')
        ]);

        // attaching roles to created users
        $admin->roles()->attach($adminRole);
        $user->roles()->attach($userRole);
    }
}

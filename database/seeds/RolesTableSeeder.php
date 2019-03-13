<?php

use Illuminate\Database\Seeder;
use App\Role; // for using and creating Role model here

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate(); // delete all datas from Roles table when RolesTableSeeder run

        // creating some roles for testing purpose
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'user ']);
    }
}

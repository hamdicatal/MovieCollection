<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // for running easily with 'php artisan db:seed' command
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}

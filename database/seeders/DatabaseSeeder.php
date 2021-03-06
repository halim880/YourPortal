<?php

namespace Database\Seeders;

use Database\Seeders\Permission\RolesTableSeeder;
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
        $this->call([
            PackageTableSeeder::class,
            UsersTableSeeder::class,
            ClientTableSeeder::class,
            TaskTableSeeder::class,
            MemberUserSeeder::class,
        ]);
    }
}

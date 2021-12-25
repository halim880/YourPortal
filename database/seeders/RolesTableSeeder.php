<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();
        Role::create(['name'=> 'admin']);
        Role::create(['name'=> 'bussiness']);
        Role::create(['name'=> 'client']);
        Role::create(['name'=> 'user']);
    }
}

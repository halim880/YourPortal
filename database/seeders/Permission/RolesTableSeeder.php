<?php

namespace Database\Seeders\Permission;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Role::truncate();
        
        Role::create(['name'=> 'super_admin']);
        Role::create(['name'=> 'admin']);
        Role::create(['name'=> 'user']);
        Role::create(['name'=> 'client']);
        
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}

<?php

namespace Database\Seeders;

use App\Helpers\UserRole;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        User::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        
        $user = User::create([
            'name'=> "Test User",
            'email'=> 'system@admin.com',
            'password'=> bcrypt('password'),
        ]);
        $user->assignRole(UserRole::SYSTEM_ADMIN);
    }
}

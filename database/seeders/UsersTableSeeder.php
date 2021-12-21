<?php

namespace Database\Seeders;

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

        Role::firstOrCreate(['name'=> 'super_admin']);
        
        $user = User::create([
            'name'=> "Super admin",
            'email'=> 'super@admin.com',
            'password'=> bcrypt('password'),
        ]);
        $user->assignRole('super_admin');
    }
}

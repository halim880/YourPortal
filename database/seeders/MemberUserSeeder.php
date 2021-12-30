<?php

namespace Database\Seeders;

use App\Models\Member;
use App\Models\User;
use Illuminate\Database\Seeder;

class MemberUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'email'=> 'member.user@gmail.com',
            'name'=> 'Member user',
            'password'=> bcrypt('password')
        ]);
        $user->assignRole('user');
        $user->members()->attach(1);
    }
}

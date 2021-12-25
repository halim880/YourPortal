<?php

namespace Database\Seeders;

use App\Models\Member;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('set foreign_key_checks = 0');
        Member::truncate();
        DB::statement('set foreign_key_checks = 1');

        $user = User::factory()->create(['email'=>'member@gmail.com']);
        $member = Member::factory()->create();

        $user->assignRole('admin');
        $user->members()->attach($member->id);
    }
}

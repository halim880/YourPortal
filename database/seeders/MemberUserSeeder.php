<?php

namespace Database\Seeders;

use App\Helpers\UserRole;
use App\Models\Member;
use App\Models\Package;
use App\Models\Plan;
use App\Models\Subscription;
use App\Models\User;
use App\Services\SubscriptionService;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemberUserSeeder extends Seeder
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

        $member = Member::factory()->create(['id'=> 1]);
        $package = Package::first();

        SubscriptionService::createSubscription($member, $package);

        $user = User::create([
            'email'=> 'member.super@admin.com',
            'name'=> 'Test User 2',
            'password'=> bcrypt('password')
        ]);
        $user->assignRole(UserRole::MEMBER_SUPER_ADMIN);
        $user->members()->attach(1);

        $user = User::create([
            'email'=> 'member@admin.com',
            'name'=> 'Test User 3',
            'password'=> bcrypt('password')
        ]);
        $user->assignRole(UserRole::MEMBER_ADMIN);
        $user->members()->attach(1);

        $user = User::create([
            'email'=> 'member@user.com',
            'name'=> 'Test User 4',
            'password'=> bcrypt('password')
        ]);
        $user->assignRole(UserRole::MEMBER_USER);
        $user->members()->attach(1);
    }
}

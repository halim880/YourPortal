<?php

namespace Database\Seeders;

use App\Helpers\PackageType;
use App\Helpers\RenewalType;
use App\Helpers\SubscriptionType;
use App\Models\Package;
use Illuminate\Database\Seeder;

class PackageTableSeeder extends Seeder
{
    const MAX_VALUE = 99999999;
    public function run()
    {
        Package::create([
            'name'=> PackageType::FREE_TRIAL,
            'renewal' => RenewalType::MONTHLY,
            'day_limit' => 90,
            'price' => 0,
            'admin_limit' => self::MAX_VALUE,
            'user_limit' => self::MAX_VALUE,
        ]);

        Package::create([
            'name'=> PackageType::FREE_TRIAL,
            'renewal' => RenewalType::MONTHLY,
            'day_limit' => 30,
            'price' => 25,
            'admin_limit' => self::MAX_VALUE,
            'user_limit' => self::MAX_VALUE,
        ]);

        Package::create([
            'name'=> PackageType::PRO,
            'renewal' => RenewalType::MONTHLY,
            'day_limit' => 30,
            'price' => 25,
            'admin_limit' => self::MAX_VALUE,
            'user_limit' => self::MAX_VALUE,
        ]);

        Package::create([
            'name'=> PackageType::PRO,
            'renewal' => RenewalType::YEARLY,
            'day_limit' => 365,
            'price' => 240,
            'admin_limit' => self::MAX_VALUE,
            'user_limit' => self::MAX_VALUE,
        ]);

        Package::create([
            'name'=> PackageType::GOLDEN,
            'renewal' => RenewalType::MONTHLY,
            'day_limit' => 30,
            'price' => 20,
            'admin_limit' => 1,
            'user_limit' => 5,
        ]);

        Package::create([
            'name'=> PackageType::GOLDEN,
            'renewal' => RenewalType::YEARLY,
            'day_limit' => 365,
            'price' => 180,
            'admin_limit' => 1,
            'user_limit' => 5,
        ]);

        Package::create([
            'name'=> PackageType::SILVER,
            'renewal' => RenewalType::MONTHLY,
            'day_limit' => 30,
            'price' => 15,
            'admin_limit' => 1,
            'user_limit' => 0,
        ]);

        Package::create([
            'name'=> PackageType::SILVER,
            'renewal' => RenewalType::YEARLY,
            'day_limit' => 365,
            'price' => 120,
            'admin_limit' => 1,
            'user_limit' => 0,
        ]);
    }
}

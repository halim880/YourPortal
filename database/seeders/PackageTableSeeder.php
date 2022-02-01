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
            'admin_limit' => self::MAX_VALUE,
            'user_limit' => self::MAX_VALUE,
        ]);

        Package::create([
            'name'=> PackageType::PRO,
            'admin_limit' => self::MAX_VALUE,
            'user_limit' => self::MAX_VALUE,
        ]);

        Package::create([
            'name'=> PackageType::GOLDEN,
            'admin_limit' => 1,
            'user_limit' => 5,
        ]);

        Package::create([
            'name'=> PackageType::SILVER,
            'admin_limit' => 1,
            'user_limit' => 0,
        ]);
    }
}

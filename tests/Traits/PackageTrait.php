<?php

namespace Tests\Traits;

use App\Helpers\PackageType;
use App\Helpers\RenewalType;
use App\Models\Package;

trait PackageTrait{


    public function packageData(array $data = []) : array {
        return array_merge([
            'name'=> PackageType::FREE_TRIAL,
            'renewal' => RenewalType::MONTHLY,
            'day_limit' => 90,
            'price' => 0,
            'admin_limit' => 999999999,
            'user_limit' => 999999999,
        ], $data);
    }

    private function createPackage(array $data = []) : Package {
        return Package::create($this->packageData($data));
    }
}
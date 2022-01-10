<?php

namespace Tests\Unit\Subscription;

use App\Models\Package;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Tests\Traits\PackageTrait;

class PackageTest extends TestCase
{
    use DatabaseMigrations, PackageTrait;

    public function test_package_can_be_updated(){
        $package = $this->createPackage();

        $package->update(['day_limit'=> 100]);
        $this->assertEquals($package->day_limit, 100);
    }
}

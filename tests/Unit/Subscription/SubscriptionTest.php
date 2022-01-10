<?php

namespace Tests\Unit\Subscription;

use App\Helpers\SubscriptionType;
use App\Models\Member;
use App\Models\Plan;
use App\Models\Subscription;
use Carbon\Carbon;
use DateTime;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Tests\Traits\PackageTrait;

class SubscriptionTest extends TestCase
{
    use DatabaseMigrations, PackageTrait;
    public function test_get_subscription_type_attribute(){
        $subscription = Subscription::create([
            'member_id' => Member::factory()->create()->id,
            'package_id' => $this->createPackage()->id,
            'exp_date' => now()->addDays(30),
        ]);

        $this->assertEquals($subscription->getPackageName(), "Free Trial");
    }

    // public function test_add_days_to_the_current_subscription(){
    //     $subscription = new Subscription();
    //     $subscription->exp_date = Carbon::parse('01-02-2021');
    //     $subscription->addDays(20);
    //     $this->assertEquals(Carbon::parse($subscription->exp_date)->isoFormat('DD-MM-YYYY'), '21-02-2021');
    // }

    public function test_get_expire_date_attribute(){
        $subscription = Subscription::create([
            'member_id' => Member::factory()->create()->id,
            'package_id' => $this->createPackage()->id,
            'exp_date' => now()->addDays(30),
        ]);
        $subscription->exp_date = Carbon::parse('01-02-2021');
        $this->assertEquals($subscription->getExpireDate(), '01 Feb 2021');
    }

    public function test_get_is_expired_attribute(){
        $subscription = new Subscription();
        $subscription->exp_date = Carbon::parse('01-12-2021');
        $this->assertTrue($subscription->is_expired);

        $subscription->addDays(now()->addDays(10)->diffInDays($subscription->exp_date));
        $this->assertFalse($subscription->is_expired);
    }

    public function test_expire_in_days_count(){
        $subscription = new Subscription();
        $subscription->exp_date = Carbon::parse('03-01-2022');

        $subscription->addDays(now()->addDays(10)->diffInDays($subscription->exp_date));
        $this->assertEquals(10, $subscription->expire_in_days);
    }
}

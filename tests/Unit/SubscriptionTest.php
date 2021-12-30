<?php

namespace Tests\Unit;

use App\Helpers\SubscriptionType;
use App\Models\Subscription;
use Carbon\Carbon;
use DateTime;
use PHPUnit\Framework\TestCase;

class SubscriptionTest extends TestCase
{
    public function test_get_subscription_type_attribute(){
        $subscription = new Subscription();
        $subscription->s_type = SubscriptionType::FREE_TRIAL;
        $this->assertEquals($subscription->type, "Free Trial");
    }

    public function test_add_days_to_the_current_subscription(){
        $subscription = new Subscription();
        $subscription->exp_date = Carbon::parse('01-02-2021');
        $subscription->addDays(20);
        $this->assertEquals(Carbon::parse($subscription->exp_date)->isoFormat('DD-MM-YYYY'), '21-02-2021');
    }

    public function test_get_expire_date_attribute(){
        $subscription = new Subscription();
        $subscription->exp_date = Carbon::parse('01-02-2021');
        $this->assertEquals($subscription->expire_date, '01 Feb 2021');
    }

    public function test_get_is_expired_attribute(){
        $subscription = new Subscription();
        $subscription->exp_date = Carbon::parse('01-12-2021');
        $this->assertTrue($subscription->is_expired);
        $subscription->addDays(30);
        $this->assertFalse($subscription->is_expired);
    }

    public function test_expire_in_days_count(){
        $subscription = new Subscription();
        $subscription->exp_date = Carbon::parse('03-01-2022');
        $this->assertEquals(3, $subscription->expire_in_days);
    }
}

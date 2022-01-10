<?php

namespace Tests\Unit\Member;

use App\Models\Member;
use App\Models\Package;
use App\Services\SubscriptionService;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Tests\Traits\PackageTrait;

class SubscriptionTest extends TestCase
{
    use DatabaseMigrations, PackageTrait;

    public function test_member_can_create_free_subscription(){
        $member = Member::factory()->create();
        $package = $this->createPackage();

        
        $Subscription = SubscriptionService::createSubscription($member, $package);

        $member_sub = $member->subscription;
        $this->assertEquals($member_sub->exp_date, $Subscription->exp_date);
        $this->assertEquals($member_sub->getPackageName(), $Subscription->getPackageName());
    }

    public function test_member_subscription_can_be_updated(){
        $member = Member::factory()->create();
        $package = $this->createPackage(['day_limit'=> 30]);
        $subscription = SubscriptionService::createSubscription($member, $package);
        
        $new_pack = $this->createPackage(['day_limit'=> 90]);
        SubscriptionService::updateSubscription($subscription, $new_pack);

        $this->assertEquals(now()->diffInDays($subscription->exp_date), 120);
    }
}

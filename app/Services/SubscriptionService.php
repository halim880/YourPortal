<?php
namespace App\Services;

use App\Models\Member;
use App\Models\Package;
use App\Models\Subscription;
use Carbon\Carbon;

class SubscriptionService {
    public static function createSubscription(Member $member, Package $package) : Subscription {

        return Subscription::create([
            'package_id'=> $package->id,
            'member_id'=> $member->id,
            'exp_date' => Carbon::now()->addDays($package->getDayLimit()),
        ]);
    }

    public static function updateSubscription(Subscription $subscription, Package $package) : void {
        
        $subscription->package_id = $package->id;
        $subscription->exp_date = self::getNewExpireDate($subscription, $package);
        $subscription->update();
    }

    private static function getNewExpireDate(Subscription $subscription, Package $package) : Carbon {
        $expire_date = Carbon::parse($subscription->exp_date);
        $day_limit = $package->getDayLimit();
        

        if($expire_date <= Carbon::now()){
            return Carbon::now()->addDays($day_limit);
        }
        return $expire_date->addDays($day_limit);
    }
}



<?php
namespace App\Services;

use App\Helpers\PackageType;
use App\Models\Member;
use App\Models\Package;
use App\Models\Plan;
use App\Models\Subscription;
use Carbon\Carbon;
use App\Helpers\PaymentStatus;

class SubscriptionService {
    public static function createSubscription(Member $member, int $package_id, int $plan_id) : Subscription {
        $plan = Plan::findOrFail($plan_id);
        $package = Package::findOrFail($package_id);

        $payment_status = PaymentStatus::UNPAYED;

        if($package->name == PackageType::FREE_TRIAL){
            $payment_status = PaymentStatus::FREE_TRIAL;
        }

        return Subscription::create([
            'package_id'=> $package_id,
            'plan_id'=> $plan_id,
            'member_id'=> $member->id,
            'payment_status'=> $payment_status,
            'exp_date' => Carbon::now()->addDays($plan->duration),
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



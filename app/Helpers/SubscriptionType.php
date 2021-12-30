<?php
namespace App\Helpers;

class SubscriptionType {
    public const FREE_TRIAL = 1;
    public const SILVER = 2;
    public const GOLDEN = 3;
    public const PRO = 4;

    public static function getName(int $type){
        if($type == self::FREE_TRIAL) return "Free Trial";
        if($type == self::SILVER) return "Silver";
        if($type == self::GOLDEN) return "Golden";
        if($type == self::PRO) return "Pro";
    }

    public static function getFromName(string $str):int{
        
        $name = makeSlug($str);

        if($name == 'free-trial') return self::FREE_TRIAL;
        if($name == 'silver') return self::SILVER;
        if($name == 'golden') return self::GOLDEN;
        if($name == 'pro') return self::PRO;
    }
}
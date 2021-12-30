<?php
namespace App\Helpers;

class PlanType{
    const MONTHLY = 1;
    const YEARLY = 2;

    public static function getName(int $type){
        if ($type==PlanType::MONTHLY) return "Monthly";
        if ($type==PlanType::YEARLY) return "Yearly";
    }

    public static function getFromName(string $str):int{
        $name = makeSlug($str);

        return -1;
    }
}
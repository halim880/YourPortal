<?php
namespace App\Helpers;

class RenewalType {
    const MONTHLY = 'Monthly';
    const YEARLY = "Yearly";
    const LIFE_TIME = "LIfetime";

    const LIST = [
        self::MONTHLY,
        self::YEARLY,
        self::LIFE_TIME
    ];
}
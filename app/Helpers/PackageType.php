<?php
namespace App\Helpers;

class PackageType {
    public const FREE_TRIAL = 'Free Trial';
    public const SILVER = 'Silver';
    public const GOLDEN = 'Golden';
    public const PRO = 'Pro';

    const LIST = [
        self::FREE_TRIAL,
        self::SILVER,
        self::GOLDEN,
        self::PRO
    ];
}
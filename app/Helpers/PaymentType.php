<?php

use App\Helpers\CustomTypeInterface;

class PaymentType implements CustomTypeInterface{
    const BANK = 1;
    const CASH = 2;
    const PAY_PAL = 3;
    const STRIPE = 4;

    public static function getName(int $type): string
    {
        if ($type==self::BANK) return "Bank";
        if ($type==self::CASH) return "Cash";
        if ($type==self::PAY_PAL) return "Paypal";
        if ($type==self::STRIPE) return "Stripe";

        return "Unknown";
    }

    public static function getByName(string $name): int
    {
        $name = makeSlug($name);

        if ($name=="bank") return self::BANK;
        if ($name=="cash") return self::CASH;
        if ($name=="paypal") return self::PAY_PAL;
        if ($name=="stripe") return self::STRIPE;

        return -1;
    }
}
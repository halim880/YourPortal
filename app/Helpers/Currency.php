<?php
namespace App\Helpers;

class Currency {

    const POUND = [
        'name'=> 'pound', 
        'conde'=>'GBP', 
        'symbol'=> '£'
    ];

    const USD = [
        'name'=> 'US Dollar', 
        'conde'=>'USD', 
        'symbol'=> '$'
    ];

    const LIST = [
        self::POUND,
        self::USD,
    ];
}
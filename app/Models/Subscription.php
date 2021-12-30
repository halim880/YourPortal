<?php

namespace App\Models;

use App\Helpers\SubscriptionType;
use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    const FREE_TRIAL_DAYS = 90;


    public function getTypeAttribute(){
        SubscriptionType::getName($this->s_type);
    }

    static function startFreeTrialForMember(Member $member){

    }


    public function addDays(int $days){
        $expireDate = Carbon::parse($this->exp_date);
        $expireDate->addDays($days);
        $this->exp_date = $expireDate;
        return $this;
    }

    public function getExpireDateAttribute(){
        return Carbon::parse($this->exp_date)->isoFormat('DD MMM YYYY');
    }

    public function getIsExpiredAttribute() : bool{
        $ex_date = Carbon::parse($this->exp_date);
        if($ex_date<now()) return true;
        return false;
    }

    public function getExpireInDaysAttribute(){
        $exp_date = Carbon::parse($this->exp_date);
        $now = Carbon::now();
        return $exp_date->diffInDays($now);
    }
}

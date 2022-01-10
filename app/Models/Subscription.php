<?php

namespace App\Models;

use App\Helpers\SubscriptionType;
use Carbon\Carbon;
use App\Models\Plan;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    private int $package_id;
    private int $member_id;
    private DateTime $exp_date;

    use HasFactory;

    protected $fillable = [
        'package_id',
        'member_id',
        'exp_date'
    ];

    
    /********************************** <Setters> **********************************/
    public function setPackageId(int $package_id) : void {
        $this->package_id = $package_id;
    }

    public function setMemberId(int $member_id){
        $this->member_id = $member_id;
    }

    public function setExpireDate(String $date) : string {
        return (string) Carbon::parse($date);
    }
    /********************************** </Setters> **********************************/

    /********************************** <Getters> **********************************/
    public function getPackageName() : string {
        return $this->package->getName();
    }

    public function getExpireDate() : string {
        return (string) Carbon::parse($this->exp_date)->isoFormat('DD MMM YYYY');
    }

    public function expireDate(string $date) : string {
        return (string) Carbon::parse($date)->isoFormat('DD MMM YYYY');
    }

    public function getRemainingDays() : int {
        return (int) Carbon::parse($this->exp_date)->diffInDays(Carbon::now()) + 1;
    }

    public function remainingDays(string $date) : int {
        return (int) Carbon::parse($date)->diffInDays(Carbon::now()) + 1;
    }
    /********************************** </Getters> **********************************/



    /********************************** <Relationship> *******************************/
    public function member(){
        return $this->belongsTo(Member::class);
    }

    public function package(){
        return $this->belongsTo(Package::class);
    }
    /********************************** </Relationship> *******************************/

    public function addDays(int $days) : void {
        $expireDate = Carbon::parse($this->exp_date);
        $expireDate->addDays($days);
        $this->exp_date = $expireDate;
    }

    //is_expired
    public function getIsExpiredAttribute() : bool{
        $ex_date = Carbon::parse($this->exp_date);
        if($ex_date<now()) return true;
        return false;
    }

    //expire_in_days
    public function getRemainingDaysAttribute(){
        $exp_date = Carbon::parse($this->exp_date);
        $now = Carbon::now();
        return $exp_date->diffInDays($now) + 1;
    }
}

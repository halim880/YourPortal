<?php

namespace App\Models\SuperAdmin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PaymentType;

class Invoice extends Model
{
    use HasFactory;

    public function getPaymentTypeAttribute(){
        switch ($this->p_type) {
            case PaymentType::BANK: return "Bank";
            case PaymentType::PAY_PAL: return "Paypal";
            case PaymentType::STRIPE: return "Stripe";
            case PaymentType::CASH: return "Cash";
            default:
                return "Unknown payament type";
        }
    }
}
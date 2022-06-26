<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'bank_name',
        'bank_owner_name',
        'bank_account_no',
        'monthly_fee',
    ];
}
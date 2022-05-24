<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'payer_id',
        'mosque_id',
        'payment_date',
        'start_month',
        'start_year',
        'end_month',
        'end_year',
        'amount',
        'prove_url',
        'status',
    ];
}
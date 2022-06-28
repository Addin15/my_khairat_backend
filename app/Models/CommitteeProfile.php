<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommitteeProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'mosque_id', 
        'mosque_name', 
        'mosque_phone', 
        'mosque_postcode', 
        'mosque_state', 
        'mosque_address', 
        'mosque_bank_name', 
        'mosque_bank_owner_name', 
        'mosque_bank_no', 
        'mosque_status',
        'mosque_expire_month',
        'mosque_expire_year',
        'mosque_monthly_fee',
    ];
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'mosque_id',
        'village_id',
        'person_name',
        'person_ic',
        'person_phone',
        'person_address',
        'person_occupation',
        'person_details_prove',
        'person_payment_prove',
        'person_register_date',
        'person_status',
        'person_member_no',
        'person_expire_month',
        'person_expire_year',
    ];
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    use HasFactory;
    protected $fillable = [
        'claim_id',
        'mosque_id',
        'claimer_name',
        'claimer_ic',
        'claimer_address',
        'claimer_relation',
        'dead_name',
        'dead_date',
        'dead_reason',
        'claimer_url',
        'status',
    ];
}
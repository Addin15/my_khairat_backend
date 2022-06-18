<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    use HasFactory;
    protected $fillable = [
        'claim_id',
        'claimer_name',
        'claimer_ic',
        'claimer_vollage',
        'claimer_url',
    ];
}
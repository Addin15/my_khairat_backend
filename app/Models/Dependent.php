<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dependent extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'mosque_id',
        'dependent_name',
        'dependent_relation',
        'dependent_ic',
        'dependent_phone',
        'dependent_occupation',
        'dependent_address',
        'death_status',
        'death_date',
        'verify',
        'verify_death',
    ];
}

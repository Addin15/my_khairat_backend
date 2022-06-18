<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Death extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'dependent_id',
        'dependent_name',
        'dependent_ic',
        'dependent_relation',
        'dependent_phonenum',
        'dependent_address',
        'dependent_deathdate',
        'death_location',
        'death_causes',
    ];
}

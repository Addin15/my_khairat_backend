<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grave extends Model
{
    use HasFactory;

    protected $fillable = [
        'mosque_id',
        'grave_name',
        'grave_address',
    ];
}
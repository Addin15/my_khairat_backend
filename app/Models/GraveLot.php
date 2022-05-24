<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GraveLot extends Model
{
    use HasFactory;

    protected $fillable = [
        'grave_id',
        'user_id',
        'lot_number',
        'lot_gender',
    ];
}
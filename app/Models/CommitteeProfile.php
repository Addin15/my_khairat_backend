<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommitteeProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'mosque_id', 'mosque_name', 'mosque_phone', 'mosque_address',
    ];
}
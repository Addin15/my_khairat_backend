<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommitteePayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'committee_id',
        'remark', 
        'prove_url',
        'is_done',
        'is_rejected',
    ];
}
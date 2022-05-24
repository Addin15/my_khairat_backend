<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    protected $fillable = [
        'mosque_id',
        'announcement_title',
        'announcement_content',
        'announcement_img_url',
        'announcement_date',
    ];
}
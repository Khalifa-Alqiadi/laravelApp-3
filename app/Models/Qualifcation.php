<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qualifcation extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'depart', 'university', 'user_id'
    ];
}

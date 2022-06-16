<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportTicket extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'questions'
    ];

    public function courses(){
        return $this->hasMany(Course::class);
    }
}

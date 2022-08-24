<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $fillable = ['company_id'];

    public function company()
    {
        return $this->belongsTo(User::class, 'company_id', 'id');
    }
    public function city()
    {
        return $this->hasMany(City::class, 'id');
    }
    public function cityJob()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function apply()
    {
        return $this->hasMany(Apply::class, 'job_id');
    }
}

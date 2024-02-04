<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Booking;
use App\Models\Department;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'department_id', 'image'];
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }


}
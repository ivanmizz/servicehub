<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Service;
use App\Models\User;
use App\Models\staff;

class Booking extends Model
{
    use HasFactory;

    const PENDING = 'pending';
    const APPROVED = 'approved';
    const DECLINED = 'declined';
    const CANCELLED = 'cancelled';
    const COMPLETED = 'completed';
    protected $fillable = ['user_id', 'service_id', 'message', 'status'];

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }
}
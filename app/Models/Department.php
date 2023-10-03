<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\staff;
use App\Models\Service;

class Department extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    
    public function staff()
    {
        return $this->hasMany(Staff::class, 'department');
    }
    public function service()
    {
        return $this->hasMany(Service::class, 'department');
    }


}

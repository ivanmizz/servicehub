<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class staff extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'department_id', 'profession', 'image'];

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
}

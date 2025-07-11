<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description'
    ];

    public function users()
    {
        // con withTimestamps() es para gestionar la hora
        return $this->belongsToMany(User::class)->withTimestamps();;
    }
}
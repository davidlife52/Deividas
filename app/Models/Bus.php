<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;

    protected $fillable = [
        'busseats',
        'license_plate',
        'comment',
    ];


    public function route()
    {
        return $this->hasMany(Route::class);
    }
}

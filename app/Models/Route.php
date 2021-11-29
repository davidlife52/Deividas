<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    protected $fillable = [
        'bus_id',
        'from',
        'to',
        'leaveAt',
        'arriveAt',
        'price',
        'seats',
    ];

    public function scopeFilter($query, array $filters)
    {

        $query->when($filters['from'] ?? false, fn($query, $from) =>
                $query->where('from', $from)
        );
        $query->when($filters['to'] ?? false, fn($query, $to) =>
                $query->where('to', $to)
        );
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }

    public function bus()
    {
        return $this->belongsTo(Bus::class, 'bus_id');
    }
}

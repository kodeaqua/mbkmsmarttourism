<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spatial extends Model
{
    use HasFactory;

    protected $fillable = [
        'village_id',
        'type_id',
        'name',
        'address',
        'latitude',
        'longitude'
    ];

    public function village()
    {
        return $this->belongsTo(Village::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}

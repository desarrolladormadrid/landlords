<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Apartament;

class Feature extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'feature'
    ];
    public function apartaments()

    {
        return $this->belongsToMany(Apartament::class)->withTimestamps();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    use HasFactory;

    protected $fillable = ['country_id', 'name'];

    public function parish()
    {
        return $this->belongsTo(Parish::class, 'parish_id');
    }

    public function streets()
    {
        return $this->hasMany(Street::class, 'community_id');
    }
}

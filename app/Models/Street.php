<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Street extends Model
{
    use HasFactory;

    protected $fillable = ['community_id', 'name'];

    public function street()
    {
        return $this->belongsTo(Community::class, 'community_id');
    }
}

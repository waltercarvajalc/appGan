<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description'];

    public function treatments()
    {
        return $this->belongsToMany(Treatment::class);
    }
}

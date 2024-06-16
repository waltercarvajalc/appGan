<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    use HasFactory;
    protected $fillable = ['animal_id', 'date', 'detail', 'description'];

    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }

    public function medicines()
    {
        return $this->belongsToMany(Medicine::class);
    }
}

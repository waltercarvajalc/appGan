<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Animal extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'birthdate', 'sex', 'breed_id', 
                          'father', 'mother', 'image'];

    public function breed () : BelongsTo{
        return $this->belongsTo(Breed::class);
    }

    public function treatments()
    {
        return $this->hasMany(Treatment::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}

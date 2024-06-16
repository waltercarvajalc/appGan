<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = ['animal_id', 'event_type_id', 'date', 'description'];

    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }

    public function eventType(){
        return $this->belongsTo(EventType::class);
    }
}

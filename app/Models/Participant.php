<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'event_id', // Sesuaikan dengan kolom yang ada di tabel participants
    ];

    // Relasi dengan model Event
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}

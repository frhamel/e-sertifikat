<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template_design extends Model
{
    use HasFactory;

    protected $table = 'template_design';

    protected $fillable = [
        'nama_template',
        'gambar_template',
    ];

    /**
     * Relasi dengan Event
     */
    public function events()
    {
        return $this->hasMany(Event::class, 'template_id');
    }
}

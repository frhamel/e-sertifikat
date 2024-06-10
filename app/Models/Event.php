<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'tbl_event';
    protected $primaryKey = 'event_id';

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'template_id',
        'title',
        'event_date',
        'nama_ttd',
        'ttd',
        'logo_event'
    ];

    /**
     * casts
     *
     * @var array
     */
    protected $casts = [
        'event_date' => 'datetime',
    ];

    /**
     * Relasi dengan TemplateDesign
     */
    public function templateDesign()
    {
        return $this->belongsTo(TemplateDesign::class, 'template_id');
    }
}

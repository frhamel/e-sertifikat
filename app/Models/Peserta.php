<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Peserta extends Model
{

    // Tentukan nama kolom yang ingin Anda gunakan sebagai kunci utama
    protected $primaryKey = 'peserta_id';

    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tbl_peserta';

    // /**
    //  * Indicates if the model should be timestamped.
    //  *
    //  * @var bool
    //  */
    // public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'event_id',
        'peserta_name',
        'nis',
        'class',
        'school',
        'status',
    ];

    /**
     * Get the event that owns the participant (peserta).
     */
    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id', 'id'); // Tambahkan parameter 'event_id'
    }
}

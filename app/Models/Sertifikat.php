<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sertifikat extends Model
{
    // Tentukan nama kolom yang ingin Anda gunakan sebagai kunci utama
    protected $primaryKey = 'template_id';

    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'template_design';

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'nama_template',
        'gambar_template',
        'file_template',
        // 'created at',
        // 'updated at',
    ];
}

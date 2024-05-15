<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TabelSertifikat extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tbl_sertifikat';

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'nama_template',
        'gambar_template',
         'created at',
         'updated at',
    ];
}



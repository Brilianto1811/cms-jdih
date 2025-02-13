<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table = 'artikel';

    protected $primaryKey = 'id';

    protected $fillable = [
        'tipe',
        'judul',
        'teu_badan',
        'cetakan_edisi',
        'tempat_terbit',
        'penerbit',
        'tahun_terbit',
        'sumber',
        'subjek',
        'bahasa',
        'lokasi',
        'bidang_hukum'
    ];
}

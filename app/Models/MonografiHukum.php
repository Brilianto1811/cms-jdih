<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MonografiHukum extends Model
{
    protected $table = 'monografi_hukum';

    protected $primaryKey = 'id';

    protected $fillable = [
        'deskripsi_fisik',
        'no_induk_buku',
        'bidang_hukum',
        'lokasi',
        'bahasa',
        'isbn_issn',
        'subjek',
        'sumber',
        'tipe',
        'tahun_terbit',
        'penerbit',
        'tempat_terbit',
        'cetakan_edisi',
        'nomor_panggil',
        'teu_badan',
        'judul',
    ];
}

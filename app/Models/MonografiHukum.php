<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class MonografiHukum extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory;

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

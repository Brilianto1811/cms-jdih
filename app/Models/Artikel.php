<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Artikel extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory;

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

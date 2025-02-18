<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Yurisprudensi extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory;

    protected $table = 'yurisprudensi';

    protected $primaryKey = 'id';

    protected $fillable = [
        'tipe',
        'judul',
        'teu_badan',
        'nomor_putusan',
        'jenis',
        'jenis_perkara',
        'singkatan_jenis_peradilan',
        'jenis_peradilan',
        'singkatan_jenis',
        'tempat_peradilan',
        'tempat_terbit',
        'tanggal_penetapan',
        'tahun_terbit',
        'sumber',
        'subjek',
        'status',
        'bahasa',
        'lokasi',
        'bidang_hukum',
    ];
}

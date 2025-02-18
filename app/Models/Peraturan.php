<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Peraturan extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory;

    protected $table = 'peraturan';

    protected $primaryKey = 'id';

    protected $fillable = [
        'tipe_dokumen',
        'judul',
        'teu_badan',
        'tahun',
        'no_peraturan',
        'jenis',
        'singkatan_jenis',
        'tempat_penetapan',
        'tgl_penetapan',
        'tgl_perundangan',
        'sumber',
        'subjek',
        'status',
        'status_terbit',
        'keterangan_status',
        'bahasa',
        'lokasi',
        'bidang_hukum',
        // 'file',
        // 'file_abstraksi',
    ];
}

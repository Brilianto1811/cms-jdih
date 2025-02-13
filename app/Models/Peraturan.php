<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peraturan extends Model
{
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
        'sumber',
        'subjek',
        'status_peraturan',
        'keterangan_status',
        'bahasa',
        'lokasi',
        'bidang_hukum',
    ];
}

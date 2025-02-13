<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Articles extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory;

    // Nama tabel jika berbeda dari konvensi (opsional)
    protected $table = 'articles';

    // Primary key jika berbeda dari 'id' (opsional)
    protected $primaryKey = 'id';

    // Jika primary key bukan integer (opsional)
    // public $incrementing = false;

    // Tipe data primary key (opsional)
    // protected $keyType = 'int';

    // Kolom yang dapat diisi (fillable)
    protected $fillable = [
        'title',
        'text',
        'author',
        // 'file',
        'summary',
        'caption',
        'caption_image',
        'tgl_publish',
        'tags',
        'status_publish',
    ];

    // Kolom yang diabaikan saat serialisasi (opsional)
    // protected $hidden = [];

    // Kolom yang dikonversi ke tipe data tertentu (opsional)
    // protected $casts = [];
}

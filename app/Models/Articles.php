<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Support\Str;
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
        'kategori_konten',
        // 'status_konten',
        'spesial_kategori',
        'super_artikel',
        'slug',
    ];

    protected static function boot()
    {
        parent::boot();
        static::saving(function ($article) {
            $article->slug = Str::slug($article->title);
        });
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Galeri extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory;

    protected $table = 'galeri';

    protected $primaryKey = 'id';

    protected $fillable = [
        'tipe',
        'nama',
        'tgl_galeri',
        'file',
        'url_video',
        'deskripsi',
    ];
}

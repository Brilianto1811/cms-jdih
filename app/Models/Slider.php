<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Slider extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory;

    protected $table = 'slider';

    protected $primaryKey = 'id';
    protected $fillable = [
        'judul',
        'sub_judul',
        // 'judul_tombol',
        'tombol_url',
        'penempatan',
        // 'file',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('images')
            ->useDisk('public');
    }
}

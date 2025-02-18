<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Infografis extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory;

    protected $table = 'infografis';

    protected $primaryKey = 'id';

    protected $fillable = [
        'judul',
        // 'file',
    ];
}

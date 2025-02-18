<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class StrukturOrganisasi extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory;

    protected $table = 'struktur_organisasi';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nama',
        'jabatan',
        'urutan',
        // 'file',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisiMisi extends Model
{
    protected $table = 'visi_misi';

    protected $primaryKey = 'id';

    protected $fillable = [
        'visi',
        'misi',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SekapurSirih extends Model
{
    protected $table = 'sekapur_sirih';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nama',
        'jabatan',
        'sambutan',
    ];
}

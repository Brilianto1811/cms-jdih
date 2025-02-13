<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgendaKegiatan extends Model
{
    use HasFactory;
    protected $table = 'agenda_kegiatan';

    protected $primaryKey = 'id';

    protected $fillable = [
        'agenda_id',
        'waktu_kegiatan',
        'judul_kegiatan',
        'deskripsi_kegiatan',
    ];

    public function agenda()
    {
        return $this->belongsTo(Agenda::class);
    }
}

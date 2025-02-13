<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;
    protected $table = 'agenda';

    protected $primaryKey = 'id';

    protected $fillable = [
        'tgl_agenda',
    ];

    public function agendaKegiatan()
    {
        return $this->hasMany(AgendaKegiatan::class);
    }
}

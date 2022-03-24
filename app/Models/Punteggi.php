<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Punteggi extends Model
{
    use HasFactory;
    protected $table = 'punteggi';
    protected $primaryKey  = "ID";
    public $timestamps = false;

    /**
     * utente
     * Get utente of PronosticiGara
     * @return void
     */
    public function utente()
    {
        return $this->belongsTo(Utenti::class, 'ID_UTENTE');
    }

    /**
     * gara
     * Get Gara of PronosticiGara
     * @return void
     */
    public function gara()
    {
        return $this->belongsTo(Gare::class, 'ID_GARA');
    }
}

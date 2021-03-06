<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PilotiUtenti extends Model
{
    use HasFactory;
    protected $table = 'piloti_utenti';
    protected $primaryKey  = "ID";
    public $timestamps = false;

    /**
     * utente
     * Get utente of PilotiUtenti
     * @return void
     */
    public function utente(){
        return $this->belongsTo(Utenti::class, 'ID_UTENTE');
    }
}

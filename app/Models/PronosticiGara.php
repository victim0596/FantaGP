<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PronosticiGara extends Model
{
    use HasFactory;
    protected $table = 'pronostici_gara';
    protected $primaryKey  = "ID";
    public $timestamps = false;

        
    /**
     * gara
     * Get Gara of PronosticiGara
     * @return void
     */
    public function gara(){
        return $this->belongsTo(Gare::class, 'ID_GARA');
    }

    /**
     * utente
     * Get utente of PronosticiGara
     * @return void
     */
    public function utente(){
        return $this->belongsTo(Utenti::class, 'ID_UTENTE');
    }
    
}

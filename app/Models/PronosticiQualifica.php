<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PronosticiQualifica extends Model
{
    use HasFactory;
    protected $table = 'pronostici_qualifica';
    protected $primaryKey  = "ID";
    public $timestamps = false;
        
    /**
     * gara
     * Get Gara of PronosticiQualifica
     * @return void
     */
    public function gara(){
        return $this->belongsTo(Gare::class, 'ID_GARA');
    }

    /**
     * utente
     * Get utente of PronosticiQualifica
     * @return void
     */
    public function utente(){
        return $this->belongsTo(Utenti::class, 'ID_UTENTE');
    }
}

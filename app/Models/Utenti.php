<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utenti extends Model
{
    use HasFactory;
    protected $table = 'utenti';
    protected $primaryKey  = "ID";
    public $timestamps = false;
        
   /**
     * pilotiUtenti
     * Return PilotiUtenti for utenti
     * @return void
     */
    public function pilotiUtenti()
    {
        return $this->hasOne(PilotiUtenti::class, 'ID_UTENTE');
    }
    
    /**
     * pronosticiGara
     * Return all PronosticiGara for utenti
     * @return void
     */
    public function pronosticiGara()
    {
        return $this->hasMany(PronosticiGara::class, 'ID_UTENTE');
    }

    /**
     * pronosticiQualifica
     * Return all PronosticiQualifica for utenti
     * @return void
     */
    public function pronosticiQualifica()
    {
        return $this->hasMany(PronosticiQualifica::class, 'ID_UTENTE');
    }
}

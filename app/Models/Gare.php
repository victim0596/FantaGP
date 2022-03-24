<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gare extends Model
{
    use HasFactory;
    protected $table = 'gare';
    protected $primaryKey  = "ID";
    public $timestamps = false;
    
    /**
     * pronosticiGara
     * Return all Pronostici Gara for Gara
     * @return void
     */
    public function pronosticiGara()
    {
        return $this->hasMany(PronosticiGara::class, 'ID_GARA');
    }
    
    /**
     * pronosticiQualifica
     * Return all Pronostici Qualifica for Gara
     * @return void
     */
    public function pronosticiQualifica()
    {
        return $this->hasMany(PronosticiQualifica::class, 'ID_GARA');
    }
    
    /**
     * pagelle
     * Return all Pagelle for Gara
     * @return void
     */
    public function pagelle()
    {
        return $this->hasMany(Pagelle::class, 'ID_GARA');
    } 

    /**
     * risultati
     * Return Risultati for Gara
     * @return void
     */
    public function risultati()
    {
        return $this->hasOne(Risultati::class, 'ID_GARA');
    }   

    /**
     * ritirati
     * Return all Ritirati for Gara
     * @return void
     */
    public function ritirati()
    {
        return $this->hasMany(Ritirati::class, 'ID_GARA');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagelle extends Model
{
    use HasFactory;
    protected $table = 'pagelle';
    protected $primaryKey  = "ID";
    public $timestamps = false;
        
    /**
     * gara
     * Get Gara of Pagelle
     * @return void
     */
    public function gara(){
        return $this->belongsTo(Gare::class, 'ID_GARA');
    }

    /**
     * pilota
     * Get the Pilota of Pagelle
     * @return void
     */
    public function pilota(){
        return $this->belongsTo(Piloti::class, 'ID_PILOTA');
    }
}

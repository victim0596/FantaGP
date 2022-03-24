<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ritirati extends Model
{
    use HasFactory;
    protected $table = 'ritirati';
    protected $primaryKey  = "ID";
    public $timestamps = false;
        
    /**
     * gara
     * Get the Gara of Ritirati
     * @return void
     */
    public function gara(){
        return $this->belongsTo(Gare::class, 'ID_GARA');
    }
        
    /**
     * pilota
     * Get the Pilota of Ritirati
     * @return void
     */
    public function pilota(){
        return $this->belongsTo(Piloti::class, 'ID_PILOTA');
    }
}

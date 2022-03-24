<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Risultati extends Model
{
    use HasFactory;
    protected $table = 'risultati';
    protected $primaryKey  = "ID";
    public $timestamps = false;
    
    /**
     * gara
     * Get the Gara of Risultati
     * @return void
     */
    public function gara(){
        return $this->belongsTo(Gare::class, 'ID_GARA');
    }
    /**
     * pilota_QP1
     * Get Pilota QP1 of PronosticiQualifica
     * @return void
     */
    public function pilota_QP1(){
        return $this->belongsTo(Piloti::class, 'QP1');
    }

    /**
     * pilota_QP2
     * Get Pilota QP2 of PronosticiQualifica
     * @return void
     */
    public function pilota_QP2(){
        return $this->belongsTo(Piloti::class, 'QP2');
    }

    /**
     * pilota_QP3
     * Get Pilota QP3 of PronosticiQualifica
     * @return void
     */
    public function pilota_QP3(){
        return $this->belongsTo(Piloti::class, 'QP3');
    }

    /**
     * pilota_GP1
     * Get Pilota GP1 of PronosticiGara
     * @return void
     */
    public function pilota_GP1(){
        return $this->belongsTo(Piloti::class, 'GP1');
    }

    /**
     * pilota_GP2
     * Get Pilota GP2 of PronosticiGara
     * @return void
     */
    public function pilota_GP2(){
        return $this->belongsTo(Piloti::class, 'GP2');
    }

    /**
     * pilota_GP3
     * Get Pilota GP3 of PronosticiGara
     * @return void
     */
    public function pilota_GP3(){
        return $this->belongsTo(Piloti::class, 'GP3');
    }

    /**
     * pilota_GiroVeloce
     * Get Pilota GIRO_VELOCE of PronosticiGara
     * @return void
     */
    public function pilota_GiroVeloce(){
        return $this->belongsTo(Piloti::class, 'GIRO_VELOCE');
    }
}

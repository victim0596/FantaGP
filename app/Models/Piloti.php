<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Piloti extends Model
{
    use HasFactory;
    protected $table = 'piloti';
    protected $primaryKey  = "ID";
    public $timestamps = false;


    /**
     * ritirati
     * Get all Ritirati for Piloti 
     * @return void
     */
    public function ritirati()
    {
        return $this->hasMany(Ritirati::class, 'ID_PILOTA');
    }

    /**
     * pagelle
     * Get all Pagelle for Piloti
     * @return void
     */
    public function pagelle()
    {
        return $this->hasMany(Pagelle::class, 'ID_PILOTA');
    }

}

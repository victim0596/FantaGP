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
}

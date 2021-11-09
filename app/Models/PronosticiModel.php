<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PronosticiModel extends Model
{
    use HasFactory;
    protected $table = 'pronostici';
    protected $primaryKey  = "id_g";
    public $timestamps = false;
}

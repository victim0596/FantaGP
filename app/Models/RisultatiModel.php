<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RisultatiModel extends Model
{
    use HasFactory;
    protected $table = 'risultati';
    protected $primaryKey  = "nome_gara";
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

}

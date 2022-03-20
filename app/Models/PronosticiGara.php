<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PronosticiGara extends Model
{
    use HasFactory;
    protected $table = 'pronostici_gara';
    protected $primaryKey  = "ID";
    public $timestamps = false;
}

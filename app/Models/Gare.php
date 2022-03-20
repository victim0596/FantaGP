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
}

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
}

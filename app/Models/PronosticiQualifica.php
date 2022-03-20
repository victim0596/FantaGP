<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PronosticiQualifica extends Model
{
    use HasFactory;
    protected $table = 'pronostici_qualifica';
    protected $primaryKey  = "ID";
    public $timestamps = false;
}

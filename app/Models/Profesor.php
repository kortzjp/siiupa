<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    use HasFactory;
    
    protected $table = 'profesor';
    protected $primaryKey = 'idprofesor';
    //protected $keyType = 'string';
    public $timestamps = false;
    
    public function persona() {
        return $this->belongsTo(Persona::class,'idpersonas'); 
    }
}

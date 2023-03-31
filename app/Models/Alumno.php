<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model {

    use HasFactory;

    protected $table = 'alumno';
    protected $primaryKey = 'nocuenta';
    protected $keyType = 'string';
    public $timestamps = false;

    //protected $hidden = ['password'];

    public function persona() {
        return $this->belongsTo(Persona::class,'idpersonas'); 
    }

}

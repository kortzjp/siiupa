<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model {

    use HasFactory;

    protected $table = 'persona';
    protected $primaryKey = 'idpersonas';
    public $timestamps = false;
    protected $hidden = ['password'];

    public function alumno() {
        return $this->hasOne(Alumno::class);
    }
    
    public function profesor() {
        return $this->hasOne(Profesor::class);
    }

}

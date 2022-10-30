<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;
     /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable =
    [
    'ci',
    'nombre',
    'telefono',
    'direccion',
    'nit',
    'tipo',
    'fecha_nacimiento',
    'T_C',
    'T_E'
    ];


    //model persona
    public function cargos(){
      return $this->belongsToMany('App\Models\Cargo');
  }
  public function notas()
  {
      return $this->hasMany('App\Models\Nota', 'persona_id', 'id');
  }
}

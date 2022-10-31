<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargoempleado extends Model
{
    use HasFactory;
    protected $perPage = 20;
/**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable =
     [
    'fecha_inicio',
     'fecha_fin',
     'persona_id',
     'cargo_id',
     'sueldo'
    ];



     //model Cargoempleado
  //  public function cargos(){
  //      return $this->belongsTo('App\Models\Cargo');
  //    }
  //    public function personas(){
  //      return $this->belongsTo('App\Models\Persona');
  //  }

}

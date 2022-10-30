<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nit', 'nombre', 'telefono', 'direccion'];

    public function notas()
    {
        return $this->hasMany('App\Models\Nota', 'proveedor_id', 'id');
    }   
}

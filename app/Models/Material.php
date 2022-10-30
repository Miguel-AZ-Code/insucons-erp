<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;
      /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable =
    ['nombre',
    'descripcion',
    'precio',
    'medida_id',
    'marca_id'];


    public function marca()
    {
        return $this->hasOne('App\Models\Marca', 'id', 'marca_id');
    }
    public function medida()
    {
        return $this->hasOne('App\Models\Medida', 'id', 'medida_id');
    }
}

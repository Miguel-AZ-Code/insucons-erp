<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medida extends Model
{
    use HasFactory;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable =
    [
        'unidad'
    ];

    public function materiales()
    {
        return $this->hasMany('App\Models\Material', 'medida_id', 'id');
    }
}

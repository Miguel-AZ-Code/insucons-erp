<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    use HasFactory;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable =

    ['nombre'];

    // model Cargo

    public function personas()
    {
        return $this->belongsToMany('App\Models\Persona');
    }

    // public function personas(){
    //   return $this->belongsToMany(Cargo::class,'App\Models\Cargo');
    // }

}

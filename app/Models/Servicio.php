<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Servicio extends Model
{
    use HasFactory, LogsActivity;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'descripcion', 'precio'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['nombre', 'descripcion', 'precio'])
            ->setDescriptionForEvent(fn (string $eventName) => "{$eventName} Servicio")
            ->useLogName('user');
        // Chain fluent methods for configuration options
    }
}

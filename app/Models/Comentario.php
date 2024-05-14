<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Comentario
 *
 * @property $id
 * @property $titulo
 * @property $contenido
 * @property $fecha_creacion
 * @property $diario_id
 *
 * @property Diario $diario
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Comentario extends Model
{
    

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['titulo', 'contenido', 'fecha_creacion', 'diario_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function diario()
    {
        return $this->belongsTo(\App\Models\Diario::class, 'diario_id', 'id');
    }
    

}

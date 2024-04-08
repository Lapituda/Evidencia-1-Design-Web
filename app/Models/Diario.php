<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Diario
 *
 * @property $id
 * @property $titulo
 * @property $contenido
 * @property $fecha_creacion
 * @property $categoria_id
 * @property $usuario_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Categoria $categoria
 * @property User $user
 * @property Comentario[] $comentarios
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Diario extends Model
{
    

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['titulo', 'contenido', 'fecha_creacion', 'categoria_id', 'usuario_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categoria()
    {
        return $this->belongsTo(\App\Models\Categoria::class, 'categoria_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'usuario_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comentarios()
    {
        return $this->hasMany(\App\Models\Comentario::class, 'id', 'diario_id');
    }
    

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Uf
 *
 * @property $id
 * @property $nombreIndicador
 * @property $codigoIndicador
 * @property $unidadMedidaIndicador
 * @property $valorIndicador
 * @property $fechaIndicador
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Uf extends Model
{
    
    static $rules = [
		'nombreIndicador' => 'required',
		'codigoIndicador' => 'required',
		'unidadMedidaIndicador' => 'required',
		'valorIndicador' => 'required',
		'fechaIndicador' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombreIndicador','codigoIndicador','unidadMedidaIndicador','valorIndicador','fechaIndicador'];



}

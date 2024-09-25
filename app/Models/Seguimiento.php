<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seguimiento extends Model
{
	protected $table = 'seguimiento';
	public $timestamps = true;

	protected $casts = [
		'id_entrega' => 'int',
		'fecha_hora' => 'datetime'
	];

	protected $fillable = [
		'id_entrega',
		'estado',
		'ubicacion',
		'fecha_hora',
		'notas'
	];

	public function entrega()
	{
		return $this->belongsTo(Entrega::class, 'id_entrega');
	}
}
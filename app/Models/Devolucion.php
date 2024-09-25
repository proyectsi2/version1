<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devolucion extends Model
{
	protected $table = 'devolucion';
	public $timestamps = true;

	protected $casts = [
		'id_pedido' => 'int',
		'fecha_solicitud' => 'datetime'
	];

	protected $fillable = [
		'id_pedido',
		'motivo',
		'estado',
		'fecha_solicitud'
	];

	public function order()
	{
		return $this->belongsTo(Order::class, 'id_order');
	}
}

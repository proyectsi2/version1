<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrega extends Model
{
	protected $table = 'entrega';
	public $timestamps = true;

	protected $casts = [
		'id_pedido' => 'int',
		'fecha_entrega' => 'datetime',
		'entregado_en' => 'datetime'
	];

	protected $fillable = [
		'id_pedido',
		'direccion_entrega',
		'estado_entrega',
		'numero_seguimiento',
		'nombre_mensajeria',
		'fecha_entrega',
		'entregado_en'
	];

	public function order()
	{
		return $this->belongsTo(Order::class, 'id_order');
	}

	public function seguimiento()
	{
		return $this->hasMany(Seguimiento::class, 'id_entrega');
	}
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
	protected $table = 'compra';

	protected $casts = [
		'proveedor_id' => 'int',
		'fecha_recepcion' => 'datetime',
		'moneda_id' => 'int',
		'monto' => 'float'
	];

	protected $fillable = [
		'proveedor_id',
		'fecha_recepcion',
		'moneda_id',
		'monto',
		'estado',
		'descripcion'
	];

	public function proveedor()
	{
		return $this->belongsTo(Proveedor::class);
	}

	public function moneda()
	{
		return $this->belongsTo(Moneda::class);
	}

	public function detallecompra()
	{
		return $this->hasMany(Detallecompra::class);
	}
}
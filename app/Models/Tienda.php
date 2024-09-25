<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tienda extends Model
{
	protected $table = 'tienda';
	public $timestamps = false;

	protected $fillable = [
		'nombre',
		'direccion',
		'telefono',
		'correo'
	];

	public function inventario()
	{
		return $this->hasMany(Inventario::class, 'id_tienda');
	}
}

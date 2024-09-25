<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
	protected $table = 'proveedor';
	public $timestamps = true;

	protected $fillable = [
		'nombre',
		'contacto',
		'telefono',
		'correo',
		'direccion'
	];

	public function compra()
	{
		return $this->hasMany(Compra::class, 'id_proveedor');
	}

	public function product()
	{
		return $this->hasMany(Product::class, 'id_proveedor');
	}
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moneda extends Model
{
	protected $table = 'moneda';
	public $timestamps = true;

	protected $fillable = [
		'nombre',
		'abreviatura'
	];

	public function compra()
	{
		return $this->hasMany(Compra::class, 'id_moneda');
	}

	public function order()
	{
		return $this->hasMany(Order::class, 'id_moneda');
	}
}

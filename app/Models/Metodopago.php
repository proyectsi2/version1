<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metodopago extends Model
{
	protected $table = 'metodopago';
	public $timestamps = true;

	protected $fillable = [
		'nombre',
		'descripcion'
	];

	public function order()
	{
		return $this->hasMany(Order::class, 'id_metodo_pago');
	}
}


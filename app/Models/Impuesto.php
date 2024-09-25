<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Impuesto extends Model
{
	protected $table = 'impuesto';
	public $timestamps = true;

	protected $casts = [
		'porcentaje' => 'float'
	];

	protected $fillable = [
		'nombre',
		'porcentaje'
	];

	public function order()
	{
		return $this->hasMany(Order::class, 'id_impuesto');
	}
}

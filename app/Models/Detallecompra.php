<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detallecompra extends Model
{
	protected $table = 'detallecompra';

	protected $casts = [
		'compra_id' => 'int',
		'products_id' => 'int',
		'cantidad' => 'int'
	];

	protected $fillable = [
		'compra_id',
		'products_id',
		'cantidad'
	];

	public function compra()
	{
		return $this->belongsTo(Compra::class);
	}

	public function product()
	{
		return $this->belongsTo(Product::class);
	}
}

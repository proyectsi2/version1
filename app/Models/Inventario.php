<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
	protected $table = 'inventario';
	public $timestamps = true;

	protected $casts = [
		'id_producto' => 'int',
		'id_tienda' => 'int',
		'cantidad' => 'int'
	];

	protected $fillable = [
		'id_producto',
		'id_tienda',
		'cantidad'
	];

	public function product()
	{
		return $this->belongsTo(Product::class, 'id_product');
	}

	public function tienda()
	{
		return $this->belongsTo(Tienda::class, 'id_tienda');
	}
}

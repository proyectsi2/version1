<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'name',
        'slug',
        'details',
        'description',
        'product_code',
        'main_image',
        'alt_images',
        'price',
        'quantity',
        'archivo',
    ];

    /**
    * The attributes that should be cast to native types.
    *
    * @var array
    */
    protected $casts = [
        'alt_images' => 'array',
    ];

        /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray() {
        $array = $this->toArray();

        $array2 = [
            'categories' => $this->categories->pluck('name')->toArray(),
        ];

        return array_merge($array, $array2);
    }

    /**
     * The categories that belong to the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories(): BelongsToMany {
        return $this->belongsToMany(Category::class);
    }

    /**
     * The orders that belong to the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    /*public function orders(): BelongsToMany {
        return $this->belongsToMany(Order::class);
    }

    public function detallecompra()
	{
		return $this->hasMany(Detallecompra::class);
	}

	public function proveedor()
	{
		return $this->belongsTo(Proveedor::class, 'id_proveedor');
	}*/

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'id_vendedor');
	}

	/*public function inventario()
	{
		return $this->hasMany(Inventario::class, 'id_products');
	}*/
}

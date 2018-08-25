<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['product_id', 'product_name', 'category_id', 'manufacture_id', 'product_short_description', 'product_price', 'product_image', 'product_size', 'product_color', 'product_status'];

    /**
	 * Get the route key for the model.
	 *
	 * @return string
	 */
	public function getRouteKeyName()
	{
	    return 'product_id';
	}
}

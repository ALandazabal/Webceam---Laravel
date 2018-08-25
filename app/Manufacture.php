<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manufacture extends Model
{
    protected $fillable = ['manufacture_id', 'manufacture_name', 'manufacture_description', 'manufacture_status'];
    /**
	 * Get the route key for the model.
	 *
	 * @return string
	 */
	public function getRouteKeyName()
	{
	    return 'manufacture_id';
	}
}

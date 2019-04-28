<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BidBodyType extends Model
{
    protected $fillable = ['name','slug'];

    public function fuels(){
    	return $this->hasMany(BidVehicleDetail::class, 'bodytype');
    }
}

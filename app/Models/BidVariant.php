<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BidVariant extends Model
{
    protected $fillable = ['make_id','model_id','name','slug'];

    public function vehicle_detail(){
    	return $this->hasMany(BidVehicleDetail::class, 'variant_id');
    }

    public function makes(){
    	return $this->belongsTo(BidMake::class, 'make_id');
    }

    public function model(){
    	return $this->belongsTo(BidModel::class, 'model_id');
    }
}

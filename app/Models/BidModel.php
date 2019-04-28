<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BidModel extends Model
{
    protected $fillable = ['make_id','name','slug'];

    public function variants(){
    	return $this->hasMany(BidVariant::class, 'model_id');
    }
}

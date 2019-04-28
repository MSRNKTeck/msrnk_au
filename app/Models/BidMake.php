<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BidMake extends Model
{
    protected $fillable = ['name','slug'];

    public function models(){
    	return $this->hasMany(BidModel::class, 'make_id');
    }
}

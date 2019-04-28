<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BidDocumentType extends Model
{
    protected $fillable = ['name','slug'];

    public function document_type(){
    	return $this->hasMany(BidDocumentName::class, 'document_type_id');
    }
}

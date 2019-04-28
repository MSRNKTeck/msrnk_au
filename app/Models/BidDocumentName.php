<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BidDocumentName extends Model
{
    protected $fillable = ['name','document_type_id','slug'];

    public function document_name(){
    	return $this->hasMany(BidUserDocument::class, 'document_name_id');
    }
}

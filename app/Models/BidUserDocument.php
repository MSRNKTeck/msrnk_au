<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BidUserDocument extends Model
{
    protected $fillable = ['user_id','document_type_id','document_name_id','number','file','document_status'];

    public function document_type(){
    	return $this->belongsTo(BidDocumentType::class, 'document_type_id');
    }

    public function document_name(){
    	return $this->belongsTo(BidDocumentName::class, 'document_name_id');
    }

    public function status(){
    	return $this->belongsTo(BidUserStatus::class, 'document_status');
    }

    public function users(){
    	return $this->belongsTo(Models\User::class, 'user_id');
    }
}

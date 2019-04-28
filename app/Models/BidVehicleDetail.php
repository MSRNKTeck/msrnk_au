<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BidVehicleDetail extends Model
{
     protected $fillable = ['make_id','model_id','variant_id','fuel','bodytype','model_year','number_of_owners','car_color','car_kms_driven','car_reg_num','car_reg_place','car_condition','licence_plate_number','vin_number','purchase_year','insurance_validity','vehicle_value','min_bid_price','bid_start_time','bid_end_time','bid_date','bid_status'];

    public function vehicle_make(){
       return $this->belongsTo(BidMake::class,'make_id');
    }

    public function vehicle_model(){
       return $this->belongsTo(BidVehicleModel::class,'model_id');
    }

    public function vehicle_variant(){
       return $this->belongsTo(BidVariant::class,'variant_id');
    }

    public function vehicle_fuel(){
       return $this->belongsTo(BidFuel::class,'fuel');
    }

     public function vehicle_body(){
       return $this->belongsTo(BidBodyType::class,'bodytype');
    }

    public function bid_status(){
    	return $this->belongsTo(BidVehicleStatus::class, 'bid_status')
    }

    public function vehicle_images(){
      return $this->hasMany(BidVehicleImage::class,'vehicle_detail_id');
    }
}

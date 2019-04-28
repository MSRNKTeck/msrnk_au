<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Models\BidMake;
use Illuminate\Http\Request;

class MakeController extends Controller
{
	public function make()
	{
		$make = BidMake::all();
    	return response()->json(['success'=>'successfully!', 'data'=>$make], 200);
	}

	public function make_store(Request $request)
	{
		$make = new BidMake;
		$make['name'] = $request->get('name');
		$make->save();
		if($make){
			return response()->json(['success'=>'successfully!', 'data'=>$make], 200);
		}else{
			return response()->json(['error'=>'something was wroung'], 401);
		}
	}

	public function make_edit(Request $request, $id)
	{
		$make = BidMake::where('id','=',$id)->first();
		return response()->json(['success'=>'successfully!', 'data'=>$make], 200);
	}

	public function make_update(Request $request, $id)
	{
		$make['name'] = $request->get('name');
		$result = BidMake::where('id','=',$id)->update($make);
		return response()->json(['success'=>'successfully!'], 200);
	}
    
}

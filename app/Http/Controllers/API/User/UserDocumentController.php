<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserCollection;
use App\Models\BidDocumentType;
use App\Models\BidUserDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;


class UserDocumentController extends Controller
{
    public function document_type()
    {
    	$document_type = BidDocumentType::all();
    	return response()->json(['success'=>'success','data'=>$document_type], 200);
    }

    public function document_type1()
    {
    	return new UserCollection(BidDocumentType::all());
    }

    public function document_name()
    {
        $document_name = BidDocumentName::all();
        return response()->json(['success'=>'success','data'=>$document_name], 200);
    }

    public function document_store(Request $request)
    {
    	
    	$document = BidUserDocument::where('user_id','=',Auth::user()->id)->where('document_type_id','=',$request->get('document_type_id'))->first();
    	if($document){
    		$data['number'] = $request->get('number');
    		$data['file'] = $request->get('file');
    		// $filename =$request->file('file');
	     //    $filename->getClientOriginalExtension();
	     //    $filename = $filename->store('public/file');
	     //    $filename = str_replace('public/file/', '', $filename);
	     //    $data['file']= $filename;
	        $data['document_status'] = 1;

	        $result = BidUserDocument::where('id','=', $document->id)->update($data);
	        if($result){
	        	return response()->json(['msg'=>'success','data'=>$result], 200);
	        }else{
	        	return response()->json(['msg'=>'Somthing is wrong'], 401);
	        }

    	}else{
    		$data = new BidUserDocument;
    		$data['number'] = $request->get('number');
    		$data['document_type_id'] = $request->get('document_type_id');
    		$data['user_id'] = Auth::user()->id;
    		$data['file'] = $request->get('file');
    		// $filename =$request->file('file');
	     //    $filename->getClientOriginalExtension();
	     //    $filename = $filename->store('public/file');
	     //    $filename = str_replace('public/file/', '', $filename);
	     //    $data['file']= $filename;
	        $data['document_status'] = 1;

	        $data->save();
	        if($data){
	        	return response()->json(['msg'=>'success','data'=>$data], 200);
	        }else{
	        	return response()->json(['msg'=>'Somthing is wrong'], 401);
	        }

    	}
    }

    public function formSubmit(Request $request)

    {
      //s  return $request->get('document_type_id');

        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $imageName);
        // $data = new BidUserDocument;
        // $data['user_id'] = Auth::user()->id;
        // $data['number'] = $request->get('number');
        // $data['document_type_id'] = $request->get('document_type_id');

        // $filename =$request->file('image');
        // $filename->getClientOriginalExtension();
        // $filename = $filename->store('public/file');
        // $filename = str_replace('public/file/', '', $filename);
        // $data['file']= $filename;
        // $data['document_status'] = 1;
        $data->save();

        return response()->json(['success'=>'You have successfully upload image.']);

    }

    public function user_profile()
    {
    	//$user =User::with('user_document')->where('id','=', Auth::user()->id)->get();
    	$user = BidUserDocument::with('document_type')->where('user_id','=',Auth::user()->id)->get();
    	return response()->json(['msg'=>'success','data'=>$user], 200);
    }
}

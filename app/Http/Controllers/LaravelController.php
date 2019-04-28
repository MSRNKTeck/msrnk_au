<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaravelController extends Controller
{
    public function s3_bucket()
    {
    	$photo = $request->file('speaker_image');
		$imageName = time().'.'.$request->file('speaker_image')->getClientOriginalExtension();
		$image =$photo;
		$t = Storage::disk('s3')->put('Gallery/'.$imageName, file_get_contents($image), 'Gallery');
		$url='Gallery/'.$imageName;
		$imageName = Storage::disk('s3')->url($url);
		$data['image'] = $imageName;
    }

    public function s3_bucket1()
    {

		$award['name']=$request->get('name');
	    $award['description']=$request->get('description');
	    if($request->hasFile('award_image')) {
           $award_image = $request->file('award_image');
           $unique_ID =  uniqid();

           $image_ext = $award_image->getClientOriginalExtension();
           $image_name = $unique_ID.'.'.$image_ext;

           $image = (string) Image::make($award_image->getRealPath())->resize(64, 64,
               function ($constraint) {
                   $constraint->aspectRatio();
           })
           ->encode($image_ext, 100);

           // removing spaces
           $award_name= str_replace(' ', '-', $request->name);

           $s3 = Storage::disk('s3');
           $imagePath = 'award_image/'.$award_name.'/'.$image_name;
           $s3->put($imagePath, $image);

           $award['award_image'] = $imagePath;
	    }
	    $result= Award::create($award);
	    if($result)
	    {
	        Session::flash('message', 'Successfully Created!'); 
	        return redirect('admin/awards');
	    }
    }
}

<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    //
    public function imageUpload()
    {
        return view('add');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function imageUploadPost(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('images'), $imageName);
         $this->validate($request, [
    'title' => 'required'
    ]);
    echo $request->title;
    DB::table('posts')->insert(
  ['title' => $request->title,
  'body' => $request->description,
  'img'=>$imageName,
  'tags'=>$request->tags,
  'created_at'=>date("Y-m-d H:i:s")
  ]
);
       // return back() ;

    }
}

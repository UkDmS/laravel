<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
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

        $imageName =  time().'.'.$request->image->extension();

        $request->image->move(public_path('images'), $imageName);
        $this->validate($request, [
            'title' => 'required'
        ]);
        $idPost = DB::table('posts')->insertGetId(
                    ['title' => $request->title,
                    'body' => $request->description,
                    'img'=>$imageName,
                    'created_at'=>date("Y-m-d H:i:s"),
                    'updated_at'=>date("Y-m-d H:i:s")
                    ]
        );
        foreach($request->options as $item){
            DB::table('tagsPosts')->insert(
                [
                    'posts_id' => $idPost,
                    'tags_id' => $item
                ]
            );
        }
        return redirect()->route('list');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListController extends Controller
{
    //
    public function printList(){
        $list = DB::table('posts')->select('id','title','body','img','created_at','updated_at')->get();

        $tagsPosts = DB::table('tagsPosts')->select('tagsPosts.posts_id','tags.tag')
        ->join('tags', 'tags.id', '=', 'tagsPosts.tags_id')
        ->get();

        return view('list', compact('list','tagsPosts'))->render();
    }
    public function del($id){
        DB::table('posts')->where('id', '=', $id)->delete();
        return redirect()->route('list');
    }
    public function editPost($id){
        $edit = DB::table('posts')->select('id','title','body','img')->where('id','=',$id)->get();
        $edit = (object)$edit[0];
        $tag = DB::table('tags')->select('id','tag')->get();
        $tagsPosts = DB::table('tags')->select('tag')
        ->join('tagsPosts', 'tagsPosts.tags_id', '=', 'tags.id')
        ->where('tagsPosts.posts_id','=',$id)
        ->get()->toArray();
        if(count($tagsPosts)>0){
            foreach($tagsPosts as $item){
                $arrayTagsPosts[] = $item->tag;
            }
            return view('edit', compact('edit','tag','arrayTagsPosts'))->render();
        }
        else{
            return view('edit', compact('edit','tag'))->render();
        }


    }
    public function saveChange(Request $request, $id){
        if(empty($_FILES['image']['name'][0])){
            DB::table('posts')
                ->where('id', $id)
                ->update([
                    'title' => $request->title,
                    'body' => $request->description,
                    'updated_at' => date("Y-m-d H:i:s")
            ]);
        }
        else {
            $imageName =  time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            DB::table('posts')
                ->where('id', $id)
                ->update([
                    'title' => $request->title,
                    'body' => $request->description,
                    'img' => $imageName,
                    'updated_at' => date("Y-m-d H:i:s")
                ]);
        }

        DB::table('tagsPosts')->where('posts_id', '=', $id)->delete();
        if(!empty($request->options)){
            foreach($request->options as $item){
                DB::table('tagsPosts')->insert(
                    [
                        'posts_id' => $id,
                        'tags_id' => $item
                    ]
                );
            }
        }

        return redirect()->route('list');
    }
}

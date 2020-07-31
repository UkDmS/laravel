<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddController extends Controller
{
    //
    public function show()
    {
        $tag = DB::table('tags')->select('id','tag')->get();
        return view('add', ["tag" => $tag]);
    }
    public function saveTag(Request $request){
        $id=DB::table('tags')->insertGetId(
            ['tag' => $request->tag]
        );
        return $id;
    }
}

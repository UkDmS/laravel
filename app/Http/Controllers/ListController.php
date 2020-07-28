<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListController extends Controller
{
    //
    public function printList(){
                 $list = DB::table('posts')->select('id','title','body','img','tags','created_at')->get();
                 print_r($list)    ;

                 return view('list', compact('list'))->render();
    }
}

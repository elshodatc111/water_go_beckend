<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller{
    public function index(){
        $Post1 = Post::orderBy('count', 'desc')->limit(5)->get();
        $Post = array();
        foreach ($Post1 as $key => $value) {
            $Post[$key]['id'] = $value->id;
            $Post[$key]['title'] = $value->title;
            $Post[$key]['discriotion'] = substr(strip_tags($value->discriotion),0,120);
        }
        return view('welcome',compact('Post'));
    }
    public function post_show($id){
        $Post = Post::find($id);
        return view('show',compact('Post'));
    }
    public function search(Request $request){
        $key = $request->search;
        $Post1 = Post::where('title', 'like', '%' . $key . '%')->orderBy('count', 'desc')->get();
        $PostArray = array();
        foreach ($Post1 as $key => $value) {
            $PostArray[$key]['id'] = $value->id;
            $PostArray[$key]['title'] = $value->title;
            $PostArray[$key]['discriotion'] = substr(strip_tags($value->discriotion), 0, 120);
            $value->count += 1;
            $value->save();
        }
        $count = count($Post1);
        return view('search',compact('PostArray','key','count'));
    }
}

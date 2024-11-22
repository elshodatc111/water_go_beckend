<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Title;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class TitleController extends Controller
{
    public function show(Request $request){
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
        ]);
        $searchTerm = $request['title'];
        $results = Title::where('title', 'like', '%' . $searchTerm . '%')
        ->orWhere('discription', 'like', '%' . $searchTerm . '%')
        ->get();
        return view('show',compact('results','searchTerm'));
    }
    public function showUpdate($id){
        $Title = Title::find($id);
        return view('update',compact('Title'));
    }
    public function showUpdateStory(Request $request, $id){
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'discription' => ['required','string'],
        ]);
        $Title = Title::find($id);
        $Title['title']=$request->title;
        $Title['discription']=$request->discription;
        $Title['email']=auth()->user()->email;
        $Title->save();
        return redirect()->back()->with('success', "A post has been updated.");
    }
    public function showDeleteStory($id){
        $Title =Title::find($id);
        $Title->delete();
        return redirect()->route('home')->with('success', "A post has been deleted.");
    }
    public function all(){
        $results = Title::get();
        return view('all',compact('results'));
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Title;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function home(){
        return view('home');
    }
    public function createSubject(){
        return view('create');
    }    
    public function createStory(Request $request){
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'discription' => ['required','string'],
        ]);
        Title::create([
            'title'=>$request->title,
            'discription'=>$request->discription,
            'email'=>auth()->user()->email,
        ]);
        return redirect()->back()->with('success', "A new post has been created.");
    }
    public function Employees(){
        $User = User::get();
        return view('employees',compact('User'));
    }
    public function EmployeesDelete($id){
        $user =User::find($id);
        if(auth()->user()->id==$id){
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            $user->delete();
            return redirect()->route('home');
        }else{
            $user->delete();
            return redirect()->back()->with('success1', "The employee has been deleted.");
        }
    }
    public function EmployeesStory(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required'],
        ]);
        $user = User::create([
            'name' => $request->name,
            'type' => 1,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->back()->with('success', "A new employee has been created.");
    }
}

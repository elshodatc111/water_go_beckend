<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function post_create(){
        return view('post_create');
    }
    public function post_creates(Request $request){
        $validate = $request->validate([
            'title' => 'required',
            'discriotion' => 'required',
        ]);
        Post::create([
            'title' => $request->title,
            'discriotion' => $request->discriotion,
            'user' => auth()->user()->name,
            'count' => 0,
        ]);
        return redirect()->back()->with('status', "Yangi post qo'shildi.");
    }
    public function user(){
        $User = User::where('email','!=',auth()->user()->email)->get();
        return view('users',compact('User'));
    }
    public function user_create(Request $request){
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make('12345678'),
        ]);
        return redirect()->back()->with('status', "Yangi hodim qo'shildi. Parol: 12345678");
    }
    public function user_delete($id){
        $User = User::find($id);
        $User->delete();
        return redirect()->back()->with('status', "Hodim o'chirildi");
    }
    public function profile(){
        return view('profile');
    }
    public function updatePassword(Request $request){
        $request->validate([
            'current_password' => ['required', 'string'],
            'new_password' => ['required', 'string', 'min:8', 'confirmed'], 
        ]);
        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return back()->withErrors(['current_password' => 'Joriy parol noto‘g‘ri']);
        }
        $user = Auth::user();
        $user->password = Hash::make($request->new_password);
        $user->save();
        return redirect()->back()->with('status', 'Parolingiz muvaffaqiyatli yangilandi!');
    }
}

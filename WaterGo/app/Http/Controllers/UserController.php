<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $Company = Company::find(auth()->user()->company_id);
        $User = User::where('company_id',auth()->user()->company_id)->where('user_status','!=','delete')->get();
        return view('emploes.index',compact('Company','User'));
    }
    public function emploes_create($id, Request $request){
        $validate = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
        ]);
        User::create([
            'company_id'=>$id, 
            'name'=>$request->name, 
            'phone'=>$request->phone, 
            'role'=>$request->role, 
            'user_status'=>'true', 
            'devase'=>'NULL', 
            'image'=>'NULL', 
            'email'=>$request->address,
            'password'=>Hash::make('12345678'),
        ]);
        return redirect()->back()->with('success', "Yangi hodim qo'shildi. Parol: 12345678.");
    }

    public function emploes_show($id){
        return view('emploes.show');
    }
}

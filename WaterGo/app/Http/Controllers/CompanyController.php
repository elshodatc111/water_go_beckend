<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CompanySmsText;
use App\Models\Company;
use App\Models\CompanyBalans;
use App\Models\CompanyPaket;
use App\Models\CompanyMessage;
use Illuminate\Support\Facades\Hash;

class CompanyController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $Company = Company::get();
        return view('admin.company',compact('Company'));
    }

    public function crate(Request $request){
        $validate = $request->validate([
            'company_name' => ['required', 'string', 'max:255'],
            'drektor' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:16'],
            'addres' => ['required', 'string', 'max:255'],
            'paymart' => ['required', 'numeric'],
        ]);
        $Company = Company::create([
            'company_name' => $request->company_name,
            'drektor' => $request->drektor,
            'phone' => $request->phone,
            'addres' => $request->addres,
            'balans' => 0,
            'paymart' =>$request->paymart,
            'message_status' => 'true',
            'company_status' => 'true',
        ]);
        CompanyMessage::create([
            'company_id' => $Company->id,
            'send_message' => 0,
            'paymart_messaga' => 0,
        ]);
        CompanySmsText::create([
            'company_id' => $Company->id,
            'text' => 'NULL',
        ]);
        return redirect()->back()->with('success', "Yangi kompaniya ochildi.");
    }

    public function company_show($id){
        $Company = Company::find($id);
        $User = User::where('company_id',$id)->where('user_status','!=','delete')->get();
        $CompanyBalans = CompanyBalans::where('company_id',$id)->get();
        $CompanyMessage = CompanyMessage::where('company_id',$id)->first();
        $countSms = $CompanyMessage->paymart_messaga-$CompanyMessage->send_message;
        $CompanyPaket = CompanyPaket::where('company_id',$id)->get();
        $CompanySmsText = CompanySmsText::where('company_id',$id)->first();
        $message = $CompanySmsText->text;
        return view('admin.company_show',compact('Company','CompanyBalans','countSms','CompanyPaket','User','message'));
    }

    public function company_update_one($id, Request $request){
        $validate = $request->validate([
            'company_name' => ['required', 'string', 'max:255'],
            'drektor' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:16'],
            'addres' => ['required', 'string', 'max:255'],
        ]);
        $Company = Company::find($id);
        $Company->company_name = $request->company_name;
        $Company->drektor = $request->drektor;
        $Company->phone = $request->phone;
        $Company->addres = $request->addres;
        $Company->save();
        return redirect()->back()->with('success', "Kompaniya ma'lumotlari yangilandi.");
    }

    public function company_update_two($id, Request $request){
        $validate = $request->validate([
            'paymart' => ['required', 'string', 'max:255'],
            'company_status' => ['required', 'string', 'max:255'],
            'message_status' => ['required', 'string', 'max:16'],
        ]);
        $Company = Company::find($id);
        $Company->paymart = $request->paymart;
        $Company->company_status = $request->company_status;
        $Company->message_status = $request->message_status;
        $Company->save();
        return redirect()->back()->with('success', "Kompaniya ma'lumotlari yangilandi.");
    }

    public function company_paymart_create($id, Request $request){
        $validate = $request->validate([
            'summa' => ['required', 'string', 'max:255'],
            'about' => ['required', 'string', 'max:255'],
        ]);
        CompanyBalans::create([
            'company_id' => $id,
            'summa' => $request->summa,
            'about' => $request->about,
        ]);
        $Company = Company::find($id);
        $Company->balans = $request->summa + $Company->balans;
        $Company->save();
        return redirect()->back()->with('success', "Kompaniyaga to'lov kiritildi.");
    }

    public function company_paket_create($id, Request $request){
        $validate = $request->validate([
            'count' => ['required', 'string', 'max:255'],
            'about' => ['required', 'string', 'max:255'],
        ]);
        $CompanyMessage = CompanyMessage::where('company_id',$id)->first();
        $CompanyMessage->paymart_messaga = $CompanyMessage->paymart_messaga + $request->count;
        $CompanyMessage->save();
        CompanyPaket::create([
            'company_id'=>$id,
            'count' => $request->count,
            'about' => $request->about,
        ]);
        return redirect()->back()->with('success', "SMS paketi kiritildi.");
    }

    public function company_user_create($id, Request $request){
        $validate = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255'],
        ]);
        User::create([
            'company_id'=>$id, 
            'name'=>$request->name, 
            'phone'=>$request->phone, 
            'role'=>$request->role, 
            'user_status'=>'true', 
            'devase'=>'NULL', 
            'image'=>'NULL', 
            'email'=>$request->email,
            'password'=>Hash::make('12345678'),
        ]);
        return redirect()->back()->with('success', "Kompaniyaga yangi hodimqo'shildi. Parol: 12345678.");
    }

    public function company_user_delete($id){
        $User = User::find($id);
        $User->user_status = 'delete';
        $User->save();
        return redirect()->back()->with('success', "Hodim o'chirildi");
    }

    public function company_sms_text_update($id, Request $request){
        $validate = $request->validate([
            'text' => ['required', 'string', 'max:255'],
        ]);
        $CompanySmsText = CompanySmsText::where('company_id',$id)->first();
        $CompanySmsText->text = $request->text;
        $CompanySmsText->save();
        return redirect()->back()->with('success', "SMS matni saqlandi.");
    }

}

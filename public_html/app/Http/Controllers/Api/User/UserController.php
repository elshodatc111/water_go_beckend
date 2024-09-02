<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Grops;
use App\Models\UserPaymart;
use App\Models\MarkazRoom;
use App\Models\MarkazCoursTest;
use App\Models\GropsTime;
use App\Models\Markaz;
use App\Models\UserHistory;
use App\Models\MarkazBalans;
use App\Models\MarkazPaymart;
use App\Models\UserGroup;
use App\Models\UserTest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    // Login auth
    public function login(Request $request){
        try{
            $validateUser = Validator::make($request->all(),[
                'email' => 'required',
                'password' => 'required'
            ]);
            
            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'Malumotlar to\'liq emas',
                    'errors' =>$validateUser->errors()
                ],401);
            }

            if (!Auth::attempt($request->only(['email','password']))) {
                return response()->json([
                    'status' => false,
                    'message' => 'Login yoki parol xato'
                ],401);
            }

            $User = User::where('email',$request->email)->first();
            if($User->role_id != 6){
                return response()->json([
                    'status' => false,
                    'message' => 'Siz bizning talabamiz emasssiz'
                ],401);
            }

            return response()->json([
                'status' => true,
                'message' => 'Success',
                'data' => [
                    'token' => $User->createToken("API TOKEN")->plainTextToken,
                    'markaz_id' => $User->markaz_id,
                    'name' => $User->name,
                    'phone' => $User->phone1,
                    'addres' => $User->addres,
                    'tkun' => $User->tkun,
                    'balans' => $User->balans,
                    'email ' => $User->email,
                ]
            ],200);

        } catch(\Throwable $th){
            return response()->json([
                'status'=>false,
                'message'=>$th->getMessage(),
            ],500);
        }
    }
    // Profel
    public function profile(){
        return response()->json([
            'status' => true,
            'message' => 'Profile Information',
            'data' => array([
                'id'=> auth()->user()->id,
                'name'=> auth()->user()->name,
                'phone1'=> auth()->user()->phone1,
                'phone2'=> auth()->user()->phone2,
                'tkun'=> auth()->user()->tkun,
                'addres'=> auth()->user()->addres,
                'email'=> auth()->user()->email,
                'balans'=> auth()->user()->balans,
                'created_at'=> auth()->user()->created_at,
            ]),
            'id' => auth()->user()->id
        ],200);
    }
    // Logout
    public function logout(){
        auth()->user()->delete();
        return response()->json([
            'status' => true,
            'message' => 'User logged out',
            'data' => [],
        ],200);
    }
    // Groups
    public function groups(){
        $Grops = UserGroup::where('user_id',auth()->user()->id)->where('status','true')->get();
        $MyCroups = array();
        foreach ($Grops as $key => $value) {
            $Grops = Grops::find($value->grops_id);
            $Start = $Grops->guruh_start;
            $End = $Grops->guruh_end;
            $MyCroups[$key]['guruh_id'] = $value->grops_id;
            $MyCroups[$key]['guruh_name'] = $Grops->guruh_name;
            $MyCroups[$key]['image'] = "https://picsum.photos/536/354";
        }
        return response()->json([
            'status' => true,
            'message' => 'User group',
            'data' => $MyCroups,
        ],200);
    }
    // Group
    public function groupsShow($id){
        $Grops = Grops::find($id);
        $response = array();
        $response['group'] = [
            'guruh_id' => $Grops->id,
            'cours_id' => $Grops->cours_id,
            'guruh_name' => $Grops->guruh_name,
            'guruh_start' => $Grops->guruh_start,
            'guruh_end' => $Grops->guruh_end,
            'hafta_kun' => $Grops->hafta_kun,
            'dars_count' => $Grops->dars_count,
            'dars_time' => $Grops->dars_time,
            'created_at' => $Grops->created_at,
            'techer' => User::find($Grops->techer_id)->name,
            'room' => MarkazRoom::find($Grops->room_id)->room_name,
            'tulov_summa' => MarkazPaymart::find($Grops->tulov_id)->summa,
            'data' => GropsTime::where('grops_id',$Grops->id)->select('data')->get(),
        ];
        return response()->json([
            'status' => true,
            'message' => 'Groups Show',
            'data' => $response,
        ],200);
    }
    // Paymart
    public function paymarts(){
        $Paymart = array();
        $UserPaymart = UserPaymart::where('user_id',auth()->user()->id)->get();
        foreach ($UserPaymart as $key => $value) {
            $Paymart[$key]['id'] = $value->id;
            $Paymart[$key]['image'] = 'https://picsum.photos/536/354';
            $Paymart[$key]['summa'] = $value->summa;
            $Paymart[$key]['type'] = $value->tulov_type;
            $Paymart[$key]['data'] = $value->created_at;
        }
        return response()->json([
            'status' => true,
            'message' => 'User paymart',
            'data' => $Paymart,
        ],200);
    }

}

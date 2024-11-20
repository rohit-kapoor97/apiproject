<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;


class ApiController extends Controller
{
   public function register(request $req){
     $req->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
        'password' => ['required'],

     ]);

     $user=User::create([
        'name' => $req->name,
        'email' => $req->email,
        'password' => $req->password
     ]);
     return response()->json([
        "Status"=>"You register successfully",
        'user'=>$user
     ]);
   }

   public function login(Request $request){
     if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
        return response()->json([
            "message"=>"you login successfully",
        ]);
     }else{
        return response()->json([
            "message"=>"record not found",

        ]);
     }
   }

   public function getuser(){
    $data=User::all();
    return response()->json([
        "data"=>$data
    ]);
   }
 public function getuserbyId($id){
    $user=User::findorFail($id)->first();
    return response()->json([
        "user"=>$user
    ]);
 }

 public function edituser(request $req, $id){
    $user=User::where('id', $req->id )->update([

        'name' => $req->name,
        'email' => $req->email,
       

    ]);
    return response()->json([
        "message"=>"user update successfully",
        "user"=>$user
    ]);
 }
   public function deleteuser($id){
    $del=User::findorFail($id)->delete();

        return response()->json([
            "message"=>"user delete successfully",
            "user"=>$del
        ]);
    }

   

}

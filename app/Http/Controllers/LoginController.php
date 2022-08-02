<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\loginrequest;

class LoginController extends Controller
{
    function register()
    {
        return view('login.register');
    }
    function add(Request $request)
    {
        if($request->password==$request->passwords){
            $user = new User();
            $user ->name = $request->name;
            $user ->day_of_birth = $request->day_of_birth;
            $user ->email = $request->email;
            $user ->password = bcrypt("$request->password");
            $user->gender = $request->gender;
            $user->save();
            return redirect()->route('login');
        } else {
            dd('password ko trùng khớp');
        }  
    }
    function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('login');
    }
    function login()
    {    
        if (Auth::check()) {
            return redirect()->route('index');
        } else {
            return view('login.login');
        }
        
    }
    function loginProcessing(loginrequest $request)
    {       
        $arr=[
            'email' => $request->email, 
            'password' => $request->password
        ];
        if (Auth::attempt($arr)) {
            // dd($arr);
            return redirect()->route('index');
        } else {
            $kq='tài khoản, hoặc mật khẩu không tồn tại';
            return view('login.login', compact('kq'));
        } 
    }
    public function index()
    {
      $user = User::all();
      return response()->json(['user'=>$user], 200);
    }

    public function show($id)
    {
      $user = User::find($id);
      return response()->json(['user'=>$user], 200);
    }
}

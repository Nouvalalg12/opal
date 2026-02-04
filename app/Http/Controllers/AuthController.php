<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller {
    public function login(Request $r){
        $user = User::where('username',$r->username)->first();
        if($user && Hash::check($r->password,$user->password)){
            session(['user'=>$user]);
            return $user->role=='admin' ? redirect('/admin') : redirect('/siswa');
        }
        return back();
    }

    public function logout(){
        session()->flush();
        return redirect('/login');
    }
}

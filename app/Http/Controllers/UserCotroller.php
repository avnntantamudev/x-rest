<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\user;

class UserCotroller extends Controller
{
    //store
    public function store(Request $request){
        $data = [
            'name' =>$request->name,
            'email' =>$request->email,
            'password' =>bcrypt($request->password),
            'estato' =>$request->tipo_usuario,
            'remember_token' =>$request->_token,
            'email_verified_at' =>now(),
        ];

        user::create($data);
        alert()->success('Usuario cadastrado');
        return redirect()->back();
    }

    public function auth(Request $request){
        if(auth::attempt(['email'=>$request->email, 'password' => $request->password])){
            if(auth()->user()->estato == 'Admin'){
                return redirect()->route('admin.home');
            }else if(auth()->user()->estato == 'Funcionario'){
                return redirect()->route('funcionario.home');
            }
        }else{
            alert()->error('Email ou Senha Invalida');
            return redirect()->back();
        }
    }

    public function logout(Request $request){
        auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home.index');
    }
}

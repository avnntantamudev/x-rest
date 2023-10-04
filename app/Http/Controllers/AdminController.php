<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    categoria,
    user
};

class AdminController extends Controller  
{
    public function index(){
        return view('admin.home');
    }

    public function stock(){
        $categorias = categoria::get()->all();
        return view('admin.stock', compact('categorias'));
    }

    public function produtoCadastrar(){
        return view('admin.produto');
    }

    public function categoriaCadastrar(){
        return view('admin.categoria');
    }

    public function usuario(){
        $usuarios = user::get()->all();
        return view('admin.usuario',compact('usuarios'));
    }

    public function venda(){
        return view('admin.venda');
    }
    public function vender($id){
        return view('admin.vender',compact('id'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    categoria
};

class CategoriaCotroller extends Controller
{
    public function store(Request $request){
        $data = [
            'categoria' => $request->categoria,
            'decricao' => $request->descricao,
        ];
        categoria::create($data);
        alert()->success('Categoria Registrada');
        return redirect()->back();
    }

    public function destroy($id){
        $categoria = categoria::find($id);
        if($categoria){
            $categoria->delete();
            alert()->success('Categoria Eliminada');
        }else{
            alert()->error('Categoria não encontrada');
        }
        return redirect()->back();
    }
}

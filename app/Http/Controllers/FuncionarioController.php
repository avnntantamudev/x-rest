<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Morada;
use App\Models\Artigo;
use App\Models\Telefone;
use App\Models\Dados_Comercial;
use App\Models\familiaArtigo;
use App\Models\Vendas;
use App\Models\Produtos_Venda;
use App\Models\Registo_venda;
use App\Models\stock;
use App\Models\documento;
use Barryvdh\DomPDF\Facade\Pdf;
class FuncionarioController extends Controller
{
    //
    public function index(){
        return view('funcionario.home');
    }
    public function cliente(Request $request){
        $clientes = cliente::get()->all();
        return view('funcionario.cliente',compact('clientes'));
    }
    public function documento(){ 
        $artigos = Artigo::get()->all();
        $documentos = documento::get()->all();
        $entidades = Cliente::get()->all();
        return view('funcionario.documento',compact('entidades','artigos','documentos'));
    } 
    public function artigo(){
        $familias = familiaArtigo::get()->all();
        return view('funcionario.artigo',compact('familias'));
    }
    public function clienteListar(){
        $clientes = cliente::get()->all();
        return view('funcionario.listarCliente', compact('clientes'));
    }
    public function factura(){
        $vendas = Vendas::orderBy('id', 'desc')->get()->all();
        return view('funcionario.venda', compact('vendas'));
    }
    public function artigoStore(Request $request){
        try {
            DB::transaction(function () use ($request) {
                // Criar uma instância do cliente
                $artigo = new artigo();
                $artigo->artigo = $request->artigo;
                $artigo->descricao = $request->descricao;
                $artigo->unidade_base = $request->unidade_base;
                $artigo->componente = $request->componente;
                $artigo->pvp1 = $request->pvp1;
                $artigo->pvp2 = $request->pvp2;
                $artigo->pvp3 = $request->pvp3;
                $artigo->pvp4 = $request->pvp4;
                $artigo->pvp5 = $request->pvp5;
                $artigo->movimenta_conta = $request->movimenta_conta;
                $artigo->cod_barra = $request->cod_barra;
                $artigo->id_familia = $request->id_familia;
                $artigo->save();
        
                
            });
            
            // Retornar uma resposta de sucesso ao usuário
            alert()->success('Artigo cadastrado');
            return redirect()->back();
        } catch (\Exception $e) {
            // Lidar com a exceção e fornecer feedback de erro
            alert()->error('Usuario não cadastrado'. $e->getMessage());
            return redirect()->back();
        }

    } 

    public function clienteStore(Request $request){
        try {
            DB::transaction(function () use ($request) {
                // Criar uma instância do cliente
                $cliente = new Cliente();
                $cliente->nome = $request->nome;
                $cliente->pais = $request->pais;
                $cliente->n_contribuente = $request->n_contribuente;
                $cliente->contrib_pais_origem = $request->contrib_pais_origem;
                $cliente->espaco_fiscal = $request->espaco_fiscal;
                $cliente->regime_iva = $request->regime_iva;
                $cliente->pessoa = $request->pessoa;
                $cliente->provincia = $request->provincia;
                $cliente->save();
        
                // Criar uma instância da Morada
                $morada = new Morada();
                $morada->morada = $request->morada;
                $morada->localidade = $request->localidade;
                $morada->codigo_postal = $request->codigo_postal;
                $morada->cliente_id = $cliente->id; // Associar a morada ao cliente
                $morada->save();
        
                // Criar uma instância do Telefone
                $telefone = new Telefone();
                $telefone->telefone = $request->telefone;
                $telefone->cliente_id = $cliente->id;
                $telefone->save();
        
                // Criar uma instância da Dados_Comercial
                $dados_comercial = new Dados_Comercial();
                $dados_comercial->desconto = $request->desconto;
                $dados_comercial->tipo_preco = $request->tipo_preco;
                $dados_comercial->condi_pagamento = $request->condi_pagamento;
                $dados_comercial->modo_pagamento = $request->modo_pagamento;
                $dados_comercial->cliente_id = $cliente->id; // Associar a morada ao cliente
                $dados_comercial->save();
            });
            
            // Retornar uma resposta de sucesso ao usuário
            alert()->success('Cliente cadastrado');
            return redirect()->back();
        } catch (\Exception $e) {
            // Lidar com a exceção e fornecer feedback de erro
            alert()->error('Usuario não cadastrado'. $e->getMessage());
            return redirect()->back();
        }

    }
    public function familiaStore(Request $request){
        try {
            DB::transaction(function () use ($request) {
                // Criar uma instância do cliente
                $familia = new familiaArtigo();
                $familia->familia = $request->familia;
                $familia->descricao = $request->descricao;
                $familia->save();
        
            });
            
            // Retornar uma resposta de sucesso ao usuário
            alert()->success('Familia cadastrada');
            return redirect()->back();
        } catch (\Exception $e) {
            // Lidar com a exceção e fornecer feedback de erro
            alert()->error('Usuario não cadastrado'. $e->getMessage());
            return redirect()->back();
        }

    }

    public function pesquisarCliente(){

    }
    public function gerarPDF(){
        $clientes = Cliente::all(); // Recupere os dados dos clientes (ajuste conforme seu modelo)

        $pdf = PDF::loadView('funcionario.pdf', compact('clientes'));

        return $pdf->stream('clientes.pdf');
    }
    public function facturaDeVendaPDF($id){

        $venda = Vendas::find($id);
        $produtos = Produtos_Venda::where('venda_id',$venda->id)->get();
         // Recupere os dados dos clientes (ajuste conforme seu modelo)

        $pdf = PDF::loadView('funcionario.vendapdf', compact('venda','produtos'));

        return $pdf->stream('vendas.pdf');
    }
    public function editarCliente($id){
        $cliente = Cliente::find($id);
        $telefones = $cliente->telefones;
        // dd($telefones[0]->telefone);

        $numeroTelefone = $telefones->first()->telefone;

        return view('funcionario.editarCliente', compact('cliente','telefones'));
    }
    
    public function updateCliente(Request $request, $id){
        $cliente = Cliente::find($id);
        // Valide os dados do formulário, você pode usar as regras de validação do Laravel
      
        $cliente->nome = $request->nome;
        $cliente->pais = $request->pais;
        $cliente->n_contribuente = $request->n_contribuente;
        $cliente->contrib_pais_origem = $request->contrib_pais_origem;
        $cliente->espaco_fiscal = $request->espaco_fiscal;
        $cliente->regime_iva = $request->regime_iva;
        $cliente->pessoa = $request->pessoa;
        $cliente->provincia = $request->provincia;
        $cliente->save();
        
        // Criar uma instância da Morada
        foreach ($cliente->moradas as $morada) {
            $morada->morada = $request->morada;
            $morada->localidade = $request->localidade;
            $morada->codigo_postal = $request->codigo_postal;
            $morada->cliente_id = $id; // Associar a morada ao cliente
            $morada->save();
        }
                
        // Criar uma instância do Telefone
        foreach($cliente->telefones as $telefone){
            $telefone = Telefone::where('cliente_id',$id)->first();
            $telefone->telefone = $request->telefone;
            $telefone->cliente_id = $id;
            $telefone->save();
        }
        
        $cliente->dadosComercial->desconto = $request->desconto;
        $cliente->dadosComercial->tipo_preco = $request->tipo_preco;
        $cliente->dadosComercial->condi_pagamento = $request->condi_pagamento;
        $cliente->dadosComercial->modo_pagamento = $request->modo_pagamento;
        $cliente->dadosComercial->cliente_id = $cliente->id; // Associar a morada ao cliente
        $cliente->dadosComercial->save();
           
            // Retornar uma resposta de sucesso ao usuário
        alert()->success('Dados alterados');
        return redirect()->back();
    }
    public function select(Request $request){
        $entidades = Cliente::get()->all();
        $artigos = Artigo::get()->all();
        $documentos = documento::get()->all();
        $doc = documento::find($request->id_documento);
        $cliente = Cliente::find($request->id_cliente);
        return view('funcionario.documento',compact('cliente','entidades','artigos','doc','documentos'));

    }
    public function finalizarCompra(Request $request){

        $data = $request->json()->all(); // Recupera os dados JSON da requisição

        $produtoos = $data['produtos'];

       /*  foreach($produtoos as $produto){
            $dataa=[
                'cliente_id'=> $produto['cliente'],
                'preco_total' => $produto['preco_total'],
            ];
        }
        try{
            $venda = new Vendas();
            $venda->cliente_id = $dataa['cliente_id'];
            $venda->preco_total = $dataa['preco_total'];
            $venda->save();

            foreach($produtoos as $produto){
                $produtov = new Produtos_Venda();
                $produtov->artigo = $produto['nome'];
                $produtov->preco = $produto['preco'];
                $produtov->quantidade = $produto['quantidade'];
                $produtov->venda_id = $venda->id;
                $produtov->save();
            }

        } catch (\Exception $e) {
            // Lidar com a exceção e fornecer feedback de erro
            alert()->error('Usuario não cadastrado'. $e->getMessage());
            return redirect()->back();
        } */ 

        return response()->json([$produtoos]);
    }
    public function finalizarComprapdf(Request $request){

        $data = $request->json()->all(); 
         $produtoos = $data['produtos'];

        foreach($produtoos as $produto){
            $dataa=[
                'cliente'=> $produto['cliente'],
                'preco_total' => $produto['preco_total'],
                'troco' => $produto['troco'],
                'valor_entregue' => $produto['valor_entregue'],
                'forma_pagamento' => $produto['forma_pagamento'],
                'contribuente' => $produto['contribuente'],
                'cliente_id' => $produto['id_cliente'],
                'id' => $produto['id'],
                'quantidade' => $produto['quantidade'],
                'cod_documento' => $produto['cod_documento'],
            ];
            //FAzendo o debito no stock
            $artigo = artigo::find($produto['id'])->first();
            if(($artigo['movimenta_conta'] == "Sim")&&($stock = stock::where('artigo_id',$dataa['id'])->first())){
                $stocka = stock::where('artigo_id',$dataa['id'])->update(['qtd' => ($stock['qtd'] - $dataa['quantidade'])]);
            }
            /* ;
            if($tock->status == "activo"){

            } */
        }
        
        try{
            $venda = new Vendas();
            $venda->cliente_id = $dataa['cliente_id'];
            $venda->preco_total = $dataa['preco_total'];
            $venda->troco = $dataa['troco'];
            $venda->valor_entregue = $dataa['valor_entregue'];
            $venda->forma_pagamento = $dataa['forma_pagamento'];
            $venda->contribuente = $dataa['contribuente'];
            $venda->nome_cliente = $dataa['cliente'];
            $venda->cod_documento = $dataa['cod_documento'];
            $venda->save();

            foreach($produtoos as $produto){
                $produtov = new Produtos_Venda();
                $produtov->artigo = $produto['nome'];
                $produtov->descricao = $produto['descricao'];
                $produtov->preco = $produto['preco'];
                $produtov->quantidade = $produto['quantidade'];
                $produtov->venda_id = $venda->id;
                $produtov->save();
            }
           
        } catch (\Exception $e) {
            // Lidar com a exceção e fornecer feedback de erro
            alert()->error('Usuario não cadastrado'. $e->getMessage());
            return redirect()->back();
        } 
       

        return response()->json([$produtoos]);
    }

}

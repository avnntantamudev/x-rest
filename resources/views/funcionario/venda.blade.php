@section('title','Faturas')
@extends('web.app')
@extends('funcionario.import')
@section('container')

<div class="data-table-area">
    <div class="container">
        @include('sweetalert::alert')
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">
                    <a href="{{ route('funcionario.cliente') }}">
                        <button class="btn btn-primary notika-btn-primary">Novo</button>
                    </a>
                    <a href="{{ route('funcionario.cliente.listar') }}">
                        <button class="btn btn-success notika-btn-success">Listar</button>
                    </a>
                    <a href="{{ route('funcionario.gerarPDF') }}">
                        <button id="meuBotao" class="btn btn-warning notika-btn-warning">Imprimir em PDF</button>
                    </a>
                </div>
                <div class="data-table-list">
                    <div class="basic-tb-hd">
                        <h2>Lista de Vendas</h2>
                    </div>
                    <div class="table-responsive">
                        <table id="data-table-basic" class="table table-striped">
                            <thead>
                                <tr>
                                    <th contenteditable="true">Cod. Venda</th>
                                    <th>Cliente</th>
                                    <th>Contribuente</th>
                                    <th hidden>Forma de Pagamento</th>
                                    <th>Forma de Pagamento</th>
                                    <th>Valor Total</th>
                                    <th>Valor Entregue</th>
                                    <th>Troco</th>
                                    <th>Operação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vendas as $venda)
                                    <tr>
                                        <td>{{$venda->id}}</td>
                                        <td>{{$venda->nome_cliente}}</td>
                                        <td hidden>{{$venda->cod_documento}}</td>
                                        <td>{{$venda->contribuente}}</td>
                                        <td>{{$venda->forma_pagamento}}</td>
                                        <td>{{$venda->preco_total}}.00kz</td>
                                        <td>{{$venda->valor_entregue}}.00kz</td>
                                        <td>{{$venda->troco}}.00kz</td>
                                        <td>
                                            <a href="{{ route('funcionario.venda.pdf',['id'=>$venda->id]) }}">
                                                <button class="btn btn-warning notika-btn-warning">Imprimir</button>
                                            </a>
                                        </td>
                                    </tr>
                                </div>
                                    @endforeach
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
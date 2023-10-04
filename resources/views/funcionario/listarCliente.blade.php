@section('title','Ciente')
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
                        <h2>LIsta dos Clientes</h2>
                    </div>
                    <div class="table-responsive">
                        <table id="data-table-basic" class="table table-striped">
                            <thead>
                                <tr>
                                    <th contenteditable="true">Cod. Cliente</th>
                                    <th>Nome</th>
                                    <th>Pais</th>
                                    <th>Provincia</th>
                                    <th>Contribuente</th>
                                    <th>Espaço Fiscal</th>
                                    <th>Regime do IVA</th>
                                    <th>Tipo de Pessoa</th>
                                    <th>Operação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clientes as $cliente)
                                    <tr>
                                        <td>{{$cliente->id}}</td>
                                        <td>{{$cliente->nome}}</td>
                                        <td>{{$cliente->pais}}</td>
                                        <td>{{$cliente->provincia}}</td>
                                        <td>{{$cliente->n_contribuente}}</td>
                                        <td>{{$cliente->espaco_fiscal}}</td>
                                        <td>{{$cliente->regime_iva}}</td>
                                        <td>{{$cliente->pessoa}}</td>
                                        <td>
                                            <a href="{{ route('funcionario.cliente.editar',['id'=>$cliente->id]) }}">
                                                <button class="btn btn-warning notika-btn-warning">Editar</button>
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
@section('title','Ciente')
@extends('web.app')
@extends('funcionario.import')
@section('container') 

<div class="form-element-area">
    <div class="container">
        @include('sweetalert::alert')
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group"> 
                    <a href="{{route('funcionario.cliente')}}">
                        <button class="btn btn-primary notika-btn-primary">Novo</button>
                    </a>
                    <a href="{{route('funcionario.cliente.listar')}}">
                        <button class="btn btn-success notika-btn-success">Listar</button>
                    </a>
                    <a href="{{route('funcionario.cliente.listar')}}">
                        <button class="btn btn-warning notika-btn-warning">Imprimir</button>
                    </a>
                </div>
                <form action="{{route('funcionario.cliente.update',['id'=>$cliente->id])}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-element-list">
                        <div class="basic-tb-hd">
                            <h2>Dados do cliente</h2>
                            <hr>
                        </div>
                        <div class="row">
                            
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <input type="text" name="nome" class="form-control" value="{{$cliente->nome}}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <input type="text" name="pais" class="form-control" value="{{$cliente->pais}}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <input type="text" name="n_contribuente" class="form-control" value="{{$cliente->n_contribuente}}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <input type="text" name="contrib_pais_origem" class="form-control" value="{{$cliente->contrib_pais_origem}}" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="bootstrap-select fm-cmp-mg">
                                    <label for="">Espaço Fiscal</label>
                                    <select class="selectpicker" name="espaco_fiscal" required>
                                            <option value="Nacional" hidden>Nacional</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="bootstrap-select fm-cmp-mg">
                                    <label for="">Regime do IVA</label>
                                    <select class="selectpicker" name="regime_iva" required>
                                            <option value="{{$cliente->regime_iva}}">{{$cliente->regime_iva}}</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Isento">Isento</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="bootstrap-select fm-cmp-mg">
                                    <label for="">Pessoa</label>
                                    <select class="selectpicker" name="pessoa" required>
                                            <option value="{{$cliente->pessoa}}">{{$cliente->pessoa}}</option>
                                            <option value="Singular">Singular</option>
                                            <option value="Coletiva">Coletiva</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="bootstrap-select fm-cmp-mg">
                                    <label for="">Provincia</label>
                                    <select class="selectpicker" name="provincia" required>
                                            <option value="{{$cliente->provincia}}">{{$cliente->provincia}}</option>
                                            <option value="Luanda">Luanda</option>
                                            <option value="Benguela">Benguela</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="basic-tb-hd">
                            <h2>Moradas</h2>
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                <div class="form-group">
                                    <div class="nk-int-st"> 
                                        <input type="text" class="form-control" name="morada" value="{{$cliente->moradas[0]->morada}}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <input type="text" class="form-control" name="localidade" value="{{$cliente->moradas[0]->localidade}}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <input type="text" class="form-control" name="codigo_postal" value="{{$cliente->moradas[0]->codigo_postal}}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <input type="phone" name="telefone" class="form-control" placeholder="Telefone" required value="{{$telefones[0]->telefone}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <input type="phone" class="form-control" placeholder="Telefone 2">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <input type="phone" class="form-control" placeholder="Telefone 3">
                                    </div>
                                </div>
                            </div>
                            <div class="basic-tb-hd">
                                <h2>Dados Comerciais</h2>
                                <hr>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <input type="number" name="desconto" class="form-control" value="{{$cliente->dadosComercial->desconto}}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="bootstrap-select fm-cmp-mg">
                                    <label for="">Tipo Preço</label>
                                    <select class="selectpicker" name="tipo_preco" required>
                                            <option>{{$cliente->dadosComercial->tipo_preco}}</option>
                                            <option>P.V.P.1</option>
                                            <option>P.V.P.2</option>
                                            <option>P.V.P.3</option>
                                            <option>P.V.P.4</option>
                                            <option>P.V.P.5</option>
                                            <option>P.V.P.6</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="bootstrap-select fm-cmp-mg">
                                    <label for="">Cond. Pagamento</label>
                                    <select class="selectpicker" name="condi_pagamento" required>
                                        <option value="{{$cliente->dadosComercial->condi_pagamento}}">{{$cliente->dadosComercial->condi_pagamento}}</option>
                                        <option>Pronto Pagamento</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="bootstrap-select fm-cmp-mg">
                                    <label for="">Modo de PAgamento</label>
                                    <select class="selectpicker" name="modo_pagamento" required>
                                        <option value="{{$cliente->dadosComercial->modo_pagamento}}">{{$cliente->dadosComercial->modo_pagamento}}</option>
                                        <option>Transferencia</option>
                                        <option>Multibanco</option>
                                        <option>Em Numerario</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                            <button class="btn btn-success notika-btn-success" type="submit">Actualizar</button>
                        </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('title','Artigo')
@extends('web.app')
@extends('funcionario.import')
@section('container') 

<div class="form-element-area">
    <div class="container">
        @include('sweetalert::alert')
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <form action="{{route('funcionario.artigo.store')}}" method="POST">
                        @csrf
                        <div class="form-element-list">
                            <div class="basic-tb-hd">
                                <h2>Criar Artigo</h2>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="form-group">
                                        <div class="nk-int-st">
                                            <input type="text" name="artigo" class="form-control" placeholder="artigo" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="form-group">
                                        <div class="nk-int-st">
                                            <input type="text" name="descricao" class="form-control" placeholder="descricao" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-3 col-sm-2 col-xs-12">
                                    <div class="form-group">
                                        <div class="nk-int-st">
                                            <input type="text" name="unidade_base" class="form-control" placeholder="Unidade Base" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="nk-int-mk sl-dp-mn sm-res-mg-t-10">
                                        Componentes
                                    </div>
                                    <div class="bootstrap-select fm-cmp-mg"> 
                                        <select class="selectpicker" data-live-search="true" name="componente" required> 
                                            <option></option>
                                            <option>Artigos Simples</option>
                                            <option>Artigos Compostos</option>
                                            <option>Conjunto de Artigos</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                    <div class="form-group">
                                        <div class="nk-int-st">
                                            <input type="text" name="pvp1" class="form-control" placeholder="PVP1" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                    <div class="form-group">
                                        <div class="nk-int-st">
                                            <input type="text" name="pvp2" class="form-control" placeholder="PVP2">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                    <div class="form-group">
                                        <div class="nk-int-st">
                                            <input type="text" name="pvp3" class="form-control" placeholder="PVP3">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                    <div class="form-group">
                                        <div class="nk-int-st">
                                            <input type="text" name="pvp4" class="form-control" placeholder="PVP4">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                    <div class="form-group">
                                        <div class="nk-int-st">
                                            <input type="text" name="pvp5" class="form-control" placeholder="PVP5">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="nk-int-mk sl-dp-mn sm-res-mg-t-10">
                                        Movimenta conta
                                    </div>
                                    <div class="bootstrap-select fm-cmp-mg"> 
                                        <select class="selectpicker" data-live-search="true" required name="movimenta_conta"> 
                                            <option>Sim</option>
                                            <option>Não</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                    <div class="nk-int-mk sl-dp-mn sm-res-mg-t-10">
                                        Familia do Artigo
                                    </div>
                                    <div class="bootstrap-select fm-cmp-mg"> 
                                        <select class="selectpicker" data-live-search="true" name="id_familia" required> 
                                            <option></option>
                                            @foreach ($familias as $familia)
                                                <option value="{{$familia->id}}">{{$familia->familia}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <div class="nk-int-st">
                                            <input type="text" name="cod_barra" class="form-control" placeholder="Codigo de Barras">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-success notika-btn-success" type="submit">Salvar</button>
                        </div>
                        </div>
                    </form>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <form action="{{route('funcionario.familia.store')}}" method="POST">
                            @csrf
                            <div class="form-element-list">
                                <div class="basic-tb-hd">
                                    <h2>Criar Familia</h2>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <div class="nk-int-st">
                                                <input type="text" name="familia" class="form-control" placeholder="Familia" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <div class="nk-int-st">
                                                <input type="text" name="descricao" class="form-control" placeholder="Descrição" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-success notika-btn-success" type="submit">Salvar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
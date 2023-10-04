@section('title','Produto')
@extends('web.app')
@extends('Admin.import')
@section('container')
    <div class="container tm-mt-big tm-mb-big">
        <div class="row">
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
            <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
            <div class="row">
                <div class="col-12">
                <h2 class="tm-block-title d-inline-block">Adicionar Categoria</h2>
                </div>
            </div>
            <div class="row tm-edit-product-row">
                <div class="col-xl-6 col-lg-6 col-md-12">
                <form action="{{route('admin.categoriaStore')}}" class="tm-edit-product-form" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                    <label for="name">Nome da Categoria</label>
                    <input
                        id="name"
                        name="categoria"
                        type="text"
                        class="form-control validate"
                        required
                    />
                    </div>
                    <div class="form-group mb-3">
                    <label
                        for="description"
                        >Descrição da categoria</label
                    >
                    <textarea
                        class="form-control validate"
                        rows="3"
                        name="descricao"
                        placeholder="Faça um breve resumo em que esta relacionado esta categoria"
                        required
                    ></textarea>
                    </div>
                </div>
                <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block text-uppercase">Salvar Categoria</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        </div>
  </div>
@endsection
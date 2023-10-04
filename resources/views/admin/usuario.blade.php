@section('title','Usuarios')
@extends('web.app')
@extends('Admin.import')
@section('container') 
    <div class="container mt-5">
        <div class="row tm-content-row">
        <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 tm-block-col">
            <div class="tm-bg-primary-dark tm-block tm-block-products">
            <div class="tm-product-table-container">
                <table class="table table-hover tm-table-small tm-product-table">
                <thead>
                    <tr>
                    <th scope="col">Usuario</th>
                    <th scope="col">Email</th>
                    <th scope="col">Tipo de Conta</th>
                    <th scope="col">Operações</th>
                    <th scope="col">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuarios as $usuario)
                        <tr>
                        <td class="tm-product-name">{{$usuario->name}}</td>
                        <td>{{$usuario->email}}</td>
                        <td>{{$usuario->estato}}</td>
                        <td>
                            <a href="#" class="tm-product-delete-link">
                            <i class="far fa-trash-alt tm-product-delete-icon"></i>
                            </a>
                        </td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 tm-block-col">
            <div class="tm-bg-primary-dark tm-block tm-block-product-categories">
            <h2 class="tm-block-title">Cadastrar Usuarios</h2>
            <div class="tm-product-table-container">
                <table class="table tm-table-small tm-product-table">
                <tbody>
                   {{--  @foreach ($categorias as $categoria)
                        <tr>
                            <td class="tm-product-name">{{$categoria->categoria}}</td>
                            <td class="text-center">
                                <form action="#" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="tm-product-delete-link">
                                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach --}}
                    
                </tbody>
                </table>
            </div>
            <!-- table container -->
            <form action="{{route('store.users')}}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label for="name">Nome do Usuario</label>
                    <input
                        id="name"
                        name="name"
                        type="text"
                        class="form-control validate"
                        required
                    />
                </div>
                <div class="form-group mb-3">
                    <label for="name">Email</label>
                    <input
                        id="name"
                        name="email"
                        type="email"
                        class="form-control validate"
                        required
                    />
                </div>

                <div class="form-group mb-3">
                    <label for="name">Palavra Passe</label>
                    <input
                        id="name"
                        name="password"
                        type="password"
                        class="form-control validate"
                        required
                        minlength="6"
                    />
                </div>
                <div class="form-group mb-3">
                    <label for="name">Tipo de Usuario</label>
                      <select class="custom-select" name="tipo_usuario">
                        <option >Selecione o tipo de conta</option>
                        <option value="Admin">Admin</option>
                        <option value="Funcionario">Funcionario</option>
                        <option value="Merchant">Merchant</option>
                        <option value="3">Customer</option>
                      </select>
                </div>
                <button class="btn btn-primary btn-block text-uppercase mb-3" type="submit">
                    Adicionar Usuario
                </button>
            </form>
          
            </div>
        </div>
        </div>
    </div>
@endsection
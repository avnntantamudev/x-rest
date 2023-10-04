@section('title','Stock')
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
                    <th scope="col">&nbsp;</th>
                    <th scope="col">Produto</th>
                    <th scope="col">Unidade Vendida</th>
                    <th scope="col">No STOCK</th>
                    <th scope="col">EXPIRE DATE</th>
                    <th scope="col">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row"><input type="checkbox" /></th>
                    <td class="tm-product-name">Lorem Ipsum Product 1</td>
                    <td>1,450</td>
                    <td>550</td>
                    <td>28 March 2019</td>
                    <td>
                        <a href="#" class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                        </a>
                    </td>
                    </tr>
                    <tr>
                    <th scope="row"><input type="checkbox" /></th>
                    <td class="tm-product-name">Lorem Ipsum Product 2</td>
                    <td>1,250</td>
                    <td>750</td>
                    <td>21 March 2019</td>
                    <td>
                        <a href="#" class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                        </a>
                    </td>
                    </tr>
                    <tr>
                    <th scope="row"><input type="checkbox" /></th>
                    <td class="tm-product-name">Lorem Ipsum Product 3</td>
                    <td>1,100</td>
                    <td>900</td>
                    <td>18 Feb 2019</td>
                    <td>
                        <a href="#" class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                        </a>
                    </td>
                    </tr>
                    <tr>
                    <th scope="row"><input type="checkbox" /></th>
                    <td class="tm-product-name">Lorem Ipsum Product 4</td>
                    <td>1,400</td>
                    <td>600</td>
                    <td>24 Feb 2019</td>
                    <td>
                        <a href="#" class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                        </a>
                    </td>
                    </tr>
                    <tr>
                    <th scope="row"><input type="checkbox" /></th>
                    <td class="tm-product-name">Lorem Ipsum Product 5</td>
                    <td>1,800</td>
                    <td>200</td>
                    <td>22 Feb 2019</td>
                    <td>
                        <a href="#" class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                        </a>
                    </td>
                    </tr>
                    <tr>
                    <th scope="row"><input type="checkbox" /></th>
                    <td class="tm-product-name">Lorem Ipsum Product 6</td>
                    <td>1,000</td>
                    <td>1,000</td>
                    <td>20 Feb 2019</td>
                    <td>
                        <a href="#" class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                        </a>
                    </td>
                    </tr>
                    <tr>
                    <th scope="row"><input type="checkbox" /></th>
                    <td class="tm-product-name">Lorem Ipsum Product 7</td>
                    <td>500</td>
                    <td>100</td>
                    <td>10 Feb 2019</td>
                    <td>
                        <a href="#" class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                        </a>
                    </td>
                    </tr>
                    <tr>
                    <th scope="row"><input type="checkbox" /></th>
                    <td class="tm-product-name">Lorem Ipsum Product 8</td>
                    <td>1,000</td>
                    <td>600</td>
                    <td>08 Feb 2019</td>
                    <td>
                        <a href="#" class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                        </a>
                    </td>
                    </tr>
                    <tr>
                    <th scope="row"><input type="checkbox" /></th>
                    <td class="tm-product-name">Lorem Ipsum Product 9</td>
                    <td>1,200</td>
                    <td>800</td>
                    <td>24 Jan 2019</td>
                    <td>
                        <a href="#" class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                        </a>
                    </td>
                    </tr>
                    <tr>
                    <th scope="row"><input type="checkbox" /></th>
                    <td class="tm-product-name">Lorem Ipsum Product 10</td>
                    <td>1,600</td>
                    <td>400</td>
                    <td>22 Jan 2019</td>
                    <td>
                        <a href="#" class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                        </a>
                    </td>
                    </tr>
                    <tr>
                    <th scope="row"><input type="checkbox" /></th>
                    <td class="tm-product-name">Lorem Ipsum Product 11</td>
                    <td>2,000</td>
                    <td>400</td>
                    <td>21 Jan 2019</td>
                    <td>
                        <a href="#" class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                        </a>
                    </td>
                    </tr>
                </tbody>
                </table>
            </div>
            <!-- table container -->
            <a
                href="{{route('produte.cadastrar')}}"
                class="btn btn-primary btn-block text-uppercase mb-3">Adicionar Produto</a>
            <button class="btn btn-primary btn-block text-uppercase">
                Eliminar Produtos Selecionados
            </button>
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 tm-block-col">
            <div class="tm-bg-primary-dark tm-block tm-block-product-categories">
            <h2 class="tm-block-title">Categoria de Produtos</h2>
            <div class="tm-product-table-container">
                <table class="table tm-table-small tm-product-table">
                <tbody>
                    @foreach ($categorias as $categoria)
                        <tr>
                            <td class="tm-product-name">{{$categoria->categoria}}</td>
                            <td class="text-center">
                                <form action="{{route('categoria.destroy',['id'=>$categoria->id])}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="tm-product-delete-link">
                                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>
                </table>
            </div>
            <!-- table container -->
            <a href="{{route('categoria.cadastrar')}}">
                <button class="btn btn-primary btn-block text-uppercase mb-3">
                    Adicionar categoria
                </button>
            </a>
          
            </div>
        </div>
        </div>
    </div>
@endsection
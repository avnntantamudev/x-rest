<style>
    .rounded-button{
        
            width: 80px; /* Largura desejada */
            height: 100px; /* Altura desejada */
            border-radius: 50%; /* Define a forma do botão como redonda */
            background-color: #007bff; /* Cor de fundo */
            color: #fff; /* Cor do texto */
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            font-size: 18px; /* Tamanho do texto */
            border: none; /* Remova a borda */
            cursor: pointer;
            margin-left: 3%;
            margin-bottom: 3%;
            
        
        }
        .round-button:hover {
            background-color: #0056b3; /* Cor de fundo quando o mouse passar por cima */
            box-shadow: 0 12px 20px rgba(0, 0, 0, 0.4); /* Efeito de sombra 3D aprimorado */
        }

        .menu {
            display: none;
            position: absolute;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
        }
</style>
@section('title','Administrador')
@extends('web.app')
@extends('Admin.import')

@section('container') 
<?php
    $mesa = array(
        "1" => "livre",
        "2" => "livre",
        "3" => "ocupado",
        "4" => "reservado",
        "5" => "livre",
        "6" => "livre",
        "7" => "livre",
        "8" => "livre",
        "9" => "livre",
        "10" => "livre",
        "11" => "livre",
        "12" => "livre",
        "13" => "livre",
        "14" => "livre",
        
    );
?>
    <div class="" id="home">
        <div class="container">
            <div class="row">
                <div class="col">
                    <p class="text-white mt-5 mb-5">Bem Vindo de volta Sr, <b>{{auth()->user()->name}}</b></p>
                </div>
            </div>
            <!-- row -->
            <div class="row tm-content-row">
                
                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block tm-block-taller">
                        <h2 class="tm-block-title">Mesas</h2>
                        <div class="tm-notification-items">
                            <div class="media tm-notification-item">
                                <div class="container mt-3">
                                    @foreach ($mesa as $chave => $valor)
                                        @if($valor == 'livre')
                                            <button type="button" class="rounded-button btn-secondary" onmousedown="iniciarContagem(this)" onmouseup="pararContagem(this)">Mesa {{$chave}}</button>
                                        @endif
                                        @if($valor == 'ocupado')
                                            <form action="{{route('admin.vender',['id'=>$chave])}}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="rounded-button btn-danger">Mesa {{$chave}}</button>
                                            </form>
                                            @endif
                                        @if($valor == 'reservado')
                                            <button type="button" class="rounded-button btn-warning">Mesa {{$chave}}</button>
                                        @endif
                                    @endforeach
                                </div>             
                            </div>
                            <div id="menu" class="menu">
                                <ul>
                                    <li>Opção 1</li>
                                    <li>Opção 2</li>
                                    <li>Opção 3</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-overflow">
                        <h2 class="tm-block-title">Notification List</h2>
                        <div class="tm-notification-items">
                            <div class="media tm-notification-item">
                                <div class="tm-gray-circle"><img src="img/notification-01.jpg" alt="Avatar Image" class="rounded-circle"></div>
                                <div class="media-body">
                                    <p class="mb-2"><b>Jessica</b> and <b>6 others</b> sent you new <a href="#"
                                            class="tm-notification-link">product updates</a>. Check new orders.</p>
                                    <span class="tm-small tm-text-color-secondary">6h ago.</span>
                                </div>
                            </div>
                            <div class="media tm-notification-item">
                                <div class="tm-gray-circle"><img src="img/notification-02.jpg" alt="Avatar Image" class="rounded-circle"></div>
                                <div class="media-body">
                                    <p class="mb-2"><b>Oliver Too</b> and <b>6 others</b> sent you existing <a href="#"
                                            class="tm-notification-link">product updates</a>. Read more reports.</p>
                                    <span class="tm-small tm-text-color-secondary">6h ago.</span>
                                </div>
                            </div>
                            <div class="media tm-notification-item">
                                <div class="tm-gray-circle"><img src="img/notification-03.jpg" alt="Avatar Image" class="rounded-circle"></div>
                                <div class="media-body">
                                    <p class="mb-2"><b>Victoria</b> and <b>6 others</b> sent you <a href="#"
                                            class="tm-notification-link">order updates</a>. Read order information.</p>
                                    <span class="tm-small tm-text-color-secondary">6h ago.</span>
                                </div>
                            </div>
                            <div class="media tm-notification-item">
                                <div class="tm-gray-circle"><img src="img/notification-01.jpg" alt="Avatar Image" class="rounded-circle"></div>
                                <div class="media-body">
                                    <p class="mb-2"><b>Laura Cute</b> and <b>6 others</b> sent you <a href="#"
                                            class="tm-notification-link">product records</a>.</p>
                                    <span class="tm-small tm-text-color-secondary">6h ago.</span>
                                </div>
                            </div>
                            <div class="media tm-notification-item">
                                <div class="tm-gray-circle"><img src="img/notification-02.jpg" alt="Avatar Image" class="rounded-circle"></div>
                                <div class="media-body">
                                    <p class="mb-2"><b>Samantha</b> and <b>6 others</b> sent you <a href="#"
                                            class="tm-notification-link">order stuffs</a>.</p>
                                    <span class="tm-small tm-text-color-secondary">6h ago.</span>
                                </div>
                            </div>
                            <div class="media tm-notification-item">
                                <div class="tm-gray-circle"><img src="img/notification-03.jpg" alt="Avatar Image" class="rounded-circle"></div>
                                <div class="media-body">
                                    <p class="mb-2"><b>Sophie</b> and <b>6 others</b> sent you <a href="#"
                                            class="tm-notification-link">product updates</a>.</p>
                                    <span class="tm-small tm-text-color-secondary">6h ago.</span>
                                </div>
                            </div>
                            <div class="media tm-notification-item">
                                <div class="tm-gray-circle"><img src="img/notification-01.jpg" alt="Avatar Image" class="rounded-circle"></div>
                                <div class="media-body">
                                    <p class="mb-2"><b>Lily A</b> and <b>6 others</b> sent you <a href="#"
                                            class="tm-notification-link">product updates</a>.</p>
                                    <span class="tm-small tm-text-color-secondary">6h ago.</span>
                                </div>
                            </div>
                            <div class="media tm-notification-item">
                                <div class="tm-gray-circle"><img src="img/notification-02.jpg" alt="Avatar Image" class="rounded-circle"></div>
                                <div class="media-body">
                                    <p class="mb-2"><b>Amara</b> and <b>6 others</b> sent you <a href="#"
                                            class="tm-notification-link">product updates</a>.</p>
                                    <span class="tm-small tm-text-color-secondary">6h ago.</span>
                                </div>
                            </div>
                            <div class="media tm-notification-item">
                                <div class="tm-gray-circle"><img src="img/notification-03.jpg" alt="Avatar Image" class="rounded-circle"></div>
                                <div class="media-body">
                                    <p class="mb-2"><b>Cinthela</b> and <b>6 others</b> sent you <a href="#"
                                            class="tm-notification-link">product updates</a>.</p>
                                    <span class="tm-small tm-text-color-secondary">6h ago.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        
            <script>
                let timer;
        
                function iniciarContagem(botao) {
                    timer = setTimeout(function () {
                        botao.classList.add('menu-ativo');
                        mostrarMenu(botao);
                    }, 1000); // Tempo em milissegundos para pressão longa (1 segundo)
                }
        
                function pararContagem(botao) {
                    clearTimeout(timer);
                    botao.classList.remove('menu-ativo');
                    esconderMenu();
                }
        
                function mostrarMenu(botao) {
                    const menu = document.getElementById('menu');
                    menu.style.left = botao.offsetLeft + 'px';
                    menu.style.top = botao.offsetTop + botao.offsetHeight + 'px';
                    menu.style.display = 'block';
                }
        
                function esconderMenu() {
                    const menu = document.getElementById('menu');
                    menu.style.display = 'none';
                }
            </script>
        </div>
    </div>
@endsection
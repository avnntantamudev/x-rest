@section('script')
    <script src="{{('/assets/js/jquery-3.3.1.min.js')}}"></script>
    <!-- https://jquery.com/download/ -->
    <script src="{{('/assets/js/moment.min.js')}}"></script>
    <!-- https://momentjs.com/ -->
    <script src="{{('/assets/js/Chart.min.js')}}"></script>
    <!-- http://www.chartjs.org/docs/latest/ -->
    <script src="{{('/assets/js/bootstrap.min.js')}}"></script>
    <!-- https://getbootstrap.com/ -->
    <script src="{{('/assets/js/tooplate-scripts.js')}}"></script>
    <script>
        Chart.defaults.global.defaultFontColor = 'white';
        let ctxLine,
            ctxBar,
            ctxPie,
            optionsLine,
            optionsBar,
            optionsPie,
            configLine,
            configBar,
            configPie,
            lineChart;
        barChart, pieChart;
        // DOM is ready
        $(function () {
            drawLineChart(); // Line Chart
            drawBarChart(); // Bar Chart
            drawPieChart(); // Pie Chart

            $(window).resize(function () {
                updateLineChart();
                updateBarChart();                
            });
        })
    </script>
@endsection

@section('headlink')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="{{('/assets/css/fontawesome.min.css')}}" />
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="{{('/assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{('/assets/scss/_variables.css')}}" />
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="{{('/assets/css/templatemo-style.css')}}" />
    
    
@endsection

@section('footer')
    <footer class="tm-footer row tm-mt-small">
        <div class="col-12 font-weight-light">
            <p class="text-center text-white mb-0 px-4 small">
                Copyright &copy; <b>2018</b> All rights reserved. 
                
                Design: <a rel="nofollow noopener" href="https://templatemo.com" class="tm-footer-link">Template Mo</a>
            </p>
        </div>
    </footer>
@endsection

@section('nave')
    <nav class="navbar navbar-expand-xl">
        <div class="container h-100">
            <a class="navbar-brand" href="{{route('admin.home')}}">
                <h1 class="tm-site-title mb-0">X-Rest Admin</h1>
            </a>
            <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars tm-nav-icon"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto h-100">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('admin.home')}}">
                            <i class="fas fa-tachometer-alt"></i>
                            Dashboard
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="far fa-file-alt"></i>
                            <span>
                                Relatórios <i class="fas fa-angle-down"></i>
                            </span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Vendas</a>
                            <a class="dropdown-item" href="#">Compras</a>
                            <a class="dropdown-item" href="#">Yearly Report</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.venda')}}">
                            <i class="fas fa-shopping-cart"></i>
                            Vendas
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.usuario')}}">
                            <i class="far fa-user"></i>
                            Usuarios
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.stock')}}">
                            <i class="fas fa-cog"></i>
                            <span>
                                Stock
                            </span>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link d-block" href="{{route('logout')}}">
                            {{auth()->user()->name}}, <b>Logout</b>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

    </nav>
@endsection

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

@extends('layout.vendor')
@section('title','Dashboard')
@section('content')
    
            <!-- LINE CHART -->
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Statistik Klik </h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body chart-responsive">
                    <div class="chart" id="line-chart" style="height: 300px;"></div>
                </div>
            <!-- /.box-body -->
            </div>
            <!-- /.box -->
            <!-- Chat box -->
            <div class="box box-success">
                <div class="box-header">
                    <i class="fa fa-users"></i>
                    <h3 class="box-title">Ulasan</h3>
                </div>
                <div class="box-body chat" id="chat-box">
                    <!-- chat item -->
                    <div class="item">
                        <img src="/adminlte/dist/img/user2-160x160.jpg" alt="user image" class="offline">
        
                        <p class="message">
                        <a href="#" class="name">
                            <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:30</small>
                            Susan Doe
                        </a>
                        I would like to meet you to discuss the latest news about
                        the arrival of the new theme. They say it is going to be one the
                        best themes on the market
                        </p>
                    </div>
                    <!-- /.item -->
                </div>
            </div>
            
@endsection
@section('footer')
    <script>
    // LINE CHART
    var line = new Morris.Line({
      element: 'line-chart',
      resize: true,
      data: [
        {y: '2011 Q1', item1: 2666},
        {y: '2011 Q2', item1: 2778},
        {y: '2011 Q3', item1: 4912},
        {y: '2011 Q4', item1: 3767},
        {y: '2012 Q1', item1: 6810},
        {y: '2012 Q2', item1: 5670},
        {y: '2012 Q3', item1: 4820},
        {y: '2012 Q4', item1: 15073},
        {y: '2013 Q1', item1: 10687},
        {y: '2013 Q2', item1: 8432}
      ],
      xkey: 'y',
      ykeys: ['item1'],
      labels: ['Item 1'],
      lineColors: ['#3c8dbc'],
      hideHover: 'auto'
    });
    </script>
@endsection
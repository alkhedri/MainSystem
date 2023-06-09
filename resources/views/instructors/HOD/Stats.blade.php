
@extends('instructors.layout')
              
@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item">رئيس القسم</li>
    <li class="breadcrumb-item">الاحصائيات</li>
   
 
</ol>
@endsection


@section('content')
 
<div class="row">
    <a class="btn btn-primary" href="">طالب</a>
    <hr>
    <a class="btn btn-primary" href="">مقرر</a>
</div>


<canvas id="myChart" height="100px"></canvas>
 
@endsection

@section('page-js-script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script type="text/javascript">
  
    var labels =  {{ Js::from($stack) }};
    var users =  {{ Js::from($data) }};
  
   
    const data = {
        labels: labels,
        datasets: [{
            label: 'My First dataset',
            
             backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: users,
        }]
    };
  
    const config = {
        type: 'bar',
        data: data,
        options: {
        plugins: {
            legend: {
                labels: {
                    // This more specific font property overrides the global property
                    font: {
                        size: 24
                    }
                }
            }
        }
    }
    };
    Chart.defaults.font.size = 16;
    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
  
</script>
@endsection
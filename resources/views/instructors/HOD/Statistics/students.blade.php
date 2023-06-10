
@extends('instructors.layout')
              
@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item">رئيس القسم</li>
    <li class="breadcrumb-item">الاحصائيات</li>
    <li class="breadcrumb-item">الطلبة</li>
    <li class="breadcrumb-item">{{$studentName}}</li>
   
    
</ol>
@endsection


@section('content')
 
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong>قائمة</strong> الفصول الدراسية
            </div>
            <div class="card-block">
                <form action="{{route('StudentsStatsActionSemester' , ['id' => $student_id])}}" method="post" class="form-horizontal ">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-5">
                            <div class="input-group">
                       
                                <select class="form-control" name="semester_id" id="">
                                    @foreach ($Semesters as $item)
                                    <option value="{{$item->semester_id}}">{{App\Models\semester::getName($item->semester_id)}}</option>
                                    
                                    @endforeach
                                   
                                </select>
                            </div>
                        </div>
                      
                            <div class="col-md-5">
                                <div class="input-group">
                                    <select class="form-control" name="selection" id="">
                                  
                                   
                                        <option value="1">الأعمال</option>
                                        <option value="2">الامتحان النهائي</option>
                                        <option value="3">المجموع</option>
                                        <option value="4">الحضور</option>
                                    
                           
                                </select>
                                </div>
                            
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn btn-success"><i class="fa fa-dot-circle-o"></i> عرض إحصائي</button>
               
                        </div>
                       </div>
                
    </div>
</div>
</div>
 
    
</div> 

<?php 

$stack = Session::get('stack');
$data = Session::get('data');
$max = Session::get('max');
$title = Session::get('title');



?>

@isset($stack)
<canvas id="myChart" height="100px"></canvas>
 
<button class="btn btn-primary" onclick="printCanvas()">
    <i class="fa icon-printer
    "></i>
    طباعة</button>
@endisset


@endsection

@section('page-js-script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script type="text/javascript">
  

 
    var labels =  {{ Js::from($stack) }};
    var users =  {{ Js::from($data) }};
    var name =  {{ Js::from($studentName) }};
    var maxvalue =  {{ Js::from($max) }};
    var title =  {{ Js::from($title) }};
  
    
    const data = {
        labels: labels,
        datasets: [{
           label: title + " " + name,
            
             backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: users,
        }]
    };
  
    const config = {
        type: 'bar',
        data: data,
        options: {
            scales: {
            y: {
                
                max: maxvalue,
              
            },
           
        },
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
 


    function printCanvas()  
{  
    const dataUrl = document.getElementById('myChart').toDataURL(); 

let windowContent = '<!DOCTYPE html>';
windowContent += '<html>';
windowContent += '<head><title>"' + '  رسم بياني للطالب   ' + name + '"</title></head>';
windowContent += '<body>';
windowContent += '<img src="' + dataUrl + '">';
windowContent += '</body>';
windowContent += '</html>';

const printWin = window.open('', '', 'width=' + screen.availWidth + ',height=' + screen.availHeight);
printWin.document.open();
printWin.document.write(windowContent); 

printWin.document.addEventListener('load', function() {
    printWin.focus();
    printWin.print();
    printWin.document.close();
    printWin.close();            
}, true);
}
</script>
@endsection
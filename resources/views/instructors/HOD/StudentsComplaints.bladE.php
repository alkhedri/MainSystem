
@extends('instructors.layout')
 

@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item">رئيس القسم</li>
    <li class="breadcrumb-item"><a href="#">الشكاوي</a>
    </li>
     
 
</ol>
@endsection


@section('content')

<div class="row">
 

 
    <div class="col-8">
      

 
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i>قائمة الشكاوي 
                    </div>
                    <div class="card-block">
                        <table class="table">
                            <thead>
                                <tr>
                      

                                    <th style="width: 20px; overflow: hidden;">#</th>
                                    <th style="width: 120px; overflow: hidden;">التاريخ</th>
                                    <th style="width: 220px; overflow: hidden;">العنوان</th>
                                     <th>الشكوى</th>
                                    
                                   
                                </tr>
                            </thead>
                            <tbody>
                          
                                @foreach ($complaints as $complaint)
                                    
                              
                                <tr>
                                    <td> {{ $loop->index + 1 }}</td>
                                    <td>{{$complaint->date}}</td>
                                    <td>{{$complaint->title}}</td>
                                    <td>{{$complaint->message}}</td>
  
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                         {{$complaints->links()}}
                    </div>
                </div>
            </div>
            <!--/col-->
        </div>
        </div>
  
 
 
 
 
@endsection
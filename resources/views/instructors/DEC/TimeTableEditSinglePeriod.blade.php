

@extends('instructors.layout')
 
@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item">منسق الدراسة و الامتحانات</li>
    <li class="breadcrumb-item"><a href="{{route('TimeTable')}}"> جدول المحاضرات</a>   </li>
    <li class="breadcrumb-item">تعديل جدول المحاضرات   </li>
  
    <li class="breadcrumb-item">{{ App\Models\subject::getSubjectName(App\Models\timeTable::getPeriod($id, $period))}}</li>



</ol>
@endsection

@section('content')
 
<div class="card">
    <div class="card-header">
        <i class="fa fa-align-justify"></i>   الفترة
     
    </div>
    <div class="card-block">
          
     <form action="{{route('TimeTableEditPeriodAction'  , ['id' => $id , 'period' => $period])}}" method="POST">
            @csrf
        <div class="form-group row">
      
       
            <div class="col-md-4">
           
                
                    <Select id="input-large" name="Subject" class="form-control input-lg" >
                      <option value="{{ App\Models\TimeTable::getPeriod($id, $period)}}" selected>{{ App\Models\subject::getSubjectName(App\Models\TimeTable::getPeriod($id, $period))}}</option>
                        @foreach ($Department_subjects as $subject)
                        <option value="{{$subject->id}}">{{ $subject->arabic_name }}</option>
                        @endforeach
                    </Select>
             
                </div>
                <div class="col-md-3">
           
                
                    <Select id="input-large" name="Room" class="form-control input-lg" >
                      <option value="{{ App\Models\TimeTable_Room::getRoom($id, $period)}}" selected  >{{ App\Models\room::getName(App\Models\TimeTable_Room::getRoom($id, $period))}}</option>
                        @foreach ($Department_Rooms as $Room)
                        <option value="{{$Room->id}}">{{ $Room->name }}</option>
                        @endforeach
                    </Select>
             
                </div>
                <div class="col-md-2">
           
                    <button type="submit" class="btn btn-primary">حفظ</button>
                </div>
            </div>



    </div>
</div>



@endsection
 

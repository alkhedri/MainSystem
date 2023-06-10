
@extends('Student.layout')
 

@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item">الطالب</li>
   
        <li class="breadcrumb-item">المهام</li>
        
    
     
 
</ol>
@endsection


@section('content')
 
<div class="row "    style="overflow-x:auto;">


<table class="table table-hover table-outline">
    <thead class="thead-default">
        <tr>
             <th class="text-xs-left">#</th>
            <th class="text-xs-left">المقرر</th>
            <th class="text-xs-center">المهمة</th>
            <th class="text-xs-center">تاريخ التسليم</th>
            <th class="text-xs-center">تاريخ المهمه</th>
            <th class="text-xs-center">ملاحظات</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($Student_subjects as $subject)
            
       @foreach ( App\Models\subject_date::getReq($subject->subject_id) as $item)
       <tr>
        <td class="text-xs-left"> {{$loop->index + 1}}</td>
              <td class="text-xs-left">{{ App\Models\subject::getSubjectName($item->subject_id)}} </td>
              <td class="text-xs-center"> {{ App\Models\subject_date::getName($item->id)}} </td>
       
              <td class="text-xs-center">{{ App\Models\subject_date::getDueDate($item->id)}}  </td>
  
              <td class="text-xs-center">{{ App\Models\subject_date::getDate($item->id)}} </td>
  
              
              <td class="text-xs-center">
                   
                  {{ App\Models\subject_date::getDetails($item->id)}}
              </td>
          </tr>
       @endforeach
       
        @endforeach
    </tbody>
</table>
</div>
@endsection
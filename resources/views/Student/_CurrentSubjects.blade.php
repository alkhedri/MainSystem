
@extends('Student.layout')
 

@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item">الطالب</li>
    <li class="breadcrumb-item" >مقررات الفصل الحالي </li>
        <li class="breadcrumb-item">{{$current_semester_name}} </li>

        
   
     
 
</ol>
@endsection


@section('content')

 <div class="hidden-sm-up">

    <div style="overflow-x:auto;">
    <table class="table table-hover" style="width:160%;max-width:160%"> 
        <thead>
            <tr >
                <th>#</th>
                    <th style="text-align: right; width:200px">المقرر</th>
                   
                    <th style="text-align: center;"> الوحدات</th>
                    <th style="text-align: center;">  الاعمال</th>
                    <th style="text-align: center;">  الامتحان  </th>
                    <th style="text-align: center;">المجموع</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($Student_subjects as $subject)
            <tr>
                <td style="width: 10px">{{$loop->index + 1}}</td>
                  
                <td  style="text-align: right; ">
                    <a href="">    {{ App\Models\subject::getSubjectName($subject->subject_id)}} </a>
                
                </td>
                 <td  style="text-align: center;">{{ App\Models\subject::getSubjectUnits($subject->subject_id)}} </td>
                <td  style="text-align: center;">
                    @if ($subject->work == NULL ) 
                    <span style="color:rgb(159, 28, 28)">لم تحدد بعد </span>  
                    @else
                  {{  $subject->work }}
                  @endif
                
                </td>
                <td  style="text-align: center;">
                    @permission('final-result')
                     @if ($subject->final == NULL ) 
                     <span style="color:rgb(159, 28, 28)">لم تحدد بعد </span>  
                     @else
                   {{  $subject->final }}
                   @endif
                   @endpermission
                </td>
                <td  style="text-align: center;">
                    @permission('final-result')
                     @if ($subject->final == NULL ) 
                     <span style="color:rgb(159, 28, 28)">لم تحدد بعد </span>  
                     @else
                   {{  $subject->final + $subject->work }}
                   @endif
                   @endpermission
                </td>
                <td  style="text-align: center;">
                    @permission('final-result')
                     @if ($subject->final == NULL ) 
                     <span style="color:rgb(159, 28, 28)">لم تحدد بعد </span>  
                     @else
                   {{  $subject->final + $subject->work }}
                   @endif
                   @endpermission
                </td>
            </tr>
            @endforeach
    
            
        </tbody>
    </table>

</div>
</div>
<div class="card hidden-sm-down">
    <div class="card-header">
        <i class="fa fa-align-justify"></i> المقررات
    </div>
    <div class="card-block">
        <table class="table table-hover ">
            <thead>
                <tr>
                    <th>#</th>
                    <th style="text-align: right;">المقرر</th>
                    <th style="text-align: center;">الرمز</th>
                    <th style="text-align: center;">عدد الوحدات</th>
                    <th style="text-align: center;">درجة الاعمال</th>
                    <th style="text-align: center;">درجة الامتحان النهائي</th>
                    <th style="text-align: center;">المجموع</th>
                 
                </tr>
            </thead>
            <tbody>

                @foreach ($Student_subjects as $subject)
                <tr>
                    <td style="width: 10px">{{$loop->index + 1}}</td>
                      
                    <td  style="text-align: right;">
                        <a href="">    {{ App\Models\subject::getSubjectName($subject->subject_id)}} </a>
                    
                    </td>
                    <td  style="text-align: center;">{{ App\Models\subject::getSubjectCode($subject->subject_id)}} </td>
                    <td  style="text-align: center;">{{ App\Models\subject::getSubjectUnits($subject->subject_id)}} </td>
                    <td  style="text-align: center;">
                        @if ($subject->work == NULL ) 
                        <span style="color:rgb(159, 28, 28)">لم تحدد بعد </span>  
                        @else
                      {{  $subject->work }}
                      @endif
                    
                    </td>
                    <td  style="text-align: center;">
                        @permission('final-result')
                         @if ($subject->final == NULL ) 
                         <span style="color:rgb(159, 28, 28)">لم تحدد بعد </span>  
                         @else
                       {{  $subject->final }}
                       @endif
                       @endpermission
                    </td>
                    <td  style="text-align: center;">
                        @permission('final-result')
                         @if ($subject->final == NULL ) 
                         <span style="color:rgb(159, 28, 28)">لم تحدد بعد </span>  
                         @else
                       {{  $subject->final + $subject->work }}
                       @endif
                       @endpermission
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
 
 
    <div class="alert alert-primary" role="alert">
        <p> إجمالي عدد الوحدات   : [ {{$units}} ]</p>
       <hr>
       
     </div>
 

 
@endsection
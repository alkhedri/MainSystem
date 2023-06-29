
@extends('Student.layout')
 

@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item">الطالب</li>
    <li class="breadcrumb-item" >مقررات الفصول السابقة </li>
 

        
   
     
 
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
                <form action="{{route('getSemData')}}" method="post" class="form-horizontal ">
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
                 
                        <div class="col-md-2">
                            <button type="submit" class="btn btn btn-success"><i class="fa fa-dot-circle-o"></i> عرض </button>
               
                        </div>
                       </div>
                
    </div>
</div>
</div>
 
    
</div> 
@isset($Student_subjects)
    

 <div class="hidden-sm-up">

    <div style="overflow-x:auto;">
    <table class="table table-hover"  style="width:160%;max-width:160%">
        <thead>
            <tr >
                <th>#</th>
                    <th style="text-align: right;">المقرر</th>
                   
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
                  
                <td  style="text-align: right;">
                    <a href="">    {{ App\Models\subject::getSubjectName($subject->subject_id)}} </a>
                
                </td>
                 <td  style="text-align: center;">{{ App\Models\subject::getSubjectUnits($subject->subject_id)}} </td>
                <td  style="text-align: center;">
                    @if ($subject->work == NULL ) 
                    لم تحدد بعد  
                    @else
                  {{  $subject->work }}
                  @endif
                
                </td>
                <td  style="text-align: center;">
     
                     @if ($subject->final == NULL ) 
                     لم تحدد بعد  
                     @else
                   {{  $subject->final }}
                   @endif
                   
                </td>
                <td  style="text-align: center;">
             
                     @if ($subject->final == NULL ) 
                     لم تحدد بعد  
                     @else
                   {{  $subject->final + $subject->work }}
                   @endif
                  
                </td>
       
            </tr>
            @endforeach
    
            
        </tbody>
    </table>
</div>

</div>
<div class="card hidden-sm-down">
    <div class="card-header">
        <i class="fa fa-align-justify"></i> 
        نتيجة الفصل 
      [<strong>  {{ App\Models\semester::getName($Selected_Semester_id)}} </strong> ] 
             
        
    </div>
   
    <div class="card-block">
        <div style="overflow-x:auto">
        <table class="table table-hover ">
            <thead>
                <tr>
                    <th>#</th>
                    <th style="text-align: center;">المقرر</th>
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
                      
                    <td  style="text-align: center;">
                     <strong> {{ App\Models\subject::getSubjectName($subject->subject_id)}}  </strong> 
                    
                    </td>
                    <td  style="text-align: center;">{{ App\Models\subject::getSubjectCode($subject->subject_id)}} </td>
                    <td  style="text-align: center;">{{ App\Models\subject::getSubjectUnits($subject->subject_id)}} </td>
                    <td  style="text-align: center;">
                        @if ($subject->work == NULL ) 
                        لم تحدد بعد  
                        @else
                      {{  $subject->work }}
                      @endif
                    
                    </td>
                    <td  style="text-align: center;">
                        
                         @if ($subject->final == NULL ) 
                         لم تحدد بعد  
                         @else
                       {{  $subject->final }}
                       @endif
                    
                    </td>
                    <td  style="text-align: center;">
                        
                         @if ($subject->final == NULL ) 
                         لم تحدد بعد  
                         @else
                       {{  $subject->final + $subject->work }}
                       @endif
                    
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
 
 
    <div class="alert alert-primary" role="alert">
        <p> إجمالي عدد الوحدات   : [ {{$units}} ]</p>
       <hr>
       <strong> المعدل الفصلي : [ {{00}} % ] </strong> <br>
       <strong> المعدل التراكمي   : [ {{00}} % ]  </strong>

       
     </div>
 

     @endisset
@endsection
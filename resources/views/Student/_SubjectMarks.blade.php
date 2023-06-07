
@extends('Student.layout')
 

@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item">الطالب</li>
    <li class="breadcrumb-item"><a href="#">مقررات الفصل الحالي</a>
        <li class="breadcrumb-item"><a href="#">مقررات الفصل الحالي</a>
            <li class="breadcrumb-item"><a href="#">كشف الدرجات</a>
        
    </li>
     
 
</ol>
@endsection


@section('content')

 
 
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th style="text-align: right;">المقرر</th>
                    <th style="text-align: center;">الرمز</th>
                    <th style="text-align: center;">عدد الوحدات</th>
                 
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
                     
                </tr>
                @endforeach
            </tbody>
        </table>
     
 
@endsection


@extends('instructors.layout')
 
@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item">منسق الدراسة و الامتحانات</li>
    <li class="breadcrumb-item"><a href="#">جدول الامتحانات</a>
       

    </li>
     
 
</ol>
@endsection

@section('modals')

 <!-- Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">جديد</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('ExamsTableEditAction' )}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">التاريخ</label>
                    
                  <input type="date" class="form-control input-lg" name="date">
   
                  
                  </div>
                 
                <div class="form-group">
                  <label for="exampleInputEmail1">الاولى</label>
                  
                  <Select id="input-large" name="first" class="form-control input-lg" >
                    <option value="" selected disabled></option>
                      @foreach ($Department_subjects as $subject)
                      <option value="{{$subject->id}}">{{ $subject->arabic_name }}</option>
                      @endforeach
                  </Select>
 
                
                </div>
               
                <div class="form-group">
                    <label for="exampleInputEmail1">الثانية</label>
                    
                    <Select id="input-large" name="second" class="form-control input-lg" >
                        <option value="" selected disabled></option>
                        @foreach ($Department_subjects as $subject)
                        <option value="{{$subject->id}}">{{ $subject->arabic_name }}</option>
                        @endforeach
                    </Select>
   
                  
                  </div>
                  
              
           
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
          <button type="submit" class="btn btn-primary">حفظ</button>
        </form>
        </div>
      </div>
    </div>
  </div>      
@endsection

@section('content')
<div style="display:flex;justify-content:end;width:100%; margin-bottom:20px">
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
        إضافة
      </button>
      <a style="margin-right:20px" href="{{route('EditExamsTable')}}" class="btn btn-primary" >
        <strong>تعديل</strong>
    </a>
</div>

<table class="table  table-bordered" style="width:100%">
    <tr>
      <th rowspan="2">التاريخ</th>
   
    
    </tr>
   <tr>
   <td colspan="1" style="text-align: center">الفترة الاولى</td>
    <td colspan="1" style="text-align: center">الفترة الثانية</td>
 
   
   </tr>
   
   @foreach ($dates as $date)
   <tr style="border-top:2px solid black">
    <th rowspan="{{ App\Models\ExamsTable::getRows($date->date)}}"  style="text-align: center;vertical-align:middle"  >{{$date->date}}</th>
  

    @foreach (App\Models\ExamsTable::getSubs($date->date) as $item)
    <tr class="alert-primary">
        <td>   {{ App\Models\ExamsTable::getSubjectName($item->F )}} </td>
        <td>   {{ App\Models\ExamsTable::getSubjectName($item->S)}}</td>
    </tr>
        
    @endforeach

 

   @endforeach
   
   
 
</table>
@endsection
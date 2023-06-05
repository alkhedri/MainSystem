
@extends('instructors.layout')
 
@foreach ($subjects as $subject)
 
@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item">عضو هيئة التدريس</li>
    <li class="breadcrumb-item">قائمة المقررات</a>
        <li class="breadcrumb-item"><a href="#">{{$subject->arabic_name}}</a>
        
    </li>
     
 
</ol>
@endsection


@section('content')

                 
<div class="row" style="margin-bottom: 20px">

    <a href="{{route('marksRecord' , ['subject_id' => $subject_id])}}" class="btn btn-primary btn-md"><i class="icon-layers"></i>  تعديل الدرجات</a>
    <a href="{{route('attendanceRecord' , ['subject_id' => $subject_id])}}" class="btn btn-primary btn-md"><i class="icon-people"></i>  سجل الحضور</a>
    <a href="{{route('examsDate' , ['subject_id' => $subject_id])}}" class="btn btn-success btn-md"><i class="icon-calendar"></i>  مواعيد الامتحانات</a>
    
    


</div> 

 <div class="row">



    <div class="col-8">
      

 
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i>جدول المواعيد لمقرر 
                        -
                        {{$subject->arabic_name}}
                    </div>
                    <div class="card-block">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الموضوع</th>
                                    <th>تاريخ التحديد</th>
                                    <th>تاريخ التسليم</th>
                                    <th>ملاحظات</th>
                                    <th>الاجراء</th>
                                  
                                
                                </tr>
                            </thead>
                            <tbody>
                        
                                @foreach ($dates as $date)
   
                                <tr>
                                    <td> {{$loop->index + 1}}</td>
                                    <td> {{$date->name}}</td>
                                    <td> {{$date->req_date }}</td>
                                    <td> {{$date->due_date}}</td>
                                    <td> {{$date->details}}</td>
                                    <td>  
                                        <a class="btn btn-danger btn-sm" href="{{route('examsDateDelete' , ['id' => $date->id])}}">حذف</a>
                                     
                                    </td>
                                
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                 <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    إضافة موعد جديد
  </button>
  
                    </form> 
                    </div>
                </div>
            </div>
            <!--/col-->
        </div>
        </div>
  
    </div>
 
 

        
@endsection
@endforeach
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">موعد جديد</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="{{route('examsDateInsert' , ['subject_id' => $subject_id])}}" method="POST">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputEmail1">الموضوع</label>
                      <input type="text" class="form-control" name="name" aria-describedby="emailHelp" placeholder="الامتحان النصفي الثاني ..">
                      <small id="emailHelp" class="form-text text-muted">واجب , تقرير , امتحانات</small>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">تاريخ التسليم</label>
                      <input type="date" class="form-control" name="due" placeholder="2023">
                    </div>
                     
                      <div class="form-group">
                        <label for="exampleInputPassword1">ملاحظات</label>
                        <textarea class="form-control" name="details" rows="3"></textarea>
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
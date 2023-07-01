
@extends('Admins.ExaminationDepartment.layout')


@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item"><a href="#">الفصل الدراسي</a>
    <li class="breadcrumb-item"><a href="#">قائمة الفصول الدراسية</a>
    </li>
     
 
</ol>
@endsection
@section('modals')

 <!-- Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">تأكيد إجراء تغيير الفصل الحالي</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('CurrentSemesterActivate') }}" method="POST">
                @csrf
                <label for="">سيتم تغيير الفصل الدراسي الحالي </label>
                <p>عند تغيير الفصل الدراسي سيتم تفعيل الاتي : </p>
                <ul>
                    <li>1 ----- </li>
                    <li>2 ----- </li>
                    <li>3 ----- </li>
                    <li>4 ----- </li>
                </ul>
                <input id="sem_id" name="sem_id"  type="hidden">
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
          <button type="submit" class="btn btn-primary">تمكين التغيير</button>
        </form>
        </div>
      </div>
    </div>
  </div>      
</div>
@endsection

@section('content')

<div class="row">
    <div class="col-lg-6">
        <div class="alert alert-primary" role="alert">
             
            <p> الفصل الدراسي الحالي - <strong>[ {{$semester_name}} ] </strong>  </p>
            <hr>
            <a class="btn btn-primary btn-lg btn-block" href="{{route('NewSemester')}}"> 
                إضافة فصل دراسي جديد
             </a>
          </div>
        
           
          
      
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> قائمة الفصول الدراسية
            </div>
            <div class="card-block">
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>الفصل</th>
                      
                            <th>الحالة</th>
                            <th>خيارات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Semesters as $semester)
                            
                      
                        <tr>
                            <td>{{ $loop->index + 1}}</td>
                            <td>{{$semester->name}}</td>
                            
                         
                            <td>
                     
                                @if ($semester_id == $semester->id)
                                         
                                <a class="btn btn-success btn-sm" href=""
                   >
                                 {{ __('الفصل الحالي') }}
                             </a>
                        
                                   @else
                       
                                <button type="button" class="btn btn-danger btn-sm semesterid" data-id={{$semester->id}} data-toggle="modal" data-target="#exampleModal" style="margin-left: 10px">
                                    {{ __('تعيين كفصل حالي') }}
                                  </button>   
                                @endif
                       
                            
                               
                            </td>

                            <td>
                                <a data-confirm-delete="true" class="btn btn-outline-danger btn-sm" href="{{route('SemestersDeleteAction' , ['id' => $semester->id])}}"
                                    >    {{ __('حذف') }}
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>


                {{ $Semesters->links()}}
                  
               
            </div>
          
        </div>
    </div>
</div>
 
 
 
@endsection

@section('js-scripts')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script type="text/javascript">

 
$(document).on('click','.semesterid',function(){
         let id = $(this).attr('data-id');
         $('#sem_id').val(id);
    });

</script>

@endsection
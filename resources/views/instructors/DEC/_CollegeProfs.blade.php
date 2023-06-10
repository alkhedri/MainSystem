
@extends('instructors.layout')
 

@section('modals')
     <!-- Modal -->
     <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">متطلب جديد</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="{{route('ActionInsertNewSubjectRequiremet' )}}" method="POST">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputEmail1">المقرر</label>
                      
                      <Select id="input-large" name="requirement_id" class="form-control input-lg" >
                          @foreach ($Department_subjects as $subject)
                          <option value="{{$subject->id}}">{{ $subject->arabic_name }}</option>
                          @endforeach
                      </Select>
                   
@foreach ($subjects as $subject)
<input type="hidden" value="{{$subject->id}}" name="subject_id">
@endforeach
                    
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

@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item">منسق الدراسة و الامتحانات</li>
    <li class="breadcrumb-item"><a href="{{route('SubjectsMenu')}}">المقررات</a>
        <li class="breadcrumb-item"> تفاصيل  مقرر</li>
        <li class="breadcrumb-item">{{$subject_Code}}</li>
        <li class="breadcrumb-item">أستاذ خارج القسم</li>
       
    </li>
     
 
</ol>
@endsection


@section('content')
@if(Session::has('message'))
<div class="alert alert-primary" role="alert">
    <p>{{Session::get('message')}}</p>

   </div>

@endif
    <div class="row">

        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-edit"></i> تفاصيل المقرر
         
                </div>
                <div class="card-block">
                    @foreach ($subjects as $subject)
                                     
                                <form action="{{route('SubjectsProfessorAction' , ['id' => $subject->id])}}" method="post" class="form-horizontal ">
                                  
                                   @csrf
                                     
                                    <div class="form-group row">
                                        <label class="col-lg-3 form-control-label" for="input-large">أستاذ المقرر</label>
                                        <div class="col-lg-6"> 
                                            <Select id="input-large" name="professor_id" class="form-control" value="">
                                                <option value="{{$subject->proffesor_id}}" selected hidden> {{ App\Models\instructor::getInstructorsName($subject->proffesor_id) }}</option>
                                              
                                             @foreach ($instructors as $instructor)
                                             
                                             <option value="{{$instructor->id}}"> {{ App\Models\instructor::getInstructorsName($instructor->id)}}</option>
                                       
                                             @endforeach
                                              
                                           
                                               </Select>  
                                         
                                        </div>

                              
                                    </div>
                                    <div class="form-actions" dir="ltr">
                                        <button type="submit" class="btn btn-primary">حفظ التغييرات</button>
 
                                    </div>
                                </form>
                                @endforeach
                            </div>
        </div>
        <!--/col-->
    </div>
 
</div>
 
    
 
@endsection


 
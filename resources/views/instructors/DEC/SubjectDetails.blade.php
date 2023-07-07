
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
       
    </li>
     
 
</ol>
@endsection


@section('content')
@if(Session::has('message'))
<div class="alert alert-primary" role="alert">
   {{Session::get('message')}} 

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
                                     
                                <form action="{{route('ActionUpdateSubject' , ['id' => $subject->id])}}" method="post" class="form-horizontal ">
                                  
                                   @csrf
                                    <div class="form-group row">
                                        <label class="col-lg-4 form-control-label" for="input-small">اسم المقرر [عربي]</label>
                                        <div class="col-lg-7">
                                            <input type="text" id="input-small" name="arabic_name" class="form-control input-md" value="{{$subject->arabic_name}}">
                                            @error('arabic_name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 form-control-label" for="input-normal">اسم المقرر [انجليزي]</label>
                                        <div class="col-lg-7">
                                            <input type="text" id="input-normal" name="english_name" class="form-control" value="{{$subject->english_name}}">
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-lg-4 form-control-label" for="input-large">
                                              رمز المقرر - عدد الوحدات</label>
                                        <div class="col-lg-3">
                                            <strong>
                                                <input type="text" id="input-large" name="code" class="form-control input-lg" value="{{$subject->code}}">
                                            </strong>
                                    </div>
                                  
                                        <div class="col-lg-3">
                                            <strong>
                                                <Select id="input-large" name="units" class="form-control input-lg" placeholder=".input-lg">
                                                    <option value="{{$subject->units}}" selected  hidden>{{$subject->units}}</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                   </Select>      </strong>
                                    </div>
                                </div> 
                                    <div class="form-group row">
                                        <label class="col-lg-4 form-control-label input-lg" for="input-large">درجة : الأعمال | الإمتحان</label>
                                        <div class="col-lg-3">
                                            <strong>
                                                <input type="text" id="input-large" name="work" class="form-control input-lg" value="{{$subject->work_mark}}">
                                            </strong>
                                    </div>
                                  
                                        <div class="col-lg-3">
                                            <strong>
                                                <input type="text" id="input-large" name="final" class="form-control input-lg" value="{{$subject->final_mark}}">
                                            </strong>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-lg-4 form-control-label" for="input-large">ساعات : العملي | النظري</label>
                                    <div class="col-lg-3">
                                        <strong>
                                            <Select id="input-large" name="course_hours" class="form-control input-lg" placeholder=".input-lg">
                                                <option value="{{$subject->course_hours}}" selected  hidden>{{$subject->course_hours}}</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                               </Select>        </strong>
                                </div>
                              
                                    <div class="col-lg-3">
                                        <strong>
                                            <Select id="input-large" name="work_hours" class="form-control input-lg" placeholder=".input-lg">
                                                <option value="{{$subject->work_hours}}" selected  hidden>{{$subject->work_hours}}</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                               </Select>         </strong>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-4 form-control-label" for="input-large">   المجموعات</label>
                                <div class="col-lg-6"> 
                                    <Select id="input-large" name="groups" class="form-control input-lg" placeholder=".input-lg">
                                        <option value="{{$subject->groups}}" selected  hidden>{{$subject->groups}}</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                       </Select>         </strong>
                                </div>
                            </div>
                               
 
                                @foreach (App\Models\subject_group::getSubjectGroups($subject->id) as $item)
                                    
                               

                                    <div class="form-group row">
                                        <label class="col-lg-4 form-control-label" for="input-large">أستاذ المقرر</label>
                                        <div class="col-lg-6"> 
                                            <Select id="input-large" name="instructors[]" class="form-control" value="">
                                                <option value="{{$item->instructor_id}}" selected hidden> {{ App\Models\instructor::getInstructorsName($item->instructor_id) }}</option>
                                             @foreach ($instructors as $instructor)
                                             <option value="{{$instructor->id}}"> {{ App\Models\instructor::getInstructorsName($instructor->id)}}</option>
                                             @endforeach
                                               </Select>  
                                        </div>

                                          <a class=" btn btn-primary btn-sm" href="{{route('SubjectsProfessor', ['id' => $subject->id , 'group_id' => $item->id])}}">+</a>
                                    </div>
                                    @endforeach
                                    <div class="form-actions" dir="ltr">
                                        <button type="submit" class="btn btn-primary">حفظ التغييرات</button>
 
                                    </div>
                                </form>
                                @endforeach
                            </div>
        </div>
        <!--/col-->
    </div>

    <div class="col-lg-6">
    
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-align-justify"></i>  المتطلبات
                </div>
                <div class="card-block">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>المقرر</th>
                                <th>رمز المقرر</th>
                                <th>الاجراء</th>
                             
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($requirements as $requirement)
                            <tr>
                                <td>{{$loop->index + 1 }}</td>
                                <td> {{App\Models\subject::getSubjectName($requirement->requirement) }} </td>
                                <td> {{App\Models\subject::getSubjectCode($requirement->requirement) }} </td>
                                <td>
                              
                                    <a class="btn btn-danger btn-sm" href="{{route('ActionDeleteSubjectRequiremet' , ['id' => $requirement->id ])}}">حذف</a>
                                  
                                </td>
                            </tr>
                            @endforeach
                        
                          
                        </tbody>

                  
                    </table>
                    <div   dir="ltr">
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            إضافة
                          </button>
                    </div>
                </div>
            </div>
        </div>
 
</div>
 
    
 
@endsection


 
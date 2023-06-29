
@extends('Admins.ExaminationDepartment.layout')

@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item">رئيس القسم</li>
    <li class="breadcrumb-item"><a href="#">القاعات الدراسية</a>
    </li>
     
 
</ol>
@endsection


@section('content')

<div class="row">
 
   
    <div class="col-sm-6 col-md-4">
        <div class="card card-default">
            <div class="card-header">
                إضافة قاعة دراسية
                <div class="card-actions">
                    <a class="btn-maximize collapsed" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><i class="icon-arrow-down"></i></a>
          
                </div>
            </div>
            <div class="card-block collapse" id="collapseExample" aria-expanded="true" style="">
             
                <form action="{{route('RoomsActionAdd')}}" method="post" class="form-horizontal ">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="input-group">
                       
                                <input type="text" id="input1-group2" name="name" class="form-control" placeholder="اسم القاعة">
                            </div>
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="input-group">
                                <select id="departmentx" class="form-control"   name="departmentx">
                                    @foreach($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->arabic_name }}</option>
                                    @endforeach
                              
                                  </select>
                              </div>
                        </div>

                    </div>
                    <button type="submit" class="btn btn btn-success"><i class="fa fa-dot-circle-o"></i> إضافة</button>
 </form>
            </div>
        </div>
    </div>

    <div class="col-sm-5">
        <div class="row">

      
        <form action="{{route('RoomsDepartment')}}" method="POST">
            @csrf
      

            <div class="col-md-8">
                <div class="input-group">
                    <select id="departmentx" class="form-control"   name="departmentSeacrh">
                        @foreach($departments as $department)
                         <option value="{{ $department->id }}">{{ $department->arabic_name }}</option>
                        @endforeach
                  
                      </select>
                    </div>
            </div>
            <div class="col-md-2">
                   
                <button type="submit" class="btn btn btn-success"><i class="fa fa-dot-circle-o"></i> فرز</button>

            </div>
 
         
          
           
             
            </form>

         
          </div>

     
    </div>

    <a href="{{route('Rooms')}}" class="btn btn btn-primary"><i class="fa fa-dot-circle-o"></i> عرض الكل</a>


 
</div> 
<div class="col-sm-8">
    @if(Session::has('message'))
    <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('message') }}</p>
    @endif
</div>
 
    <div class="col-8">
      

 
                <div class="card">
                    <div class="card-header">
                     
                           قائمة القاعات   
 
                    
                    </div>
                    <div class="card-block">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>القاعة</th>
                                    <th>القسم</th>
                                    <th>الاجراء</th>
                                </tr>
                            </thead>
                            <tbody>
                          @foreach ($RoomsList as $Room)
                              
                        
                                <tr>
                                    <td>{{$loop->index + 1 }}</td>
                                    <td> {{ $Room->name }}</td>
                                    <td> 
                                    {{App\Models\department::getDepNameById($Room->department_id) }} 
                                </td>
                                    <td>
                                             
                                                <a data-confirm-delete="true"  class="btn btn-danger btn-sm" href="{{route('RoomsActionRemove' , ['Room_id' => $Room->id])}}">حذف</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                     {{$RoomsList->links()}}
                    </div>
                </div>
            </div>
            <!--/col-->
        </div>
        </div>
  
 
 
 
 
@endsection
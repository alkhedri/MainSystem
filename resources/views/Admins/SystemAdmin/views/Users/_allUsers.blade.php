
@extends('Admins.SystemAdmin.layout')





@section('breadcramp')
<ol class="breadcrumb">
 
    <li class="breadcrumb-item">الكليات</li>
    <li class="breadcrumb-item">المستخدمين</li>
 
    
    
                                     
</ol>
@endsection


@section('content')
 
 

<div class="row">
    <div class="col-8">
        <div class="card">
            <div class="card-header">
                <strong>بحث</strong> عضو هيئة تدريس
            </div>
            <div class="card-block">
                <form action="{{route('serach_Users')}}" method="post" class="form-horizontal ">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-6">
                            <div class="input-group">
                       
                                <input type="text" id="input1-group2" name="name" class="form-control" placeholder="الاسم">
                            </div>
                        </div>
                        <input type="hidden" id="input1-group2" name="id" value="">
                           
                        <button type="submit" class="btn btn btn-success"><i class="fa fa-dot-circle-o"></i> بحث</button>

                    </form>
                    </div>
                    <a class="btn btn btn-primary" href="{{route('SystemUsers')}}">
                        
                        <i class="fa fa-dot-circle-o"></i>
                          عرض الكل
                    </a>
    </div>
   
                        
</div> 

 
    <div class="col-8">
      

 
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i>قائمة اعضاء هيئة التدريس 
                    </div>
                    <div class="card-block">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th class="text-md-center">الاسم</th>
                                    <th class="text-md-center">الأدوار</th>
                                    <th class="text-md-center">الصلاحيات</th>
                                    <th class="text-md-center">الصفة</th>
                                   
                            
                                    <th class="text-md-center">الاجراء</th>
                                </tr>
                            </thead>
                            <tbody>
                          
                                @foreach ($users as $user)
                                    
                             
                                <tr>
                                    <td>{{$loop->index + 1}}</td>
                                    <td class="text-md-center"> <strong>{{$user->name}}</strong></td>
                                    <td class="text-md-center"> 

                                        <strong style="color:{{App\Models\Role::getRoleColor($user->id)}}">{{App\Models\Role::getRoleName($user->id)}}</strong>
                                    
                                    </td>
                                    <td class="text-md-center"><strong>{{App\Models\Permission::getCount($user->id)}}</strong></td>
                                    <td class="text-md-center"> <strong>{{App\Models\User::getWho($user->id)}}</strong></td>
                                     
                                    
                                    <td class="text-md-center">
                                        <a class="btn btn-primary " 
                                        href="{{route('RolesAndPermissions' , [ 'id' => $user->id ])}}"
                                        >الأدوار و الصلاحيات</a>
                                 

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                     
                        {{$users->links()}}
                    </div>
                </div>
            </div>
            <!--/col-->
        </div>
        </div>
  
 
 
 
@endsection
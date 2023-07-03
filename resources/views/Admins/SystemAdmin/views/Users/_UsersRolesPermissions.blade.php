
@extends('Admins.SystemAdmin.layout')





@section('breadcramp')
<ol class="breadcrumb">
 
    <li class="breadcrumb-item">الكليات</li>
    <li class="breadcrumb-item"><a href="{{route('SystemUsers')}}">المستخدمين</a></li>
    <li class="breadcrumb-item">{{$userName}}</li>
 
    
    
                                     
</ol>
@endsection


@section('content')
 
 

<div class="row">
    <div class="col-8">
        <div class="card">
            <div class="card-header">
                <strong>الأدوار</strong>      
            </div>
            <form action="{{route('ChangeRole')}}" method="POST">
                @csrf
            <div class="card-block">
                

                    @foreach ($Roles as $Role)
                    
                    <label class="inline-flex items-center " style="flex: 1 0 20%;margin:.8rem">
                      <input type="radio"  value="{{$Role->name}}" 
                      class="form-radio focus:shadow-none focus:border-transparent text-gray-500 h-4 w-4" 
                      name="role" {{  $user->hasRole($Role->name) === true ? "checked" : "" }} >


                      <span for="{{ $Role->id}}">{{ $Role->display_name}}</span><br>
                    
                     
                    </label>
                  @endforeach
        
                 
             
             
             
            </div>
            
           <input type="hidden" name="user_id" value="{{$userID}}">
            <div class="card-footer">
                <button class="btn btn-primary pull-left" type="submit">حفظ</button>

            </div>
        </form>
      
    </div>
   
                        
</div> 

 
    <div class="col-8">
      

 
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i>   الصلاحيات     
                    </div>
                    <div class="card-block">
                        <div class="flex flex-wrap justify-start mb-4">
                            @foreach ($Permissions as $Permission)
                              <label class="inline-flex items-center my-2" style="flex: 1 0 40%;margin:.8rem" >
                                <input name="{{ $Permission->id}}" type="checkbox" {{  $user->isAbleTo($Permission->name) === true ? "checked" : "" }} >
                                <label for="{{ $Permission->id}}">{{ $Permission->display_name}}</label><br>
                              
                               
                              </label>
                            @endforeach
                          </div>
                     
                     
                     
                    </div>
                </div>
            </div>
            <!--/col-->
        </div>
        </div>
  
 
 
 
@endsection
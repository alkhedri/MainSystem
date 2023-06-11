
@extends('Admins.ExaminationDepartment.layout')


@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item">الطلبة</li>
    <li class="breadcrumb-item"><a href="#">اخطار طالب </a>
    </li>
     
 
</ol>
@endsection


@section('content')

<div class="row">
    
    <div class="col-sm-8">
        <div class="card">
            <div class="card-header">
            نموذج اخطار طالب
        </div>
        <div class="card-block">
            <form action="{{route('NotifyStudent')}}" method="post">
                @csrf
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon">رقم القيد</span>
                        <input type="text" id="username3" name="studnet_badge" class="form-control">
                        <span class="input-group-addon"><i class="fa fa-user"></i>
                        </span>
                    </div>
                </div>
            
                <div class="form-group">
                    <div class="input-group">
                        <label class="input-group-addon">العنوان</label>
                        <input type="text" id="username3" name="title" class="form-control">
                              <span class="input-group-addon"><i class="fa fa-envelope"></i>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <label class="input-group-addon">الرسالة</label>
                        <textarea id="textarea-input" name="message" rows="5" class="form-control" placeholder="                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat nemo saepe quibusdam repudiandae in eius possimus nulla molestias tenetur nostrum neque, unde earum necessitatibus, praesentium officiis adipisci quidem maxime iusto!"></textarea>
                            <span class="input-group-addon"><i class="fa fa-envelope"></i>
                        </span>
                    </div>
                </div>

                <div class="form-group form-actions" dir="ltr">
                    <button type="submit" class="btn btn-sm btn-primary">اشعار</button>
                </div>
            </form>
        </div>
    </div>


</div>

   <div class="col-sm-4">
       @if(Session::has('name'))
      <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">تم ارسال الاشعار بنجاح</h4>
       
        <hr>
        <p class="mb-0">
            <p>   تفاصيل الاشعار :</p>
           
            <span> المستقبل : {{Session::get('name')}}</span>
            <br>
            <span> رقم القيد : {{Session::get('badge')}}</span>
            <br>
            <span>  القسم : {{Session::get('department')}}</span>
            
        </p>
      </div>
      </div>
      @endif

      
</div> 


</div>
 
<div class="col">
      

 
    <div class="card">
        <div class="card-header">
            <i class="fa fa-align-justify"></i>قائمة الاشعارات المرسلة 
        </div>
        <div class="card-block">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>الطالب</th>
                        <th>رقم القيد</th>
                        <th>العنوان</th>
                        <th>التاريخ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($notificationsList as $item)
                    <tr>
                 
                        <td>{{$loop->index}}</td>
                        <td><strong>{{App\Models\Student::getNameById($item->reciver_id)}}</strong></td>
                        <td>{{App\Models\Student::getBadgeById($item->reciver_id)}}</td>
                        <td>{{$item->title}}</td>
                        <td>{{$item->date}}</td>
                        
                  </tr>
                    @endforeach
      

          
                   
                </tbody>
               
            </table>
            {{ $notificationsList->onEachSide(5)->links() }}
        
        </div>
    
      </div>
      
  </div>
  
<!--/col-->
 
@endsection
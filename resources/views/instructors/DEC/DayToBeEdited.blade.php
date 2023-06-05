

@extends('instructors.layout')
 
@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item">منسق الدراسة و الامتحانات</li>
    <li class="breadcrumb-item"><a href="{{route('ClassTable')}}">جدول المحاضرات</a>
        <li class="breadcrumb-item">تعديل جدول المحاضرات</li>
            <li class="breadcrumb-item"><a href="#">{{ App\Models\TimeTable::day($day) }}</a>

    </li>
     
 
</ol>
@endsection

@section('content')
 
<div class="col-lg-12">
    @if(Session::has('message'))
    <div class="alert alert-primary" role="alert">
            {{Session::get('message')}} 
</div>
@endif
    <div class="card">
        <div class="card-header">
            <i class="fa fa-align-justify"></i> 
            جدول محاضرات يوم 
            {{ App\Models\TimeTable::day($day) }}
        </div>
        <div class="card-block">
              
           
            <div class="col-lg-3" style="width: 320px">

           
            <div class="alert alert-primary" role="alert">
                <h4 class="alert-heading">الاولى</h4>

        <form action="ClassTableEditAction" method="post">
            @csrf
                @foreach ($SelectedDay as $item)
                <input type="hidden" name="day" value="{{$item->day}}">
                <input type="hidden" name="ids[]" value="{{$item->id}}">
                  
                <div class="form-group row">
                    <div class="col-xs-6">

                  
                        <select   style="width:130px; height:30px" name="FirstPeriod[]" >
                            <option  value="{{$item->Stp}}" Selected>{{ App\Models\subject::find($item->Stp)->arabic_name ?? 'None'}} </option>
                             @foreach ($subjects as $subject)
                            <option  value="{{$subject->id}}">{{$subject->arabic_name ?? 'None'  }}</option>
                            @endforeach
                        </select>
                    </div>
                
                        <div class="col-xs-3">
                        <select    style="width:100px; height:30px" name="FirstPeriodRoom[]"  id="">
                              <option  value="{{ App\Models\Timetable_Room::getStpRoomID($item->id) }}"  Selected>{{ App\Models\Timetable_Room::getStpRoomByDayID($item->id) }} </option>
                                      
                              @foreach ($Rooms as $room)
                            <option  value="{{$room->id}}">{{$room->name ?? 'None'  }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @endforeach


        
              </div>
            </div>
  
            <div class="col-lg-3" style="width: 320px">

           
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">الثانية</h4>
    
 
                    @foreach ($SelectedDay as $item)
                    <input type="hidden" name="day" value="{{$item->day}}">
                    <input type="hidden" name="ids[]" value="{{$item->id}}">
                      
                    <div class="form-group row">
                        <div class="col-xs-6">
    
                      
                            <select   style="width:130px; height:30px" name="SecondPeriod[]" >
                                <option  value="{{$item->Sp}}" Selected>{{ App\Models\subject::find($item->Sp)->arabic_name ?? 'None'}} </option>
                                 @foreach ($subjects as $subject)
                                <option  value="{{$subject->id}}">{{$subject->arabic_name ?? 'None'}}</option>
                                @endforeach
                            </select>
                        </div>
                    
                            <div class="col-xs-3">
                            <select    style="width:100px; height:30px" name="SecondPeriodRoom[]"  id="">
                                  <option  value="{{ App\Models\Timetable_Room::getSpRoomID($item->id) }}"  Selected>{{ App\Models\Timetable_Room::getSpRoomByDayID($item->id) }} </option>
                                          
                                  @foreach ($Rooms as $room)
                                <option  value="{{$room->id}}">{{$room->name ?? 'None'  }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @endforeach
         
                  </div>
                </div>


                <div class="col-lg-3" style="width: 320px">

           
                    <div class="alert alert-warning" role="alert">
                        <h4 class="alert-heading">الثالثة</h4>
        
           
                        @foreach ($SelectedDay as $item)
                        <input type="hidden" name="day" value="{{$item->day}}">
                        <input type="hidden" name="ids[]" value="{{$item->id}}">
                          
                        <div class="form-group row">
                            <div class="col-xs-6">
        
                          
                                <select   style="width:130px; height:30px" name="ThirdPeriod[]" >
                                    <option  value="{{$item->Tp}}" Selected>{{ App\Models\subject::find($item->Tp)->arabic_name ?? 'None'}} </option>
                                     @foreach ($subjects as $subject)
                                    <option  value="{{$subject->id}}">{{$subject->arabic_name ?? 'None'}}</option>
                                
                                    @endforeach
                                </select>
                            </div>
                        
                                <div class="col-xs-3">
                                <select    style="width:100px; height:30px" name="ThirdPeriodRoom[]"  id="">
                                      <option  value="{{ App\Models\Timetable_Room::getTpRoomID($item->id) }}"  Selected>{{ App\Models\Timetable_Room::getTpRoomByDayID($item->id) }} </option>
                                              
                                      @foreach ($Rooms as $room)
                                    <option  value="{{$room->id}}">{{$room->name ?? 'None'  }}</option>
                                 
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @endforeach
        
         
                      </div>
                    </div>


                    <div class="col-lg-3" style="width: 320px">

           
                        <div class="alert alert-danger" role="alert">
                            <h4 class="alert-heading">الرابعة</h4>
            
                
                            @foreach ($SelectedDay as $item)
                            <input type="hidden" name="day" value="{{$item->day}}">
                            <input type="hidden" name="ids[]" value="{{$item->id}}">
                              
                            <div class="form-group row">
                                <div class="col-xs-6">
            
                              
                                    <select   style="width:130px; height:30px" name="ForthPeriod[]" >
                                        <option  value="{{$item->Fp}}" Selected>{{ App\Models\subject::find($item->Fp)->arabic_name ?? 'None'}} </option>
                                         @foreach ($subjects as $subject)
                                        <option  value="{{$subject->id}}">{{$subject->arabic_name ?? 'None'}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            
                                    <div class="col-xs-3">
                                    <select    style="width:100px; height:30px" name="ForthPeriodRoom[]"  id="">
                                          <option  value="{{ App\Models\Timetable_Room::getFpRoomID($item->id) }}"  Selected>{{ App\Models\Timetable_Room::getFpRoomByDayID($item->id) }} </option>
                                                  
                                          @foreach ($Rooms as $room)
                                        <option  value="{{$room->id}}">{{$room->name ?? 'None'  }}</option>
                                       
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @endforeach
    
                          </div>
                        </div>








                        <div   style="width:100% ;display:flex;justify-content:end">
                            <button class="btn btn-primary">حفظ</button>
                        </div>
                    </form>

        </div>
    </div>
</div>
 
 
 

@endsection


@section('page-js-script')
<script type="text/javascript">
 
</script>
@stop
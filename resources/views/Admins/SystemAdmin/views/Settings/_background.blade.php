
@extends('Admins.SystemAdmin.layout')





@section('breadcramp')
<ol class="breadcrumb">
 
    <li class="breadcrumb-item">الإعدادات</li>
    <li class="breadcrumb-item">نصوص النظام</li>
 
 
    
    
                                     
</ol>
@endsection


@section('content')
 
 
 
  <div class="row">
    <div class="col-md-3">
        <div class="card" style="border:2px solid black">
       
            <div class="image">
                <img src="/svg/PolygonLuminary.svg" alt="" style="width: 100% ; height:100%">

            </div>
             <div class="content">
          
           
                <form action="{{route('UpdateBackground')}}" method="POST">
                    @csrf
                      <input type="hidden" name="background" value="PolygonLuminary.svg">
                   @if ($SystemBackground == 'PolygonLuminary.svg')
                   <button type="submit" class="btn btn-success pull-left">الحالية</button>
                   @else
                   <button type="submit" class="btn btn-primary pull-left">تعيين</button>
                   @endif
                     
                   </form>
             </div>
           </div>
     </div>
    <div class="col-md-3">
        <div class="card" style="border:2px solid black">
            <div class="image">
                <img src="/svg/AnimatedShape.svg" alt="" style="width: 100% ; height:100%">
            </div>
             <div class="content">
             
           
                <form action="{{route('UpdateBackground')}}" method="POST">
                    @csrf
                      <input type="hidden" name="background" value="AnimatedShape.svg">
    
                      @if ($SystemBackground == 'AnimatedShape.svg')
                      <button type="submit" class="btn btn-success pull-left">الحالية</button>
                      @else
                      <button type="submit" class="btn btn-primary pull-left">تعيين</button>
                      @endif
                   </form>
             </div>
           </div>
     </div>
    <div class="col-md-3">
        <div class="card" style="border:2px solid black">
            <div class="image">
                <img src="/svg/Colored Shapes.svg" alt="" style="width: 100% ; height:100%">

           
            </div>
             <div class="content">
           
           
                <form action="{{route('UpdateBackground')}}" method="POST">
                    @csrf
                      <input type="hidden" name="background" value="Colored Shapes.svg">
    
                      @if ($SystemBackground == 'Colored Shapes.svg')
                      <button type="submit" class="btn btn-success pull-left">الحالية</button>
                      @else
                      <button type="submit" class="btn btn-primary pull-left">تعيين</button>
                      @endif
                   </form>
             </div>
           </div>
     </div>
 
    <div class="col-md-3">
        <div class="card" style="border:2px solid black">
            <div class="image"></div>
             <div class="content">
               
                <form action="{{route('UpdateBackground')}}" method="POST">
                @csrf
                  <input type="hidden" name="background" value="none">

                  
                  @if ($SystemBackground == 'none')
                  <button type="submit" class="btn btn-success pull-left">الحالية</button>
                  @else
                  <button type="submit" class="btn btn-primary pull-left">تعيين</button>
                  @endif
               </form>
             
             </div>
           </div>
     </div>
 



  </div>

 
 
@endsection
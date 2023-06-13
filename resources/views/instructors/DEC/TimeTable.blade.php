

@extends('instructors.layout')
 
@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item">منسق الدراسة و الامتحانات</li>
    <li class="breadcrumb-item"><a href="#">جدول المحاضرات</a>

    </li>
     
 
</ol>
@endsection

@section('modals')

 <!-- Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">جديد</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('TimeTableEditAction' )}}" method="POST">
                @csrf
                <div class="form-group row">
                    <label  class="col-lg-3" for="exampleInputEmail1">اليوم</label>

                    <div class="col-lg-6">
                   
                    <Select id="input-large" name="Day" class="form-control input-lg" >
                    <option value="0" selected>السبت</option>
                    <option value="1">الأحد</option>
                    <option value="2">الإثنين</option>
                    <option value="3">الثلاثاء</option>
                    <option value="4">الإربعاء</option>
                    <option value="5">الخميس</option>
              
                </Select>
            </div>
                  </div>
                 
                <div class="form-group row">
                    <label class="col-lg-3" for="exampleInputEmail1">المحاضرة الاولى</label>
                  
                    <div class="col-lg-6">
                   
                        
                            <Select id="input-large" name="First" class="form-control input-lg" >
                              <option value="" selected ></option>
                                @foreach ($Department_subjects as $subject)
                                <option value="{{$subject->id}}">{{ $subject->arabic_name }}</option>
                                @endforeach
                            </Select>
                     
                        </div>
                 

                        <div class="col-lg-3">
                   
                        <Select id="input-large" name="FirstRoom" class="form-control input-lg" >
                          <option value="" selected ></option>
                            @foreach ($Department_Rooms as $Rooms)
                            <option value="{{$Rooms->id}}">{{ $Rooms->name }}</option>
                            @endforeach
                        </Select>
                    </div>
            

 
                </div>
                <div class="form-group row">
                    <label class="col-lg-3" for="exampleInputEmail1">المحاضرة الثانية</label>
                  
                    <div class="col-lg-6">
                   
                        
                            <Select id="input-large" name="Second" class="form-control input-lg" >
                              <option value="" selected ></option>
                                @foreach ($Department_subjects as $subject)
                                <option value="{{$subject->id}}">{{ $subject->arabic_name }}</option>
                                @endforeach
                            </Select>
                     
                        </div>
                 

                        <div class="col-lg-3">
                   
                        <Select id="input-large" name="SecondRoom" class="form-control input-lg" >
                          <option value="" selected ></option>
                            @foreach ($Department_Rooms as $Rooms)
                            <option value="{{$Rooms->id}}">{{ $Rooms->name }}</option>
                            @endforeach
                        </Select>
                    </div>
            

 
                </div>
                <div class="form-group row">
                    <label class="col-lg-3" for="exampleInputEmail1">المحاضرة الثالثة</label>
                  
                    <div class="col-lg-6">
                   
                        
                            <Select id="input-large" name="Third" class="form-control input-lg" >
                              <option value="" selected ></option>
                                @foreach ($Department_subjects as $subject)
                                <option value="{{$subject->id}}">{{ $subject->arabic_name }}</option>
                                @endforeach
                            </Select>
                     
                        </div>
                 

                        <div class="col-lg-3">
                   
                        <Select id="input-large" name="ThirdRoom" class="form-control input-lg" >
                          <option value="" selected ></option>
                            @foreach ($Department_Rooms as $Rooms)
                            <option value="{{$Rooms->id}}">{{ $Rooms->name }}</option>
                            @endforeach
                        </Select>
                    </div>
            

 
                </div>
               
                <div class="form-group row">
                    <div  class="col-lg-3">
                        <label for="exampleInputEmail1">المحاضرة الرابعة</label>
                  
                    </div>
               
                    <div class="col-lg-6">
                   
                        
                            <Select id="input-large" name="Forth" class="form-control input-lg" >
                              <option value="" selected ></option>
                                @foreach ($Department_subjects as $subject)
                                <option value="{{$subject->id}}">{{ $subject->arabic_name }}</option>
                                @endforeach
                            </Select>
                     
                        </div>
                 

                        <div class="col-lg-3">
                   
                        <Select id="input-large" name="ForthRoom" class="form-control input-lg" >
                          <option value="" selected ></option>
                            @foreach ($Department_Rooms as $Rooms)
                            <option value="{{$Rooms->id}}">{{ $Rooms->name }}</option>
                            @endforeach
                        </Select>
                    </div>
            

 
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

@section('content')
 
<div class="col-lg-12">
  @if(Session::has('message'))
  <div class="alert alert-danger" role="alert">
          {{Session::get('message')}} 
</div>
@endif
  <div  style="display:flex;justify-content:end; margin:10px;">
    <a class="btn btn-primary" href="{{route('TimeTableEdit')}}" style="margin-left: 10px">تعديل</a>
 
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" style="margin-left: 10px">
        إضافة
      </button>

    <button  class="btn btn-primary"   onclick="CreatePDFfromHTML()"> <i class="fa icon-printer
      "></i>
      طباعة</button>

  </div>
    <div class="card">
        <div class="card-header">
            <i class="fa fa-align-justify"></i> جدول المحاضرات
         <strong>  [ {{$departmentName}} ] </strong> 
        </div>
        <div class="card-block">
              
<table class="table  table-bordered" style="width:100%" id="table" border='1' cellpadding='1'   >
    <tr>
      <th rowspan="2">المحاضرة  اليوم </th>
   
    
    </tr>
   <tr>
   <td colspan="3" style="text-align: center">الاولى</td>
    <td colspan="3" style="text-align: center">الثانية</td>
    <td colspan="3" style="text-align: center">الثالثة</td>
    <td colspan="3" style="text-align: center">الرابعة</td>
   
   </tr>
   
    <tr style="border-top:2px solid black">
        
      <th rowspan="{{App\Models\TimeTable::getRows(0)}}"  style="text-align: center;vertical-align:middle"  >السبت</th>
    </tr>
     

    @foreach ($Saturday as $item)
     <tr class="alert-primary">
        <td>{{App\Models\subject::getSubjectName($item->Stp)}}</td>
        <td>{{App\Models\TimeTable_Room::getStpRoomByDayID($item->id)}}</td>
        <td>TIME</td>

        <td>{{App\Models\subject::getSubjectName($item->Sp)}}</td>
        <td>{{App\Models\TimeTable_Room::getSpRoomByDayID($item->id)}}</td>
        <td>TIME</td>
        <td>{{App\Models\subject::getSubjectName($item->Tp)}}</td>
        <td>{{App\Models\TimeTable_Room::getTpRoomByDayID($item->id)}}</td>
        <td>TIME</td>
        <td>{{App\Models\subject::getSubjectName($item->Fp)}}</td>
        <td>{{App\Models\TimeTable_Room::getFpRoomByDayID($item->id)}}</td>
         <td>TIME</td>
     </tr>
     @endforeach
            
          
    
     <tr>
      <th rowspan="{{App\Models\TimeTable::getRows(1)}}" style="text-align: center;vertical-align:middle">الاحد</th>
    </tr> 

    @foreach ($Sunday as $item)
     <tr class="alert-success text-white">
 
        <td>{{App\Models\subject::getSubjectName($item->Stp)}}</td>
        <td>{{App\Models\TimeTable_Room::getStpRoomByDayID($item->id)}}</td>
        <td>TIME</td>
        <td>{{App\Models\subject::getSubjectName($item->Sp)}}</td>
        <td>{{App\Models\TimeTable_Room::getSpRoomByDayID($item->id)}}</td>
        <td>TIME</td>
        <td>{{App\Models\subject::getSubjectName($item->Tp)}}</td>
        <td>{{App\Models\TimeTable_Room::getTpRoomByDayID($item->id)}}</td>
        <td>TIME</td>
        <td>{{App\Models\subject::getSubjectName($item->Fp)}}</td>
        <td>{{App\Models\TimeTable_Room::getFpRoomByDayID($item->id)}}</td>
        <td>TIME</td>
       
     </tr>
     @endforeach
     
     <tr>
    
        <th rowspan="{{App\Models\TimeTable::getRows(2)}}" style="text-align: center;vertical-align:middle">الاثنين</th>
       
      </tr>
      
      @foreach ($Monday as $item)
     <tr class="alert-danger">
        <td>{{App\Models\subject::getSubjectName($item->Stp)}}</td>
        <td>{{App\Models\TimeTable_Room::getStpRoomByDayID($item->id)}}</td>
        <td>TIME</td>
        <td>{{App\Models\subject::getSubjectName($item->Sp)}}</td>
        <td>{{App\Models\TimeTable_Room::getSpRoomByDayID($item->id)}}</td>
        <td>TIME</td>
        <td>{{App\Models\subject::getSubjectName($item->Tp)}}</td>
        <td>{{App\Models\TimeTable_Room::getTpRoomByDayID($item->id)}}</td>
        <td>TIME</td>
        <td>{{App\Models\subject::getSubjectName($item->Fp)}}</td>
        <td>{{App\Models\TimeTable_Room::getFpRoomByDayID($item->id)}}</td>
        <td>TIME</td>
    </tr>
     @endforeach
    
       <tr>
      
    
        <th rowspan="{{App\Models\TimeTable::getRows(3)}}" style="text-align: center;vertical-align:middle">الثلاثاء</th>
         
      </tr>
      
      @foreach ($Tuesday as $item)
     <tr class="alert-warning">
        <td>{{App\Models\subject::getSubjectName($item->Stp)}}</td>
        <td>{{App\Models\TimeTable_Room::getStpRoomByDayID($item->id)}}</td>
        <td>TIME</td>
        <td>{{App\Models\subject::getSubjectName($item->Sp)}}</td>
        <td>{{App\Models\TimeTable_Room::getSpRoomByDayID($item->id)}}</td>
        <td>TIME</td>
        <td>{{App\Models\subject::getSubjectName($item->Tp)}}</td>
        <td>{{App\Models\TimeTable_Room::getTpRoomByDayID($item->id)}}</td>
        <td>TIME</td>
        <td>{{App\Models\subject::getSubjectName($item->Fp)}}</td>
        <td>{{App\Models\TimeTable_Room::getFpRoomByDayID($item->id)}}</td>
        <td>TIME</td>
     </tr>
     @endforeach
    
       <tr>
      
        <th rowspan="{{App\Models\TimeTable::getRows(4)}}" style="text-align: center;vertical-align:middle">الاربعاء</th>
         
      </tr>
      
      @foreach ($Wedensday as $item)
     <tr>
        <td>{{App\Models\subject::getSubjectName($item->Stp)}}</td>
        <td>{{App\Models\TimeTable_Room::getStpRoomByDayID($item->id)}}</td>
        <td>TIME</td>
        <td>{{App\Models\subject::getSubjectName($item->Sp)}}</td>
        <td>{{App\Models\TimeTable_Room::getSpRoomByDayID($item->id)}}</td>
        <td>TIME</td>
        <td>{{App\Models\subject::getSubjectName($item->Tp)}}</td>
        <td>{{App\Models\TimeTable_Room::getTpRoomByDayID($item->id)}}</td>
        <td>TIME</td>
        <td>{{App\Models\subject::getSubjectName($item->Fp)}}</td>
        <td>{{App\Models\TimeTable_Room::getFpRoomByDayID($item->id)}}</td>
        <td>TIME</td>
     </tr>
     @endforeach
    
       <tr>
      
       <th rowspan="{{App\Models\TimeTable::getRows(5)}}" style="text-align: center;vertical-align:middle">الخميس</th>
       
     </tr>
     
     @foreach ($Thursday as $item)
     <tr class="alert-info">
        <td>{{App\Models\subject::getSubjectName($item->Stp)}}</td>
        <td>{{App\Models\TimeTable_Room::getStpRoomByDayID($item->id)}}</td>
        <td>TIME</td>
        <td>{{App\Models\subject::getSubjectName($item->Sp)}}</td>
        <td>{{App\Models\TimeTable_Room::getSpRoomByDayID($item->id)}}</td>
        <td>TIME</td>
        <td>{{App\Models\subject::getSubjectName($item->Tp)}}</td>
        <td>{{App\Models\TimeTable_Room::getTpRoomByDayID($item->id)}}</td>
        <td>TIME</td>
        <td>{{App\Models\subject::getSubjectName($item->Fp)}}</td>
        <td>{{App\Models\TimeTable_Room::getFpRoomByDayID($item->id)}}</td>
        <td>TIME</td>
     </tr>
     @endforeach
      
    
  </table>
        </div>
    </div>


   
</div>
 
 
 
 
@endsection


@section('page-js-script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>

<script type="text/javascript">
            var style = "<style>";
                style = style + "table {width: 100%;font: 17px Calibri;}";
                style = style + "table, th, td {border: solid 1px #DDD ; border-collapse: collapse;";
                style = style + "padding: 2px 3px;text-align: center;}";
                style = style + "</style>";
function xxxx( ) {
  var divToPrint=document.getElementById("table");
        newWin= window.open("");
        newWin.document.write(style);          //  add the style.
        newWin.document.write(divToPrint.outerHTML);
        newWin.print();
        newWin.close();
}
 
//Create PDf from HTML...
function CreatePDFfromHTML() {
    var HTML_Width = $(".card").width();
    var HTML_Height = $(".card").height();
    var top_left_margin = 15;
    var PDF_Width = HTML_Width + (top_left_margin * 2);
    var PDF_Height = (PDF_Width * 1.5) + (top_left_margin * 2);
    var canvas_image_width = HTML_Width;
    var canvas_image_height = HTML_Height;

    var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;

    html2canvas($(".card")[0]).then(function (canvas) {
        var imgData = canvas.toDataURL("image/jpeg", 1.0);
        var pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);
        pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin, canvas_image_width, canvas_image_height);
        for (var i = 1; i <= totalPDFPages; i++) { 
            pdf.addPage(PDF_Width, PDF_Height);
            pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
        }
        pdf.save("TimeTable.pdf");
        $(".html-content").hide();
    });
}
</script>
 
@endsection



@extends('instructors.layout')
 
@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item">منسق الدراسة و الامتحانات</li>
    <li class="breadcrumb-item"><a href="#">جدول الامتحانات</a>
       

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
            <form action="{{route('ExamsTableEditAction' )}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">التاريخ</label>
                    
                  <input type="date" class="form-control input-lg" name="date">
   
                  
                  </div>
                 
                <div class="form-group">
                  <label for="exampleInputEmail1">الاولى</label>
                  
                  <Select id="input-large" name="first" class="form-control input-lg" >
                    <option value="" selected ></option>
                      @foreach ($Department_subjects as $subject)
                      <option value="{{$subject->id}}">{{ $subject->arabic_name }}</option>
                      @endforeach
                  </Select>
 
                
                </div>
               
                <div class="form-group">
                    <label for="exampleInputEmail1">الثانية</label>
                    
                    <Select id="input-large" name="second" class="form-control input-lg" >
                        <option value="" selected ></option>
                        @foreach ($Department_subjects as $subject)
                        <option value="{{$subject->id}}">{{ $subject->arabic_name }}</option>
                        @endforeach
                    </Select>
   
                  
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
<div style="display:flex;justify-content:end;width:100%; margin-bottom:20px">
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
        إضافة
      </button>
      <a style="margin-right:20px" href="{{route('EditExamsTable')}}" class="btn btn-primary" >
        <strong>تعديل</strong>
    </a>

    
    <button  style="margin-right:20px"  class="btn btn-primary"   onclick="xxxx()"> <i class="fa icon-printer
      "></i>
      طباعة</button>
</div>

<table class="table  table-bordered" style="width:100%" id="diagram">
    <tr>
      <th rowspan="2" style="text-align: center;vertical-align:middle">التاريخ</th>
   
    
    </tr>
   <tr>
   <td colspan="1" style="text-align: center">الفترة الاولى
    
    [09:00 - 12:00]
  </td>
    <td colspan="1" style="text-align: center">الفترة الثانية
      
      [12:00 - 03:00]
    </td>
 
   
   </tr>
   
   @foreach ($dates as $date)
   <tr style="border-top:2px solid black">
    
    <th rowspan="{{ App\Models\ExamsTable::getRows($date->date)}}"  style="text-align: center;vertical-align:middle"  >
      @php
      $day =  date('D', strtotime($date->date));
      switch ($day ) {
       case 'Sat':
       $day = 'السبت';
         break;
         case 'Sun':
       $day = 'الأحد';
         break;
         case 'Mon':
       $day = 'الإثنين';
         break;
         case 'Tue':
       $day = 'الثلاثاء';
         break;
         case 'Wed':
       $day = 'الإربعاء';
         break;
       case 'Thu':
       $day = 'الخميس';
         break;
       
       default:
         # code...
         break;
      }
   @endphp

   
  [ {{$day}} ]  
      {{$date->date}}

    </th>
  

    @foreach (App\Models\ExamsTable::getSubs($date->date) as $item)
    <tr class="alert-primary">
        <td>   {{ App\Models\ExamsTable::getSubjectName($item->F )}} </td>
        <td>   {{ App\Models\ExamsTable::getSubjectName($item->S)}}</td>
    </tr>
        
    @endforeach

 

   @endforeach
   
   
 
</table>
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
  var divToPrint=document.getElementById("diagram");
        newWin= window.open("");
        newWin.document.write(style);          //  add the style.
        newWin.document.write(divToPrint.outerHTML);
        newWin.print();
        newWin.close();
}
 
//Create PDf from HTML...
function CreatePDFfromHTML() {
    var HTML_Width = $(".table-bordered").width();
    var HTML_Height = $(".table-bordered").height();
    var top_left_margin = 15;
    var PDF_Width = HTML_Width + (top_left_margin * 2);
    var PDF_Height = (PDF_Width * 1.5) + (top_left_margin * 2);
    var canvas_image_width = HTML_Width;
    var canvas_image_height = HTML_Height;

    var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;
 

 
    document.getElementById('diagram').parentNode.style.overflow = 'visible';
    html2canvas($(".table-bordered")[0]).then(function (canvas) {
        var imgData = canvas.toDataURL("image/jpeg", 1.0);
        var pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);
        pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin, canvas_image_width, canvas_image_height);
        for (var i = 1; i <= totalPDFPages; i++) { 
            pdf.addPage(PDF_Width, PDF_Height);
            pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
        }
        pdf.save("Exams.pdf");
        $(".html-content").hide();
    });
}
</script>
 
@endsection

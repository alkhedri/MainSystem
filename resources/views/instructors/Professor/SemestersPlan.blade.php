@extends('instructors.layout')
 


@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item"><a href="#">الفصل الدراسي</a>
    <li class="breadcrumb-item"><a href="#">الخطة الدراسية</a>
    </li>
     
 
</ol>
@endsection


@section('content')
<div  style="display:flex;justify-content:end; margin:10px;">
  
    <button  class="btn btn-primary"   onclick="CreatePDFfromHTML()"> <i class="fa icon-printer
      "></i>
      طباعة</button>

  </div>
 
    <div class="row">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-edit"></i>الخطة الدراسية <strong>[{{$SEMESTER_NAME}}]</strong>
           
                </div>
                <div class="card-block">
                    <div class="card-block">
                        @foreach ($semesterplan as $plan)
                        
                                        <div class="form-group row">
                                            <label class="col-lg-3 form-control-label input-md" for="input-small">تجديد القيد :</label>
                                            <div class="col-lg-3">
                                                <strong>
                                                <input type="text" id="input-small" name="renewalStarts" class="form-control" value="{{$plan->renewalStarts}}">
                                            </strong>
                                        </div>
                                            <div class="col-lg-3">
                                                <strong>
                                                <input type="text" id="input-small" name="renewalEnds" class="form-control input-md" value="{{$plan->renewalEnds}}">
                                            </strong>
                                        </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 form-control-label" for="input-normal">تنزيل المواد</label>
                                            <div class="col-lg-3">
                                                <strong>
                                                <input type="text" id="input-normal" name="SubjectStarts" class="form-control" value="{{$plan->SubjectStarts}}">
                                            </strong>
                                        </div>
                                            <div class="col-lg-3">
                                                <strong>
                                                <input type="text" id="input-normal" name="SubjectEnds" class="form-control" value="{{$plan->SubjectEnds}}">
                                            </strong>
                                        </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 form-control-label" for="input-large">تنسيب الطلبة للأقسام العلمية</label>
                                            <div class="col-lg-6">
                                                <strong>
                                                <input type="text" id="input-large" name="StudntsMove" class="form-control input-lg" value="{{$plan->StudntsMove}}">
                                            </strong>
                                        </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 form-control-label" for="input-large">بداية و نهاية الدراسة</label>
                                            <div class="col-lg-3">
                                                <strong>
                                                <input type="text" id="input-large" name="semsStart" class="form-control input-lg" value="{{$plan->semsStart}}">
                                            </strong>
                                        </div>
                                      
                                        
                                        
                                            <div class="col-lg-3">
                                            <strong>
                                                <input type="text" id="input-large" name="semsEnds" class="form-control input-lg" value="{{$plan->semsEnds}}">
                                            </strong>
                                        </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 form-control-label" for="input-large">أخر موعد للإضافة</label>
                                            <div class="col-lg-6">
                                                <strong>
                                                <input type="text" id="input-large" name="LastChanceAdd" class="form-control input-lg" value="{{$plan->LastChanceAdd}}">
                                            </strong>
                                        </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 form-control-label" for="input-large">أخر موعد للحذف</label>
                                            <div class="col-lg-6">
                                                <strong>
                                                <input type="text" id="input-large" name="LastChanceDrop" class="form-control input-lg" value="{{$plan->LastChanceDrop}}">
                                            </strong>
                                        </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 form-control-label" for="input-large">الامتحانات النصفية الاولى</label>
                                            <div class="col-lg-3">
                                                <strong>
                                                <input type="text" id="input-large" name="FirstMidsStarts" class="form-control input-lg" value="{{$plan->FirstMidsStarts}}">
                                            </strong>
                                        </div>
                                            <div class="col-lg-3">
                                                <strong>
                                                <input type="text" id="input-large" name="FirstMidsEnds" class="form-control input-lg" value="{{$plan->FirstMidsEnds}}">
                                            </strong>
                                        </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 form-control-label" for="input-large">أخر موعد لايقاف القيد</label>
                                            <div class="col-lg-6">
                                                <strong>
                                                <input type="text" id="input-large" name="LastStop" class="form-control input-lg" value="{{$plan->LastStop}}">
                                            </strong>
                                        </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 form-control-label" for="input-large">الامتحانات النصفية الثانية</label>
                                            <div class="col-lg-3">
                                                <strong>
                                                <input type="text" id="input-large" name="SecondMidsStarts" class="form-control input-lg" value="{{$plan->SecondMidsStarts}}">
                                            </strong>
                                        </div>
                                            <div class="col-lg-3">
                                                <strong>
                                                <input type="text" id="input-large" name="SecondMidsEnds" class="form-control input-lg" value="{{$plan->SecondMidsEnds}}">
                                            </strong>
                                        </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 form-control-label" for="input-large">موعد اخر محاضرة</label>
                                            <div class="col-lg-6">
                                                <strong>
                                                <input type="text" id="input-large" name="Lastlecture" class="form-control input-lg" value="{{$plan->LastLecture}}">
                                            </strong>
                                        </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 form-control-label" for="input-large">الامتحانات النهائية</label>
                                            <div class="col-lg-3">
                                                <strong>
                                                <input type="text" id="input-large" name="FinalsStarts" class="form-control input-lg" value="{{$plan->FinalsStarts}}">
                                            </strong>
                                        </div>
                                            <div class="col-lg-3">
                                                <strong>
                                                <input type="text" id="input-large" name="FinalsEnds" class="form-control input-lg" value="{{$plan->FinalsEnds}}">
                                            </strong>
                                        </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 form-control-label" for="input-large">موعد اعتماد النتيجة</label>
                                            <div class="col-lg-6">
                                                <strong>
                                                <input type="text" id="input-large" name="Results" class="form-control input-lg" value="{{$plan->Results}}">
                                            </strong>
                                        </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 form-control-label" for="input-large">تقديم طلبات المراجعة</label>
                                            <div class="col-lg-3">
                                            <strong>
                                                <input type="text" id="input-large" name="ReviewStarts" class="form-control input-lg" value="{{$plan->ReviewStarts}}">
                                            </strong>
                                        </div>
                                            <div class="col-lg-3">
                                                <strong>
                                                <input type="text" id="input-large" name="ReviewEnds" class="form-control input-lg" value="{{$plan->ReviewEnds}}">
                                            </strong>
                                        </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 form-control-label" for="input-large">النظر في طلبات المراجعة</label>
                                            <div class="col-lg-3">
                                                <strong>
                                                <input type="text" id="input-large" name="CheckStarts" class="form-control input-lg"  value="{{$plan->CheckStarts}}">
                                            </strong>
                                            </div>
                                            <div class="col-lg-3">
                                                <strong>
                                                <input type="text" id="input-large" name="CheckEnds" class="form-control input-lg"  value="{{$plan->CheckEnds}}">
                                            </strong>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 form-control-label" for="input-large">موعد بداية الفصل القادم</label>
                                            <div class="col-lg-6">
                                                <strong>     <input type="text" id="input-large" name="NextSem" class="form-control input-lg" value="{{$plan->NextSem}}">
                                                </strong>
                                            </div>
                                        </div>
                                        <div class="form-actions" dir="ltr">
                                            
                             
                                        </div>
                          
                                    @endforeach
                                </div>
            </div>
            <!--/col-->
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
        pdf.save("SemesterPaln.pdf");
        $(".html-content").hide();
    });
}
</script>

@extends('instructors.layout')
 
@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item">منسق الدراسة و الامتحانات</li>
    <li class="breadcrumb-item"><a href="#">المقررات</a>
    </li>
     
 
</ol>
@endsection


@section('content')

<div class="row" style="margin-bottom: 10px">
    
    <div class="col-md-10">
       
        
    </div>

    <div class="col-md-2">
 
          <a class="btn btn-success btn-sm" href="{{route('NewSubject')}}"><i class="icon-docs"></i>إضافة مقرر</a>
                        
    </div>
</div> 
 

<div class="row">


 
    <div class="col-8">
      

 
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i>قائمة   المقررات 
                    </div>
                    <div class="card-block">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>المقرر</th>
                                    <th>الرمز</th>
                                    <th>الوحدات</th>
                                    <th>الحالة</th>
                                    <th>الاجراء</th>
                                </tr>
                            </thead>
                            <tbody>
                          
                                <tr>
                                    <td>1</td>
                                    <td> البرمجيات هندسة</td>
                                        <td>CET550</td>
                                        <td>3</td>
                                        <td>
                               
                                            <button type="button" class="btn btn-success btn-sm">متاح</button>
                                        </td>
                                    <td>
                                        <a href="{{route('SubjectDetails')}}" class="btn btn-primary btn-sm">عرض</a>
                                        <button type="button" class="btn btn-danger btn-sm">حذف</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>البرمجة نحو الاهداف</td>
                                    <td>CET302</td>
                                    <td>3</td>
                                    <td>
                               
                                        <button type="button" class="btn btn-success btn-sm">متاح</button>
                                    </td>
                                    <td>
                                   
                                        <a href="{{route('SubjectDetails')}}" class="btn btn-primary btn-sm">عرض</a>
                                        <button type="button" class="btn btn-danger btn-sm">حذف</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>مقدمة هندسة الشبكات</td>
                                    <td>CET300</td>
                                    <td>3</td>
                                    <td>
                               
                                        <button type="button" class="btn btn-success btn-sm">متاح</button>
                                    </td>
                                    <td>
                                        <a href="{{route('SubjectDetails')}}" class="btn btn-primary btn-sm">عرض</a>
                                        <button type="button" class="btn btn-danger btn-sm">حذف</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">Prev</a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="#">1</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">4</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--/col-->
        </div>
        </div>
    </div>
 
 
 
 
@endsection
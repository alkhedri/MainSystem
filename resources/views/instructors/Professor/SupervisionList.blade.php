
@extends('instructors.layout')
 

@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item">عضو هيئة التدريس</li>
    <li class="breadcrumb-item"><a href="#">قائمة الاشراف</a>
    </li>
     
 
</ol>
@endsection


@section('content')

<div class="row">
  
</div> 

 
    <div class="col-8">
      

 
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i>قائمة الطلبة 
                    </div>
                    <div class="card-block">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الطالب</th>
                                    <th>رقم القيد</th>
                                    <th>الاجراء</th>
                                </tr>
                            </thead>
                            <tbody>
                          
                                <tr>
                                    <td>1</td>
                                    <td>إهدوة نوري محمد المبروك</td>
                                    <td>2011110064</td>
                     
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm">عرض البيانات</button>
                                        <button type="button" class="btn btn-secondary btn-sm">نموذج 2</button>
                            
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>إبراهيم عبدالحكيم ابراهيم مخلوف  </td>
                                    <td>2211110213</td>
                     
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm">عرض البيانات</button>
                                        <button type="button" class="btn btn-secondary btn-sm">نموذج 2</button>
                               </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>هدى عبدالإله محمد الطاهر</td>
                                    <td>17200723112</td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm">عرض البيانات</button>
                                        <button type="button" class="btn btn-secondary btn-sm">نموذج 2</button>
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
  
 
 
 
 
@endsection
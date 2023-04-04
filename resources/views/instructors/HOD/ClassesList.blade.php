
@extends('instructors.layout')
 

@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item">رئيس القسم</li>
    <li class="breadcrumb-item"><a href="#">الطلبة المستمرين</a>
    </li>
     
 
</ol>
@endsection


@section('content')

<div class="row">
 
   
    <div class="col-sm-6 col-md-4">
        <div class="card card-default">
            <div class="card-header">
                إضافة قاعة دراسية
                <div class="card-actions">
                    <a class="btn-minimize" data-toggle="collapse" href="#collapseExample" aria-expanded="true" aria-controls="collapseExample"><i class="icon-arrow-down"></i></a>
                    <a class="btn-close" href="#"><i class="icon-close"></i></a>
                </div>
            </div>
            <div class="card-block collapse in" id="collapseExample" aria-expanded="true" style="">
             
                <form action="" method="post" class="form-horizontal ">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="input-group">
                       
                                <input type="text" id="input1-group2" name="input1-group2" class="form-control" placeholder="اسم القاعة">
                            </div>
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="input-group">
                       
                                <input type="text" id="input1-group2" name="input1-group2" class="form-control" placeholder="اسم المبنى">
                            </div>
                        </div>

                    </div>
                    <button type="submit" class="btn btn btn-success"><i class="fa fa-dot-circle-o"></i> إضافة</button>


            </div>
        </div>
    </div>
</div> 

 
    <div class="col-8">
      

 
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i>قائمة القاعات 
                    </div>
                    <div class="card-block">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>القاعة</th>
                                    <th>المبنى</th>
                                    <th>الاجراء</th>
                                </tr>
                            </thead>
                            <tbody>
                          
                                <tr>
                                    <td>1</td>
                                    <td>218</td>
                                    <td>Admin</td>
          
                                    <td>
                                                <button type="button" class="btn btn-danger btn-sm">حذف</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>معمل الحاسب 1</td>
                                    <td>Member</td>
                    
                                    <td>
                                    
                                        <button type="button" class="btn btn-danger btn-sm">حذف</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>68</td>
                                    <td>Staff</td>
                              
                                    <td>
                           
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
  
 
 
 
 
@endsection
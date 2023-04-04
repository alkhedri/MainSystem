
@extends('Admins.ExaminationDepartment.layout')


@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item">الاقسام الدراسية</li>
    <li class="breadcrumb-item">قائمة الاقسام</li>
    <li class="breadcrumb-item"><a href="#">بيانات القسم</a>
    </li>
     
 
</ol>
@endsection


@section('content')

<div class="row">
    
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-edit"></i>
                <strong>قسم</strong> 
                <span> [ هندسة الحاسب الالى
                    ] </span>
                <div class="card-actions">
                    <a href="#" class="btn-setting"><i class="icon-settings"></i></a>
                    <a href="#" class="btn-minimize"><i class="icon-arrow-up"></i></a>
                    <a href="#" class="btn-close"><i class="icon-close"></i></a>
                </div>
            </div>
            <div class="card-block">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label class="form-control-label" for="prependedInput">اسم القسم  [بالعربي]</label>
                        <div class="controls">
                            <div class="input-prepend input-group">
                                <input id="prependedInput" class="form-control" size="16" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-control-label" for="prependedInput">اسم القسم  [انجليزي]</label>
                        <div class="controls">
                            <div class="input-prepend input-group">
                                <input id="prependedInput" class="form-control" size="16" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-control-label" for="appendedInput">رمز القسم</label>
                        <div class="controls">
                            <div class="input-group">
                                <input id="appendedInput" class="form-control" size="16" type="text">
                                
                            </div>
                        
                        </div>
                    </div>
                   

                    <div class="form-group">
                        <label class="form-control-label" for="appendedInput">شعار القسم</label>
                        <div class="controls">
                            <div class="input-group">
                                <input type="file" id="file-input" name="file-input">
                                
                            </div>
                            
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="form-control-label" for="appendedPrependedInput">رئيس القسم</label>
                        <div class="controls">
                            <div class="input-prepend input-group">
                               
                                <select id="select" name="select" class="form-control" size="1">
                                    <option value="0">Please select</option>
                                    <option value="1">Option #1</option>
                                    <option value="2">Option #2</option>
                                    <option value="3">Option #3</option>
                                </select>
                                
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="appendedInputButton">منسق الدراسة و الامتحانات</label>
                        <div class="controls">
                            <div class="input-group">
                                <select id="select" name="select" class="form-control" size="1">
                                    <option value="0">Please select</option>
                                    <option value="1">Option #1</option>
                                    <option value="2">Option #2</option>
                                    <option value="3">Option #3</option>
                                </select>
                         
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-actions" dir="ltr">
                        <button type="submit" class="btn btn-primary">حفظ</button>
                        <button type="button" class="btn btn-default">الغاء</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

  
<div class="col-4">
    <div class="col-sm-6 col-lg-3">
        <div class="card">
            <div class="card-block">
                <img src="img/University-Logo.png" class="img-avatar" alt="admin@bootstrapmaster.com" style="width: 300px; height:300px">
            </div>
        </div>
    </div>
</div>
</div>
@endsection
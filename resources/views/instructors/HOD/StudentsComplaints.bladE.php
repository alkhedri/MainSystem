
@extends('instructors.layout')
 

@section('breadcramp')
<ol class="breadcrumb">
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item">رئيس القسم</li>
    <li class="breadcrumb-item"><a href="#">الشكاوي</a>
    </li>
     
 
</ol>
@endsection


@section('content')

<div class="row">
 

 
    <div class="col-8">
      

 
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i>قائمة الشكاوي 
                    </div>
                    <div class="card-block">
                        <table class="table">
                            <thead>
                                <tr>
                      

                                    <th>#</th>
                                    <th style="width: 180px; overflow: hidden;">الطالب</th>
                                    <th>رقم القيد</th>
                                    <th>العنوان</th>
                                    
                                    <th>الاجراء</th>
                                </tr>
                            </thead>
                            <tbody>
                          
                                <tr>
                                    <td>1</td>
                                    <td>محمد فرج الطاهر الخذري</td>
                                    <td>16611200398</td>
                                    <td>Pompeius René Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus sunt odit inventore dignissimos sequi tenetur laboriosam totam deserunt perspiciatis, quidem consectetur quia debitis dicta reprehenderit, ut cumque, doloremque nisi asperiores.</td>
 
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm">عرض الشكوى</button>
                                      
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>محمد فرج الطاهر الخذري</td>
                                    <td>16611200398</td>
                                    <td>Pompeius René Lorem ipsum, dolor sit amet consectetur adipisicing elit. Totam nisi distinctio rerum repudiandae recusandae quia expedita amet. Cumque labore maxime ea dolorem, molestias quibusdam obcaecati voluptas sequi dolores hic facere.</td>
               
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm">عرض الشكوى</button>
                                     
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>محمد فرج الطاهر الخذري</td>
                                    <td>16611200398</td>
                                    <td>Pompeius René Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus fuga optio quas dignissimos maxime exercitationem velit iure saepe, dolor dolorem! Non delectus consectetur labore cum corporis dolor eius. Perferendis, nulla?</td>
               
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm">عرض الشكوى</button>
                             
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
@extends('const.const')
@section('content')
<div class="col-12  row" style="padding: 8px;margin-top: 55px">
    <div class="panel panel-default   col-12 ">


     

      <div class="panel-heading  col-12" style="padding: 0px; ">
            <div class="panel-body col-12 row" style=" background: #2381c6;color: #fff;padding:  20px 5px; ">
                <div class="col-6 " style="padding: 4px">
                    <span class="fa fa-user" style="color: var(--orange-light-color);margin-right: 10px;padding-left: 20px;font-size: 22px;"></span>  عنوان الصفحة 
                </div>
                <div class="col-6  text-right" style="padding: 0px;display: unset;">
                    <button></button>
                     <a href="{{ route('banks.create') }}">
                         <button style="border:none;border-radius: 40px!important;padding: 10px 25px;background: var(--orange-color);display: inline-block;color: #fff;float: left;">إضافة</button>
                    </a>
                </div>
            </div>
        </div>  


            <div class="panel-body  row" style="padding: 0px; background: ">

                           @include('const.enternalConst.alert-remove')
                            
                            <div class="col-12 row   text-center loading-img" style="height: 700px;position: absolute;z-index: 1;padding-top: 100px;background: #fff;z-index: 9;overflow: hidden;">
                                <img src="https://www.umalis.fr/Front/assets/images/loader-2.gif" style="display: inline-block;width: 70px;height: 70px;">
                            </div>


                            <div class="col-12    real-content row " style="opacity: 0;padding:30px  0px;position: relative;">
                             

                                <table  id="myTable" class="table table-striped table-bordered col-12 " style="padding: 0px;">
                                    <thead>
                                        <tr>
                                            <th>الكود</th>
                                            <th>الأسم</th>
                                            <th>النوع</th>
                                            <th>النسبه</th>
                                            <th>عملية</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>الأسم</td>
                                            <td>النوع</td>
                                            <td>النسبه</td>
                                            <td>عملية</td>
                                            <td style="max-width: 100px">
                                               
                                                    <a href="#"  data-toggle="tooltip" data-placement="bottom" title="تعديل">
                                                        <span class="far fa-edit"></span>
                                                    </a>
                                               
                                               
                                                    <a href="#" onclick="

                                                            $('.alert-layer').fadeIn();
                                                            $('#remove-target').attr('action','#');
                                                          "  data-toggle="tooltip" data-placement="bottom" title="حذف">
                                                        <span class="far fa-trash-alt"></span>
                                                    </a>
                                             
                                            </td>
                                        </tr>
                                    </tbody>
                                 
                                </table>

                                <div class="col-12 ">  </div>
                            </div>
            </div>


        </div>
</div>
@endsection
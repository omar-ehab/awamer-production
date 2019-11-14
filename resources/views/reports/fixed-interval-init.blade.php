@extends('const.const')
@section('content')
<style type="text/css">
    #myTable_filter
    {
        display: none;
    }
    .dt-buttons{
        display: none;
    }
</style>

 
    <div class="col-12   px-0" style=";margin-top: 55px">
        <div class="panel panel-default col-sm-12  px-0" style="background: #fff!important;">
            <div class="panel-heading col-12 row" style="">
                <div class="panel-body col-12 row" style=" background: #2381c6;color: #fff;padding:  20px 5px; ">

                    <div class="col-sm-6 " style="padding: 4px">
                        <span class="fad fa-file-chart-pie" style="color: var(--orange-light-color);margin-right: 10px;padding-left: 20px;font-size: 22px;"></span> التقارير
                    </div>
               

                </div>
            </div>


            <div class="panel-body col-12 row" style="padding: 0px; background: ">
                 <div class="col-12  mt-5 " >
                 <div class="col-12 col-md-8 row p-3" style="border:1px solid #ddd; ">
                    <form method="POST" action="/reports/fixed-interval" class="col-12 row">
                      @csrf
                        <div class="col-12 col-md-7 mt-2 row px-0">
                            <div class="col-12 text-left pt-1 mb-3">
                                تحديد الفترة
                            </div>
                            <div class="col-11  mb-3">
                                <select class="form-control" name="id">
                                    @foreach($intervals as $interval)
                                    <option value="{{$interval->id}}">{{$interval->name}} [ {{$interval->start}} -{{$interval->end}} ]</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12 mt-2 text-left  mb-3">
                            <button class="btn btn-info btn-md d-inline-block">اختيار</button>
                        </div>

                    </form>
                     </div>
                 </div>



             <!--    <div class="col-12 col-md-12 mt-5">
                     <table  id="myTable" class="table table-striped table-bordered col-12 " style="padding: 0px;">
                        <thead>
                            <tr>
                                <th>اختيار</th>
                                <th>الأسم</th>
                                <th>عنوان في الجدول</th>
                                <th>عنوان في الجدول</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                      
                           {{--  <tr>
                                <td>اختيار</td>
                                <td>الأسم</td>
                                <td>عنوان في الجدول</td>
                                <td>عنوان في الجدول</td>
                            </tr> --}}
                       
                           
                        </tbody>
                    </table>

                </div> -->
                <!-- /.content -->
            </div>
        </div>
    </div>
 
 
@endsection





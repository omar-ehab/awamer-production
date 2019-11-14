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

 
    <div class="col-12  row px-0" style=";margin-top: 55px">
        <div class="panel panel-default col-sm-12  px-0" style="background: #fff!important;">
            <div class="panel-heading col-12 row" style="">
                <div class="panel-body col-12 row" style=" background: #2381c6;color: #fff;padding:  20px 5px; ">

                    <div class="col-sm-6 " style="padding: 4px">
                        <span class="fad fa-file-chart-pie" style="color: var(--orange-light-color);margin-right: 10px;padding-left: 20px;font-size: 22px;"></span> تقرير العمليات المحددة
                    </div>
               

                </div>
            </div>


            <div class="panel-body col-12 row" style="padding: 0px; background: ">
                @include('reports.reports-menu')
                <div class="col-12   mt-5">
                     <table  id="myTable" class="table table-striped table-bordered col-12 " style="padding: 0px;">
                        <thead>
                            <tr>
                                <th>كود</th>
                                <th>اسم المؤسسة</th>
                                <th>المتبرع</th>
                                <th>المبلغ</th>
                                <th>النوع</th>
                                <th>حالة العملية</th>
                                <th>عملية آلية  </th>
                              
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                        @foreach($operations as $operation)
                            <tr>
                                <td>{{$operation->id}}</td>
                                <td>{{$operation->establishment->name}}</td>
                                <td>
                                    @if(isset($operation->donor_id))
                                        {{$operation->donor->name}}
                                    @endif
                                </td>
                                <td>{{$operation->amount}}</td>
                                <td>{{$operation->type}}</td>
                                <td>
                                    @if($operation->success=="0")
                                    <span class="fa fa-times"></span>
                                    @else
                                     <span class="fa fa-check"></span>
                                    @endif
                          
                                </td>
                                <td>
                                    @if($operation->excel_sheet_id==null)
                                    <span class="fa fa-times"></span>
                                    @else
                                     <span class="fa fa-check"></span>
                                    @endif
                                </td>

                            </tr>
                        @endforeach
                           
                        </tbody>
                    </table>

                    <div class="col-12 px-0">
                        {{$operations->links()}}
                    </div>

                </div>
                <!-- /.content -->
            </div>
        </div>
    </div>
 
 
@endsection





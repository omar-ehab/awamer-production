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
                        <span class="fad fa-file-chart-pie" style="color: var(--orange-light-color);margin-right: 10px;padding-left: 20px;font-size: 22px;"></span> تقارير المتبرعين الموقوفين
                    </div>
               

                </div>
            </div>


            <div class="panel-body col-12 row" style="padding: 0px; background: ">
                @include('reports.reports-menu')
                <div class="col-12  mt-5">
                     <table  id="myTable" class="table table-striped table-bordered col-12 " style="padding: 0px;">
                        <thead>
                            <tr>
                                <th>كود</th>
                                <th>الأسم</th>
                                <th>   بنك المتبرع  </th>
                                <th>رقم حساب المتبرع </th>
                                <th>قيمة التبرع</th>
                                <th>   رقم الهاتف </th>

                                <th>      تاريخ بداية التبرع </th>
                                <th>      تاريخ نهاية التبرع </th>
                                
                                
                                
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                        @foreach($donors as $donor)
                            <tr>
                                <td>{{$donor->id}}</td>
                                <td>{{$donor->name}}</td>
                                <td>{{$donor->donorBank->name}}</td>
                                <td>{{$donor->donor_account_number}}</td>
                                <td>{{$donor->amount_of_withdrawal}}</td>
                                <td>{{$donor->mobile}}</td>
                                <td>{{$donor->withdraw_start_date}}</td>
                                <td>{{$donor->withdraw_end_date}}</td>

                            </tr>
                        @endforeach
                           
                        </tbody>
                    </table>
                    <div class="col-12">
                        {{$donors->links()}}
                    </div>

                </div>
                <!-- /.content -->
            </div>
        </div>
    </div>
 
@endsection





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

 <form action="{{ route('operations.store') }}" method="POST"  class="col-12 px-0"  >
    <div class="col-12  row px-0" style=";margin-top: 55px">
        <div class="panel panel-default col-sm-12  px-0" style="background: #fff!important;">
            <div class="panel-heading col-12 row" style="">
                <div class="panel-body col-12 row" style=" background: #2381c6;color: #fff;padding:  20px 5px; ">

                    <div class="col-sm-6 " style="padding: 4px">
                        <span class="fad fa-file-chart-pie" style="color: var(--orange-light-color);margin-right: 10px;padding-left: 20px;font-size: 22px;"></span> تقارير العمليات الناجحة
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
                                <th>المتبرع</th>
                                <th>    الفترة</th>
                                <th>الحساب البنكي</th>
                                <th>  الحالة</th>
                                <th>  النوع</th>
                                <th>  المبلغ</th>

                            </tr>
                        </thead>
                        <tbody id="tableBody">
                       @foreach($operations as $operation)
                            <tr>
                                <td>{{ $operation->id}}</td>
                                <td>
                                    @if(null!==$operation->donor_id)
                                    <a href="/donor/{{$operation->donor->id}}/edit">{{$operation->donor->name}}</a>
                                    @endif
                                </td>
                                <td>
                                    @if(null!==$operation->interval_id)
                                    {{$operation->interval->start}} - {{$operation->interval->end}}
                                    @endif
                                </td>
                                <td>
                                    @if(null!==$operation->bank_account_id)
                                    {{$operation->bank_account->name}}
                                    @endif
 
                                </td>

                                <td> {{$operation->state}}  </td>
                                <td>
                                    @if($operation->type=="auto")
                                    <a href="/reports/excel_sheet/{{$operation->excel_sheet->path}}" target="_blank">
                                      عملية آلية
                                    </a>
                                    @else
                                        عملية يدوية
                                    @endif
                                
                                </td>
                                <td> {{$operation->amount}} </td>


                            </tr>
                        @endforeach
                           
                        </tbody>
                    </table>
                    <div class="col-12">
                        {{$operations->links()}}
                    </div>

                </div>
                <!-- /.content -->
            </div>
        </div>
    </div>
</form>
 
@endsection





@extends('const.const')
@section('content')
<div class="col-12  row" style="padding: 8px;margin-top: 55px">
    <div class="panel panel-default   col-12 ">
      <div class="panel-heading  col-12" style="padding: 0px; ">
            <div class="panel-body col-12 row " style=" background: #2381c6;color: #fff;padding:  20px 5px; ">
                <div class="col-6 " style="padding: 4px">
                    <span class="fa fa-file" style="color: var(--orange-light-color);margin-right: 10px;padding-left: 20px;font-size: 22px;"></span>  العقود
                </div>
            </div>
        </div>

            <div class="panel-body row" style="padding: 30px 0px;  ">
               @include('const.enternalConst.alert-remove')
               @include('const.enternalConst.loading-img')
                <div class="col-12 real-content row " style="opacity: 0;padding:30px  0px;position: relative;">

                    <table  id="myTable" class="table table-striped table-bordered col-12 " style="padding: 0px;">
                        <thead>
                            <tr>
                                <th>الكود</th>
                                <th>اسم الجهة</th>
                                <th>عملية</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $x = 1;?>
                            @foreach($contracts as $contract)
                            <tr>
                                <td>{{$x}}</td>
                                <td>{{$contract->establishment->name}}</td>

                                <td style="max-width: 100px">
                                    <a href='{{ route('contracts.print', $contract->id) }}'  data-toggle="tooltip" data-placement="bottom" title="طباعة">
                                        <span class="far fa-print"></span>
                                    </a>
                                </td>
                            </tr>
                            <?php $x = $x++;?>
                            @endforeach
                        </tbody>

                    </table>

                    <div class="col-12 ">  </div>
                </div>
            </div>

        </div>
</div>
@endsection

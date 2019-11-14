@extends('const.const')
@section('content')
    <div class="col-12  row" style="padding: 8px;margin-top: 55px">
        <div class="panel panel-default   col-12 ">
            <div class="panel-heading  col-12" style="padding: 0px; ">
                <div class="panel-body col-12 row " style=" background: #2381c6;color: #fff;padding:  20px 5px; ">
                    <div class="col-6 " style="padding: 4px">
                        <span class="fa fa-clock" style="color: var(--orange-light-color);margin-right: 10px;padding-left: 20px;font-size: 22px;"></span>  سنادات قبض المتبرعين
                    </div>
                    <div class="col-6  text-right" style="padding: 0px;display: unset;direction: ltr">
                        <button></button>
                        <a href="{{ route('sanads.DonorReceivableSanadCreate') }}">
                            <button style="border:none;border-radius: 40px!important;padding: 10px 25px;background: var(--orange-color);display: inline-block;color: #fff;float: left;">إنشاء سند</button>
                        </a>
                    </div>
                </div>
            </div>


            <div class="panel-body row" style="padding: 0px;  ">

                @include('const.enternalConst.alert-remove')
                @include('const.enternalConst.loading-img')

                <div class="col-12 real-content row " style="opacity: 0;padding: 30px 0px;position: relative;">


                    <table id="myTable" class="table table-striped table-bordered col-xs-12" style="width:100%;padding: 0px;">
                        <thead>
                        <tr>
                            <th>رقم السند</th>
                            <th>تاريخ السند</th>
                            <th>المبلغ</th>
                            <th>اسم المتبرع</th>
                            <th>عملية</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sanads as $sanad)

                            <tr>

                                <td>{{ $sanad->sanad_number }}</td>
                                <td>{{ $sanad->sanad_date }}</td>
                                <td>{{ $sanad->amount }}</td>
                                <td>{{ $sanad->donor->name }}</td>


                                <td style="max-width: 100px">
                                    <a href="{{ route('sanads.DonorReceivableSanadPrint', $sanad->id) }}" target="_blank" data-toggle="tooltip" data-placement="bottom" title="طباعة">
                                        <span class="fas fa-print" style="color: #919191; font-size: 18px"></span>
                                    </a>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="col-12 "></div>
                </div>
            </div>
        </div>
    </div>
@endsection


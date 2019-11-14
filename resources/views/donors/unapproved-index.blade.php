@extends('const.const')
@section('content')
    <div class="col-12  row" style="padding: 8px;margin-top: 55px">
        <div class="panel panel-default   col-12 ">
            <div class="panel-heading  col-12" style="padding: 0px; ">
                <div class="panel-body col-12 row " style=" background: #2381c6;color: #fff;padding:  20px 5px; ">
                    <div class="col-6 " style="padding: 4px">
                        <span class="fa fa-hands-usd" style="color: var(--orange-light-color);margin-right: 10px;padding-left: 20px;font-size: 22px;"></span>المتبرعين الجدد
                    </div>
                </div>
            </div>


            <div class="panel-body row" style="padding: 0px;  ">

                @include('const.enternalConst.alert-remove')
                @include('const.enternalConst.loading-img')

                <div class="col-12 real-content row " style="opacity: 0;padding: 30px 0px;position: relative;">


                    <table  id="myTable" class="table table-striped table-bordered col-12 " style="padding: 0px;">
                        <thead>
                        <tr>
                            <th>الأسم</th>
                            <th>بنك المتبرع</th>
                            <th>رقم حساب المتبرع</th>
                            <th>بنك ورقم الجهة</th>
                            <th>البريد الالكتروني</th>
                            <th>الجوال</th>
                            <th>المبلغ المستقطع</th>
                            <th>يوم الإستقطاع من كل شهر</th>
                            <th>تاريخ بداية الإستقطاع</th>
                            <th>تاريخ نهاية الإستقطاع</th>
                            @permission(['update-donor', 'delete-donor'])
                            <th>عملية</th>
                            @endpermission
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($donors as $donor)
                            <tr>
                                <td style="font-size: 16px">{{$donor->name}}</td>
                                <td style="font-size: 16px">{{$donor->donorBank->name}}</td>
                                <td style="font-size: 16px">{{$donor->donor_account_number}}</td>
                                <td style="font-size: 16px">{{ $donor->establishmentBankAccount->bank->name }} - {{number_format($donor->establishmentBankAccount->account_number,0,'','')}}</td>
                                <td style="font-size: 16px">{{$donor->email}}</td>
                                <td style="font-size: 16px">{{$donor->mobile}}</td>
                                <td style="font-size: 16px">{{$donor->amount_of_withdrawal}} ر.س</td>
                                <td style="font-size: 16px">{{ $donor->day_of_withdraw }}</td>
                                <td style="font-size: 16px">{{ $donor->withdraw_start_date }}</td>
                                <td style="font-size: 16px">{{ $donor->withdraw_end_date }}</td>
                                @permission(['update-donor', 'delete-donor'])
                                <td style="max-width: 100px">
                                    @permission('update-donor')
                                        <form action="{{ route('donors.approve') }}" method="post">
                                            @csrf
                                            @method('post')
                                            <input type="hidden" name="donor_id" value="{{ $donor->id }}">
                                            <button class="btn btn-success" type="submit">موافقة</button>
                                        </form>
                                    @endpermission
                                </td>
                                @endpermission
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

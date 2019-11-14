@extends('const.const')
@section('content')
<div class="col-12  row" style="padding: 8px;margin-top: 55px">
    <div class="panel panel-default   col-12 ">
      <div class="panel-heading  col-12" style="padding: 0px; ">
            <div class="panel-body col-12 row " style=" background: #2381c6;color: #fff;padding:  20px 5px; ">
                <div class="col-6 " style="padding: 4px">
                    <span class="fa fa-hands-usd" style="color: var(--orange-light-color);margin-right: 10px;padding-left: 20px;font-size: 22px;"></span>  المتبرعين
                </div>
                @permission('create-donor')
                <div class="col-6  text-right" style="padding: 0px;display: unset;direction: ltr">
                    <button></button>
                    <a href="{{ route('donors.create') }}">
                         <button style="border:none;border-radius: 40px!important;padding: 10px 25px;background: var(--orange-color);display: inline-block;color: #fff;float: left;">إضافة</button>
                    </a>
                    <a href="{{ route('donors.import-view') }}">
                         <span style="border:none;border-radius: 40px!important;padding: 10px 25px;background: green;display: inline-block;color: #fff;float: left;margin-left: 4px">إستيراد</span>
                    </a>
                    
                </div>
                @endpermission
            </div>
        </div>


            <div class="panel-body row" style="padding: 0px;  ">

               @include('const.enternalConst.alert-remove')
               @include('const.enternalConst.loading-img')

                <div class="col-12 real-content row " style="opacity: 0;padding: 30px 0px;position: relative;">


                    <table  id="myTable" class="table table-striped table-bordered col-12 " style="padding: 0px;">
                        <thead>
                            <tr>
                                <th>الكود</th>
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
                                <td>{{$donor->id}}</td>
                                <td>{{$donor->name}}</td>
                                <td>{{$donor->donorBank->name}}</td>
                                <td>{{$donor->donor_account_number}}</td>
                                <td>{{ $donor->establishmentBankAccount->bank->name }} - {{number_format($donor->establishmentBankAccount->account_number,0,'','')}}</td>
                                <td>{{$donor->email}}</td>
                                <td>{{$donor->mobile}}</td>
                                <td>{{$donor->amount_of_withdrawal}} ر.س</td>
                                <td>{{ $donor->day_of_withdraw }}</td>
                                <td>{{ $donor->withdraw_start_date }}</td>
                                <td>{{ $donor->withdraw_end_date }}</td>
                                @permission(['update-donor', 'delete-donor'])
                                <td style="max-width: 100px">
                                    @permission('update-donor')
                                    <a href='{{ route('donors.edit', $donor->id) }}'  data-toggle="tooltip" data-placement="bottom" title="تعديل">
                                        <span class="far fa-edit"></span>
                                    </a>
                                    @endpermission
                                    @permission('delete-donor')
                                    <a href="#" onclick="
                                            $('.alert-layer').fadeIn();
                                            $('#remove-target').attr('action','{{ route('donors.destroy', $donor->id) }}');
                                          "  data-toggle="tooltip" data-placement="bottom" title="حذف">
                                        <span class="far fa-trash-alt"></span>
                                    </a>
                                    @endpermission
                                    @permission('update-donor')
                                    @if($donor['withdraw'])
                                        <a href="{{ route('donors.editStop', $donor->id) }}" data-toggle="tooltip" data-placement="bottom" title="إيقاف">
                                            <span class="far fa-times"></span>
                                        </a>
                                    @else
                                        <form action="{{ route('donors.active', $donor->id) }}" id="{{ "form" . $donor->id }}" method="post" style="display: inline">
                                            @csrf
                                        </form>
                                        <a href="#" onclick="
                                                    $('{{ "#form" . $donor->id }}').submit()
                                                                "data-toggle="tooltip" data-placement="bottom" title="تفعيل">
                                            <span class="far fa-check-circle"></span>
                                        </a>
                                    @endif
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

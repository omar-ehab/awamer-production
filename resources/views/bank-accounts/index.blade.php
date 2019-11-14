@extends('const.const')
@section('content')
<div class="col-12  row" style="padding: 8px;margin-top: 55px">
    <div class="panel panel-default   col-12 ">
      <div class="panel-heading  col-12" style="padding: 0px; ">
            <div class="panel-body col-12 row " style=" background: #2381c6;color: #fff;padding:  20px 5px; ">
                <div class="col-6 " style="padding: 4px">
                    <span class="fa fa-piggy-bank " style="color: var(--orange-light-color);margin-right: 10px;padding-left: 20px;font-size: 22px;"></span>  الحسابات البنكية
                </div>
                @permission('create-bankAccount')
                <div class="col-6  text-right" style="padding: 0px;display: unset;direction: ltr">
                    <button></button>
                    <a href="{{ route('bank-accounts.create') }}">
                         <button style="border:none;border-radius: 40px!important;padding: 10px 25px;background: var(--orange-color);display: inline-block;color: #fff;float: left;">إضافة</button>
                    </a>
                </div>
                @endpermission
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
                                            <th>اسم البنك</th>
                                            <th>رقم الحساب</th>
                                            <th>الآي بان</th>
                                            <th>وصف</th>
                                            @permission(['update-bankAccount', 'delete-bankAccount'])
                                            <th>عملية</th>
                                            @endpermission
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($bankAccounts as $bankAccount)
                                        <tr>
                                            <td>{{$bankAccount->id}}</td>
                                            <td>{{$bankAccount->bank->name}}</td>
                                            <td>{{number_format($bankAccount->account_number, 0, '', '')}}</td>
                                            <td>{{$bankAccount->iban}}</td>
                                            <td>{{$bankAccount->description}}</td>
                                            @permission(['update-bankAccount', 'delete-bankAccount'])
                                            <td style="max-width: 100px">
                                                @permission('update-bankAccount')
                                                <a href='{{ route('bank-accounts.edit', $bankAccount->id) }}'  data-toggle="tooltip" data-placement="bottom" title="تعديل">
                                                    <span class="far fa-edit"></span>
                                                </a>
                                                @endpermission
                                                @permission('delete-bankAccount')
                                                <a href="#" onclick="
                                                        $('.alert-layer').fadeIn();
                                                        $('#remove-target').attr('action','{{ route('bank-accounts.destroy', $bankAccount->id) }}');
                                                      "  data-toggle="tooltip" data-placement="bottom" title="حذف">
                                                    <span class="far fa-trash-alt"></span>
                                                </a>
                                                @endpermission
                                            </td>
                                            @endpermission
                                        </tr>
                                        @endforeach
                                    </tbody>

                                </table>

                                <div class="col-12 ">  </div>
                            </div>
            </div>


        </div>
</div>
@endsection

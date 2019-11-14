@extends('const.const')
@section('content')
    <div class="col-12  row" style="padding: 8px;margin-top: 55px">
        <div class="panel panel-default   col-12 ">
            <div class="panel-heading  col-12" style="padding: 0px; ">
                <div class="panel-body col-12 row " style=" background: #2381c6;color: #fff;padding:  20px 5px; ">
                    <div class="col-6 " style="padding: 4px">
                        <span class="fa fa-users" style="color: var(--orange-light-color);margin-right: 10px;padding-left: 20px;font-size: 22px;"></span>  الأدمن
                    </div>
                    @permission('create-admin')
                    <div class="col-6  text-right" style="padding: 0px;display: unset;direction: ltr">
                        <button></button>
                        <a href="{{ route('admins.create') }}">
                            <button style="border:none;border-radius: 40px!important;padding: 10px 25px;background: var(--orange-color);display: inline-block;color: #fff;float: left;">إضافة</button>
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
                            <th>البريد الالكتروني</th>
                            @permission(['update-admin', 'delete-admin'])
                            <th>عملية</th>
                            @endpermission
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($admins as $admin)
                            <tr>
                                <td>{{$admin->id}}</td>
                                <td>{{$admin->name}}</td>
                                <td>{{$admin->email}}</td>
                                @permission(['update-admin', 'delete-admin'])
                                <td style="max-width: 100px">
                                    @permission('update-admin')
                                    <a href='{{ route('admins.edit', $admin->id) }}'  data-toggle="tooltip" data-placement="bottom" title="تعديل">
                                        <span class="far fa-edit"></span>
                                    </a>
                                    @endpermission
                                    @permission('delete-admin')
                                    <a href="#" onclick="
                                        $('.alert-layer').fadeIn();
                                        $('#remove-target').attr('action','{{ route('admins.destroy', $admin->id) }}');
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
                    <div class="col-12 "></div>
                </div>
            </div>

        </div>
    </div>
@endsection

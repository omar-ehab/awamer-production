@extends('const.const')
@section('content')
<div class="col-12  row" style="padding: 8px;margin-top: 55px">
    <div class="panel panel-default   col-12 ">
      <div class="panel-heading  col-12" style="padding: 0px; ">
            <div class="panel-body col-12 row " style=" background: #2381c6;color: #fff;padding:  20px 5px; ">
                <div class="col-6 " style="padding: 4px">
                    <span class="fa fa-suitcase" style="color: var(--orange-light-color);margin-right: 10px;padding-left: 20px;font-size: 22px;"></span>  الجهات
                </div>
                @permission('create-establishment')
                <div class="col-6  text-right" style="padding: 0px;display: unset;direction: ltr">
                    <button></button>
                    <a href="{{ route('establishments.create') }}">
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
                                            <th>الأسم</th>
                                            <th>نوع المؤسسة</th>
                                            <th>منطقة إدارية</th>
                                            <th>اسم الممثل</th>
                                            <th>البريد الالكتروني</th>
                                            <th>نوع التحصيل</th>
                                            <th>القيمة المحصلة في الشهر</th>
                                            @role(['super_admin', 'admin'])
                                                <th>الرسائل (SMS)</th>
                                            @endrole
                                            @permission(['update-establishment', 'delete-establishment'])
                                            <th>عملية</th>
                                            @endpermission
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($establishments as $establishment)
                                        <tr>
                                            <td>{{$establishment->id}}</td>
                                            <td>{{$establishment->name}}</td>
                                            <td>{{$establishment->establishmentType->name}}</td>
                                            <td>{{$establishment->administrativeArea->name}}</td>
                                            <td>{{$establishment->representative_name}}</td>
                                            <td>{{$establishment->user->email}}</td>
                                            <td>{{ $establishment->contract->percentage ? "نسبة مئوية" : "نسبة ثابتة" }}</td>
                                            <td>{{ $establishment->contract->value}} {{ $establishment->contract->percentage ? "%" : "ر.س" }} </td>
                                            @role(['super_admin', 'admin'])
                                                <td>
                                                    @if($establishment->send_sms)
                                                        <form action="{{ route('deactivateSms', $establishment->id) }}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger">إيقاف الرسائل</button>
                                                        </form>
                                                    @else
                                                        <form action="{{ route('activeSms', $establishment->id) }}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="btn btn-primary">تفعيل الرسائل</button>
                                                        </form>
                                                    @endif
                                                </td>
                                            @endrole
                                            @permission(['update-establishment', 'delete-establishment'])
                                            <td style="max-width: 100px">
                                                @permission('update-establishment')
                                                <a href='{{ route('establishments.edit', $establishment->id) }}'  data-toggle="tooltip" data-placement="bottom" title="تعديل">
                                                    <span class="far fa-edit"></span>
                                                </a>
                                                @endpermission
                                                @permission('delete-establishment')
                                                <a href="#" onclick="
                                                        $('.alert-layer').fadeIn();
                                                        $('#remove-target').attr('action','{{ route('establishments.destroy', $establishment->id) }}');
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

                                <div class="col-12 ">

                                </div>
                            </div>
            </div>


        </div>
</div>
@endsection

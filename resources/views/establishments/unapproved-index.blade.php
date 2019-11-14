@extends('const.const')
@section('content')
    <div class="col-12  row" style="padding: 8px;margin-top: 55px">
        <div class="panel panel-default   col-12 ">
            <div class="panel-heading  col-12" style="padding: 0px; ">
                <div class="panel-body col-12 row " style=" background: #2381c6;color: #fff;padding:  20px 5px; ">
                    <div class="col-6 " style="padding: 4px">
                        <span class="fa fa-suitcase" style="color: var(--orange-light-color);margin-right: 10px;padding-left: 20px;font-size: 22px;"></span> الجهات التي لم يتم الموافقة عليها
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
                            <th>الأسم</th>
                            <th>نوع المؤسسة</th>
                            <th>منطقة إدارية</th>
                            <th>اسم الممثل</th>
                            <th>الجوال</th>
                            <th>البريد الالكتروني</th>
                            <th>نوع الحساب</th>
                            <th>القيمة</th>
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
                                <td>{{$establishment->mobile}}</td>
                                <td>{{$establishment->user->email}}</td>
                                @permission(['update-establishment'])
                                <form action="{{ route('approve-establishment') }}" method="post">
                                    @csrf
                                    @method('post')
                                    <input type="hidden" name="establishment_id" value="{{ $establishment->id }}">
                                    <td>
                                        <select name="percentage" id="" class="w-100">
                                            <option value="true">نسبة مئوية</option>
                                            <option value="false">نسبة ثابتة</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" name="value" class="w-75">
                                    </td>
                                    <td style="max-width: 100px">
                                            <a href="#"><button class="btn btn-success">موافقه</button></a>
                                    </td>
                                </form>
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

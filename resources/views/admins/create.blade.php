@extends('const.const')
@section('content')
    <div class="col-xs-12" style="padding: 8px;width: 100%">


        <div class="panel panel-default">
            <div class="panel-heading" style="padding: 0px;">
                <div class="panel-body animated fadeInDown" style=" background: #2381c6;color: #fff;padding: 5px;">
                    <div class="col-xs-6" style="padding: 4px">
                        إضافة أدمن
                    </div>
                    <div class="col-xs-6 text-left" style="padding: 0px;display: unset;float: left;">
                        <button class="btn btn-danger  " style="padding: 3px 10px ;border-radius: 0px ;background:  #ff0b6c;border:1px solid red;margin: 0px 3px;"> <span class="fa fa-times"></span></button>
                        <button class="btn btn-success  " style="padding: 3px 8px ;border-radius: 0px;background: transparent;border:1px solid #39fbed;margin: 0px 2px;" onclick="$('#submit').submit();">حفظ <span class="fa fa-check"></span></button>
                    </div>

                </div>
            </div>
            <div class="panel-body" style="padding: 0px;">


                <form action="{{ route('admins.store') }}" method="POST" id="submit">
                    {{csrf_field()}}
                    <div class="col-xs-12 " style="background: #fff;padding: 0px 5px; ">
                        <div class="panel panel-primary" style="padding: 0px;   border:none;">

                            <div class="panel-body  row  " style="padding: 20px;background: #fff;margin: 0px;overflow: hidden; ">

{{--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}}
{{--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}}
                                <div class="col-xs-12 per-calss" style="position: absolute;left: -450px;top: 0px;height: 800px;width: 450px;background: #fff;z-index: 123;border:1px solid #eee;margin-top: 85px" >
                                    <div style="position: absolute;width: 40px;height: 40px;background: #07a2be;right: -40px;border:1px solid #eee;cursor: pointer;" class="text-center" onclick="$('.per-calss').toggleClass('per-calss-left');">
                                        <span class="fa fa-key" style="font-size: 18px;color: #fff;padding-top: 10px;"></span>
                                        {{-- <img src="/system_images/key.svg" style="margin-top: 10px; display: inline-block;width: 25px;"> --}}
                                    </div>
                                    <div class="col-xs-12 text-center" style="padding: 10px;">
                                        <h6>الصلاحيات</h6>
                                        <hr style="margin-top: 0px;">
                                    </div>


                                    <div class="col-xs-12" style="padding: 2px 0px 2px;border-bottom: 1px solid #eee">
                                        <div class="col-xs-3 text-left">

                                        </div>
                                        <div class="col-xs-9" style="display:flex;justify-content: space-evenly;">
                                            <div class="col-xs-3 text-center">
                                                عرض
                                            </div>
                                            <div class="col-xs-3 text-center">
                                                اضافة
                                            </div>
                                            <div class="col-xs-3 text-center">
                                                تعديل
                                            </div>
                                            <div class="col-xs-3  text-center">
                                                حذف
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-xs-12" style="padding: 2px 0px 2px;border-bottom: 1px solid #eee">
                                        <div class="col-xs-3 text-left">
                                            أدمن
                                        </div>
                                        <div class="col-xs-9" style="display:flex;justify-content: space-evenly;">
                                            <div class="col-xs-3">
                                                <input type="checkbox" name="permissions[]" value="read-admin" >
                                            </div>
                                            <div class="col-xs-3">
                                                <input type="checkbox" name="permissions[]" value="create-admin" >
                                            </div>
                                            <div class="col-xs-3">
                                                <input type="checkbox" disabled>
                                            </div>
                                            <div class="col-xs-3">
                                                <input type="checkbox" disabled>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-xs-12" style="padding: 2px 0px 2px;border-bottom: 1px solid #eee">
                                        <div class="col-xs-3 text-left">
                                            المناطق الأدارية
                                        </div>
                                        <div class="col-xs-9" style="display:flex;justify-content: space-evenly;">
                                            <div class="col-xs-3">
                                                <input type="checkbox" name="permissions[]" value="read-administrativeArea" >
                                            </div>
                                            <div class="col-xs-3">
                                                <input type="checkbox" name="permissions[]" value="create-administrativeArea" >
                                            </div>
                                            <div class="col-xs-3">
                                                <input type="checkbox" name="permissions[]" value="update-administrativeArea" >
                                            </div>
                                            <div class="col-xs-3">
                                                <input type="checkbox" name="permissions[]" value="delete-administrativeArea" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12" style="padding: 2px 0px 2px;border-bottom: 1px solid #eee">
                                        <div class="col-xs-3 text-left">
                                            البنوك
                                        </div>
                                        <div class="col-xs-9" style="display:flex;justify-content: space-evenly;">
                                            <div class="col-xs-3">
                                                <input type="checkbox" name="permissions[]" value="read-bank" >
                                            </div>
                                            <div class="col-xs-3">
                                                <input type="checkbox" name="permissions[]" value="create-bank" >
                                            </div>
                                            <div class="col-xs-3">
                                                <input type="checkbox" name="permissions[]" value="update-bank" >
                                            </div>
                                            <div class="col-xs-3">
                                                <input type="checkbox" name="permissions[]" value="delete-bank" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12" style="padding: 2px 0px 2px;border-bottom: 1px solid #eee">
                                        <div class="col-xs-3 text-left">
                                            الحسابات البنكية
                                        </div>
                                        <div class="col-xs-9" style="display:flex;justify-content: space-evenly;">
                                            <div class="col-xs-3">
                                                <input type="checkbox" name="permissions[]" value="read-bankAccount" >
                                            </div>
                                            <div class="col-xs-3">
                                                <input type="checkbox" name="permissions[]" value="create-bankAccount" >
                                            </div>
                                            <div class="col-xs-3">
                                                <input type="checkbox" name="permissions[]" value="update-bankAccount" >
                                            </div>
                                            <div class="col-xs-3">
                                                <input type="checkbox" name="permissions[]" value="delete-bankAccount" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12" style="padding: 2px 0px 2px;border-bottom: 1px solid #eee">
                                        <div class="col-xs-3 text-left">
                                             العقود
                                        </div>
                                        <div class="col-xs-9" style="display:flex;justify-content: space-evenly;">
                                            <div class="col-xs-3">
                                                <input type="checkbox" name="permissions[]" value="read-contract" >
                                            </div>
                                            <div class="col-xs-3">
                                                <input type="checkbox" disabled>
                                            </div>
                                            <div class="col-xs-3">
                                                <input type="checkbox" disabled>
                                            </div>
                                            <div class="col-xs-3">
                                                <input type="checkbox" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12" style="padding: 2px 0px 2px;border-bottom: 1px solid #eee">
                                        <div class="col-xs-3 text-left">
                                            بنود العقد
                                        </div>
                                        <div class="col-xs-9" style="display:flex;justify-content: space-evenly;">
                                            <div class="col-xs-3">
                                                <input type="checkbox" name="permissions[]" value="read-contractTerm" >
                                            </div>
                                            <div class="col-xs-3">
                                                <input type="checkbox" name="permissions[]" value="create-contractTerm" >
                                            </div>
                                            <div class="col-xs-3">
                                                <input type="checkbox" name="permissions[]" value="update-contractTerm" >
                                            </div>
                                            <div class="col-xs-3">
                                                <input type="checkbox" name="permissions[]" value="delete-contractTerm" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12" style="padding: 2px 0px 2px;border-bottom: 1px solid #eee">
                                        <div class="col-xs-3 text-left">
                                            الجهات
                                        </div>
                                        <div class="col-xs-9" style="display:flex;justify-content: space-evenly;">
                                            <div class="col-xs-3">
                                                <input type="checkbox" name="permissions[]" value="read-establishment" >
                                            </div>
                                            <div class="col-xs-3">
                                                <input type="checkbox" name="permissions[]" value="create-establishment" >
                                            </div>
                                            <div class="col-xs-3">
                                                <input type="checkbox" name="permissions[]" value="update-establishment" >
                                            </div>
                                            <div class="col-xs-3">
                                                <input type="checkbox" name="permissions[]" value="delete-establishment" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12" style="padding: 2px 0px 2px;border-bottom: 1px solid #eee">
                                        <div class="col-xs-3 text-left">
                                            انواع الجهات
                                        </div>
                                        <div class="col-xs-9" style="display:flex;justify-content: space-evenly;">
                                            <div class="col-xs-3">
                                                <input type="checkbox" name="permissions[]" value="read-establishmentType" >
                                            </div>
                                            <div class="col-xs-3">
                                                <input type="checkbox" name="permissions[]" value="create-establishmentType" >
                                            </div>
                                            <div class="col-xs-3">
                                                <input type="checkbox" name="permissions[]" value="update-establishmentType" >
                                            </div>
                                            <div class="col-xs-3">
                                                <input type="checkbox" name="permissions[]" value="delete-establishmentType" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12" style="padding: 2px 0px 2px;border-bottom: 1px solid #eee">
                                        <div class="col-xs-3 text-left">
                                            الفترات
                                        </div>
                                        <div class="col-xs-9" style="display:flex;justify-content: space-evenly;">
                                            <div class="col-xs-3">
                                                <input type="checkbox" name="permissions[]" value="read-interval" >
                                            </div>
                                            <div class="col-xs-3">
                                                <input type="checkbox" name="permissions[]" value="create-interval" >
                                            </div>
                                            <div class="col-xs-3">
                                                <input type="checkbox" name="permissions[]" value="update-interval" >
                                            </div>
                                            <div class="col-xs-3">
                                                <input type="checkbox" name="permissions[]" value="delete-interval" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12" style="padding: 2px 0px 2px;border-bottom: 1px solid #eee">
                                        <div class="col-xs-3 text-left">
                                            مقدمين خدمة sms
                                        </div>
                                        <div class="col-xs-9" style="display:flex;justify-content: space-evenly;">
                                            <div class="col-xs-3">
                                                <input type="checkbox" name="permissions[]" value="read-smsProvider" >
                                            </div>
                                            <div class="col-xs-3">
                                                <input type="checkbox" name="permissions[]" value="create-smsProvider" >
                                            </div>
                                            <div class="col-xs-3">
                                                <input type="checkbox" name="permissions[]" value="update-smsProvider" >
                                            </div>
                                            <div class="col-xs-3">
                                                <input type="checkbox" name="permissions[]" value="delete-smsProvider" >
                                            </div>
                                        </div>
                                    </div>
                                </div>

{{--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}}
{{--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}}
                                <div class="col-xs-12 col-sm-6  " style="border:none">

                                    <div class="col-xs-12 col-md-10" style="padding: 20px 5px;">


                                        <div class="col-xs-12" style="padding: 6px;">
                                            <div class="col-xs-3 text-left" style="padding: 5px 0px; font-size: 13px;">
                                                الاسم
                                            </div>
                                            <div class="col-xs-9">
                                                <input type="text" name="name" class="form-control"  value="{{old('name')}}" >
                                            </div>
                                        </div>

                                        <div class="col-xs-12" style="padding: 6px;">
                                            <div class="col-xs-3 text-left" style="padding: 5px 0px; font-size: 13px;">
                                                البريد الالكتروني
                                            </div>
                                            <div class="col-xs-9">
                                                <input type="email" name="email" class="form-control"  value="{{old('email')}}" >
                                            </div>
                                        </div>



                                        <div class="col-xs-12" style="padding: 6px;">
                                            <div class="col-xs-3 text-left" style="padding: 5px 0px; font-size: 13px;">
                                                كلمة السر
                                            </div>
                                            <div class="col-xs-9">
                                                <input type="password" name="password" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-xs-12" style="padding: 6px;">
                                            <div class="col-xs-3 text-left" style="padding: 5px 0px; font-size: 13px;">
                                                تأكيد كلمة السر
                                            </div>
                                            <div class="col-xs-9">
                                                <input type="password" name="c_password" class="form-control">
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- /.content -->
                </form>

            </div>
        </div>

    </div>


@endsection

@extends('layouts.register')

@section('content')
    <nav class="navbar navbar-dark bg-dark mb-5 d-flex justify-content-center align-items-center flex-column">
        <a class="navbar-brand" href="#">نظام أوامر لإدارة الأوامر المستديمة</a>
    </nav>
    <div class="container">
        <?php if(isset($errors))$count=count($errors->all()); ?>
        @if(session()->has('data') || $count  )
            @if(session()->has('data'))
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-{{  session('data')['alert-type'] }} w-100 text-right" role="alert">
                                {{  session('data')['alert'] }}
                            </div>
                        </div>
                    </div>
            @endif
            @if($count)
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-danger w-100 text-right" role="alert">
                        <ul>
                            @foreach ($errors->all() as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            @endif
        @endif

        <div class="row mb-4">
            <div class="col-12">
                <form action="{{ route('establishmentRegister') }}" method="post" class="w-100" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="row">
                    <div class="col-xs-12 col-md-5 offset-md-2">
                        <div class="form-group text-right">
                            <label for="name">إسم الجهة<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                        </div>
                        <div class="form-group text-right">
                            <label for="establishment_type_id">نوع الجهة<span class="text-danger">*</span></label>
                            <select name="establishment_type_id" id="establishment_type_id" class="form-control">
                                @foreach($establishmentTypes as $establishmentType)
                                    <option value="{{$establishmentType->id}}">{{$establishmentType->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group text-right">
                            <label for="administrative_area_id">المنطقة الأدارية<span class="text-danger">*</span></label>
                            <select name="administrative_area_id" id="administrative_area_id" class="form-control">
                                @foreach($administrativeAreas as $administrativeArea)
                                    <option value="{{$administrativeArea->id}}">{{$administrativeArea->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group text-right">
                            <label for="representative_name">اسم المسؤل<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="representative_name" id="representative_name" value="{{ old('representative_name') }}">
                        </div>
                        <div class="form-group text-right">
                            <label for="mobile">الجوال<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="mobile" id="mobile" value="{{ old('mobile') }}">
                        </div>
                        <div class="form-group text-right">
                            <label for="phone">الهاتف</label>
                            <input type="text" class="form-control" name="phone" id="phone" value="{{ old('phone') }}">
                        </div>
                        <div class="form-group text-right">
                            <label for="address">العنوان<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="address" id="address" value="{{ old('address') }}">
                        </div>
                        <div class="form-group text-right">
                            <label for="logo">الشعار</label>
                            <input type="file" class="form-control" name="logo" id="logo">
                        </div>
                        <div class="form-group text-right">
                            <label for="kalesha">الكليشة</label>
                            <textarea name="kalesha" id="kalesha" class="form-control">{{ old('kalesha') }}</textarea>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-5">
                        <div class="form-group text-right">
                            <label for="email">البريد الإلكتروني<span class="text-danger">*</span></label>
                            <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">
                        </div>
                        <div class="form-group text-right">
                            <label for="username">اسم المستخدم<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="username" id="username" value="{{ old('username') }}">
                        </div>
                        <div class="form-group text-right">
                            <label for="password">كلمة المرور<span class="text-danger">*</span></label>
                            <input type="password" class="form-control" name="password" id="password">
                        </div>
                        <div class="form-group text-right">
                            <label for="c_password">تأكيد كلمة المرور<span class="text-danger">*</span></label>
                            <input type="password" class="form-control" name="c_password" id="c_password">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 w-100 d-flex justify-content-start">
                        <div class="form-group">
                            <input type="checkbox" id="accept" name="accept">
                            <label for="accept">اوافق علي <a href="#" id="policy">الشروط والأحكام</a></label>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <button type="submit" class="btn btn-success w-25">تسجيل</button>
                </div>
            </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        let policy = document.getElementById('policy');
        policy.onclick = function(event) {
            event.preventDefault();
            window.open('http://68.183.221.226/privacy-policy', 'Privacy & Policy', "height=600,width=600");
        };
    </script>
@endpush

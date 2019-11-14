@extends('layouts.auth')

@section('content')
    <div class="limiter">
        <div class="container-login100">
            <div class="login100-more" style="background-image: url({{ asset('images/bg-01.jpg') }});"></div>

            <div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50" dir="rtl">
                <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <span class="login100-form-title p-b-59">
						 تسجيل دخول
					</span>
                    <div class="input-container">
                        <div class="wrap-input100 validate-input" data-validate = "برجاء ادخال بريد الأكتروني صحيح: example@gmail.com">
                            <span class="label-input100">البريد الألكتروني</span>
                            <input class="input100" type="text" name="email" value="{{ old('email') }}" required autofocus placeholder="البريد الألكتروني ...">
                            <span class="focus-input100"></span>
                        </div>
                        @if ($errors->has('email'))
                            <p class="server-error">
                                {{ $errors->first('email') }}
                            </p>
                        @endif
                    </div>

                    <div class="input-container">
                        <div class="wrap-input100 validate-input" data-validate = "برجاء ادخال كلمة مرور">
                            <span class="label-input100">كلمة المرور</span>
                            <input class="input100" type="password" name="password" required placeholder="*************">
                            <span class="focus-input100"></span>
                        </div>
                        @if ($errors->has('password'))
                            <p class="server-error">
                                {{ $errors->first('password') }}
                            </p>
                        @endif
                    </div>

                    <div class="flex-m w-full p-b-33">
                        <div class="contact100-form-checkbox">
                            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="label-checkbox100" for="ckb1">
								<span class="txt1">
									تذكرني
								</span>
                            </label>
                        </div>
                    </div>
                    <div class="w-full mb-4">
                        <a href="{{ route('password.request') }}" class="txt2 hov1">
                            نسيت كلمه المرور؟
                        </a>
                    </div>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn login-btn">
                                دخول
                            </button>
                        </div>
                    </div>
                </form>

                <div class="container-login100-form-btn mt-3">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <a href="{{ route('register') }}">
                            <button class="login100-form-btn login-btn">
                                تسجيل كجهة جديده
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

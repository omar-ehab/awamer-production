@extends('layouts.auth')

@section('content')
    <div class="limiter">
        <div class="container-login100">
            <div class="login100-more" style="background-image: url({{ asset('images/bg-01.jpg') }});"></div>

            <div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50" dir="rtl">
                <form class="login100-form validate-form" method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <span class="login100-form-title p-b-59">
						 استعادة كلمة المرور
					</span>
                    <div class="input-container">
                        <div class="wrap-input100 validate-input" data-validate = "برجاء ادخال بريد الأكتروني صحيح: example@gmail.com">
                            <span class="label-input100">البريد الألكتروني</span>
                            <input class="input100" type="text" name="email" value="{{ old('email') }}" autofocus placeholder="البريد الألكتروني ...">
                            <span class="focus-input100"></span>
                        </div>
                        @error('email')

                            <p class="server-error">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn login-btn">
                                إرسال رابط إعادة تعيين كلمة المرور
                            </button>
                        </div>
                    </div>
                </form>
                @if (session('status'))
                    <div class="">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

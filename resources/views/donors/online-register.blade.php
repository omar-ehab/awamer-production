@extends('layouts.register')

@section('content')
    <nav class="navbar navbar-dark bg-dark mb-5 d-flex justify-content-center align-items-center flex-column">
        <a class="navbar-brand" href="#">منصة إدارة المستقطعات</a>
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
        <div class="row">
            <div class="col-12">
                <div class="text-right mb-2">
                    <h2>تسجيل كمتبرع في الجهه: {{ $establishment->name }}</h2>
                </div>
            </div>
        </div>
        <hr>
        <div class="row mb-4 mt-4">
            <div class="col-12">
                <form action="{{ route('donors.establishment.store', $encrypted_establishment_id) }}" method="post" class="w-100" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="row">
                    <div class="col-xs-12 col-md-5 offset-md-2">
                        <div class="form-group text-right">
                            <label for="name">الأسم<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" autofocus>
                        </div>
                        <div class="form-group text-right">
                            <label for="donor_account_number">رقم حساب المتبرع<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="donor_account_number" id="donor_account_number" value="{{ old('donor_account_number') }}">
                        </div>
                        <div class="form-group text-right">
                            <label for="iban">اﻵي بان<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="iban" id="iban" value="{{ old('iban') }}">
                        </div>
                        <div class="form-group text-right">
                            <label for="donor_bank">بنك المتبرع<span class="text-danger">*</span></label>
                            <select name="donor_bank" id="donor_bank" class="form-control">
                                @foreach($banks as $bank)
                                    <option value="{{$bank->id}}">{{$bank->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group text-right">
                            <label for="bank_account">الحساب المتبرع عليه<span class="text-danger">*</span></label>
                            <select name="bank_account" id="bank_account" class="form-control">
                                @foreach($bankAccounts as $bankAccount)
                                    <option value="{{$bankAccount->id}}">{{$bankAccount->bank->name}} - {{number_format($bankAccount->account_number,0,'','')}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group text-right">
                            <label for="administrative_area_id">الفرع<span class="text-danger">*</span></label>
                            <select name="administrative_area_id" id="administrative_area_id" class="form-control">
                            <option>الفرع الرئيسي</option>
                                @foreach($branches as $branch)
                                    <option value="{{$branch->id}}">{{$branch->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group text-right">
                            <label for="amount_of_withdrawal">مبلغ الاستقطاع<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="amount_of_withdrawal" id="amount_of_withdrawal" value="{{ old('amount_of_withdrawal') }}">
                        </div>
                        <div class="form-group text-right">
                            <label for="day_of_withdraw">يوم الاستقطاع<span class="text-danger">*</span></label>
                            <input type="number" min="1" max="31" class="form-control" name="day_of_withdraw" id="day_of_withdraw" value="{{ old('day_of_withdraw') }}">
                        </div>
                        <div class="form-group text-right">
                            <label for="email">البريد الإلكتروني<span class="text-danger">*</span></label>
                            <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">
                        </div>
                        <div class="form-group text-right">
                            <label for="mobile">الجوال<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="mobile" id="mobile" value="{{ old('mobile') }}">
                        </div>
                        <div class="form-group text-right">
                            <label for="phone">الهاتف</label>
                            <input type="text" class="form-control" name="phone" id="phone" value="{{ old('phone') }}">
                        </div>

                    </div>
                    <div class="col-xs-12 col-md-5">
                        <div class="form-group text-right">
                            <label for="repeats_in_month">عدد التكرار في الشهر<span class="text-danger">*</span></label>
                            <input type="number" name="repeats_in_month" min="1" id="repeats_in_month" class="form-control" value="{{old('repeats_in_month')}}" >
                        </div>
                        <div class="form-group text-right">
                            <label for="withdraw_start_date">تاريخ بداية الخصم<span class="text-danger">*</span></label>
                            <input type="date" name="withdraw_start_date" id="withdraw_start_date" class="form-control" value="{{old('withdraw_start_date')}}" >
                        </div>
                        <div class="form-group text-right">
                            <label for="withdraw_end_date">تاريخ نهاية الخصم<span class="text-danger">*</span></label>
                            <input type="date" name="withdraw_end_date" id="withdraw_end_date" class="form-control" value="{{old('withdraw_end_date')}}" >
                        </div>
                        <div class="form-group text-right">
                            <label for="withdraw_description">الغرض من الاستقطاع</label>
                            <textarea  name="withdraw_description" id="withdraw_description" class="form-control" rows="7">{{old('withdraw_description')}}</textarea>
                        </div>
                        <div class="text-right">
                            <label for="success_sms">إرسال رساله sms بأن العملية ناجحه</label>
                            <input type="checkbox" name="success_sms" class="form-check-input" id="success_sms"  checked="" >
                        </div>
                        <div class="text-right">
                            <label for="faild_sms">إرسال رسالة sms بفشل العملية</label>
                            <input type="checkbox" name="failed_sms" class="form-check-input" id="faild_sms"  checked="" >
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

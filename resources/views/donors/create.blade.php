@extends('const.const')
@section('content')
<div class="col-sm-12  row" style="padding: 8px;margin-top: 55px">
    <div class="panel panel-default col-sm-12  ">




      <div class="panel-heading col-sm-12 row" style="padding: 0px;background: red;">
            <div class="panel-body col-sm-12 row" style=" background: #2381c6;color: #fff;padding:  20px 5px; ">

                <div class="col-sm-6 " style="padding: 4px">
                    <span class="fa fa-user" style="color: var(--orange-light-color);margin-right: 10px;padding-left: 20px;font-size: 22px;"></span>  متبرع
                </div>
                <div class="col-sm-6  text-right" style="padding: 0px;display: unset;">
                    <button></button>
                    <button class="btn btn-success  " style="padding: 3px 8px ;border-radius: 0px;background: transparent;border:1px solid #39fbed;margin: 0px 2px;"  onclick="$('#submit').submit();">حفظ <span class="fa fa-check"></span></button>
                </div>

            </div>
        </div>


        <div class="panel-body col-12 row" style="padding: 0px;">

              <div class="col-sm-12 " style=" padding: 0px 5px; ">
                <form action="{{ route('donors.store') }}" method="POST" id="submit">
                   @csrf

                  <div class="panel panel-primary" style="padding: 0px;   border:none;">
                      <div class="panel-body  row  " style="padding: 20px;background: #fff;margin: 0px; ">
                          <div class="col-sm-12 col-md-6  " style="border:none">

                              <div class="col-sm-12 col-lg-10" style="padding: 20px 5px;padding-top: 60px">

                                  <div class="col-sm-12 row" style="padding: 6px;">
                                      <div class="col-sm-3 text-left" style="padding: 5px 0px; font-size: 13px;">
                                          الاسم
                                      </div>
                                      <div class="col-sm-9">
                                          <input type="text" name="name" class="form-control" value="{{old('name')}}" autofocus="">
                                      </div>
                                  </div>

                                  <div class="col-sm-12 row" style="padding: 6px;">
                                      <div class="col-sm-3 text-left" style="padding: 5px 0px; font-size: 13px;">
                                          بنك المتبرع
                                      </div>
                                      <div class="col-sm-9">
                                        <select  name="donor_bank" class="form-control"  >
                                          @foreach($banks as $bank)
                                          <option value="{{$bank->id}}">{{$bank->name}}</option>
                                          @endforeach
                                        </select>
                                      </div>

                                  </div>

                                  <div class="col-sm-12 row" style="padding: 6px;">
                                      <div class="col-sm-3 text-left" style="padding: 5px 0px; font-size: 13px;">
                                          رقم حساب المتبرع
                                      </div>
                                      <div class="col-sm-9">
                                          <input type="text" name="donor_account_number" class="form-control" value="{{old('donor_account_number')}}" >
                                      </div>
                                  </div>

                                  <div class="col-sm-12 row" style="padding: 6px;">
                                      <div class="col-sm-3 text-left" style="padding: 5px 0px; font-size: 13px;">
                                          اﻵي بان
                                      </div>
                                      <div class="col-sm-9">
                                          <input type="text" name="iban" class="form-control" value="{{old('iban')}}" >
                                      </div>
                                  </div>

                                  <div class="col-sm-12 row" style="padding: 6px;">
                                      <div class="col-sm-3 text-left" style="padding: 5px 0px; font-size: 13px;">
                                          الفرع
                                      </div>
                                      <div class="col-sm-9">
                                          <select  name="branch_id" class="form-control"  >
                                              <option>الفرع الرئيسي</option>
                                              @foreach($branches as $branch)
                                                  <option value="{{$branch->id}}">{{$branch->name}}</option>
                                              @endforeach
                                          </select>
                                      </div>
                                  </div>


                                  <div class="col-sm-12 row" style="padding: 6px;">
                                      <div class="col-sm-3 text-left" style="padding: 5px 0px; font-size: 13px;">
                                          بنك ورقم الجهة
                                      </div>
                                      <div class="col-sm-9">
                                        <select  name="bank_account" class="form-control"  >
                                          @foreach($bankAccounts as $bankAccount)
                                            <option value="{{$bankAccount->id}}">{{$bankAccount->bank->name}} - {{number_format($bankAccount->account_number,0,'','')}}</option>
                                          @endforeach
                                        </select>
                                      </div>

                                  </div>


                                  <div class="col-sm-12 row" style="padding: 6px;">
                                      <div class="col-sm-3 text-left" style="padding: 5px 0px; font-size: 13px;">
                                          مبلغ الاستقطاع
                                      </div>
                                      <div class="col-sm-9">
                                          <input type="number" name="amount_of_withdrawal" min="1" class="form-control" value="{{old('amount_of_withdrawal')}}" >
                                      </div>
                                  </div>

                                  <div class="col-sm-12 row" style="padding: 6px;">
                                      <div class="col-sm-3 text-left" style="padding: 5px 0px; font-size: 13px;">
                                          يوم الأستقطاع
                                      </div>
                                      <div class="col-sm-9">
                                          <input type="number" name="day_of_withdraw" min="1" max="31" class="form-control" value="{{old('day_of_withdraw')}}" >
                                      </div>
                                  </div>


                                  <div class="col-sm-12 row" style="padding: 6px;">
                                      <div class="col-sm-3 text-left" style="padding: 5px 0px; font-size: 13px;">
                                        البريد الالكتروني
                                      </div>
                                      <div class="col-sm-9">
                                          <input type="email" name="email" class="form-control" value="{{old('email')}}" >
                                      </div>
                                  </div>

                                  <div class="col-sm-12 row" style="padding: 6px;">
                                      <div class="col-sm-3 text-left" style="padding: 5px 0px; font-size: 13px;">
                                          الجوال
                                      </div>
                                      <div class="col-sm-9">
                                          <input type="text" name="mobile" class="form-control" value="{{old('mobile')}}" >
                                      </div>
                                  </div>

                                  <div class="col-sm-12 row" style="padding: 6px;">
                                      <div class="col-sm-3 text-left" style="padding: 5px 0px; font-size: 13px;">
                                          الهاتف
                                      </div>
                                      <div class="col-sm-9">
                                          <input type="text" name="phone" class="form-control" value="{{old('phone')}}" >
                                      </div>
                                  </div>


                                  <div class="col-sm-12 row" style="padding: 6px;">
                                      <div class="col-sm-3 text-left" style="padding: 5px 0px; font-size: 13px;">
                                          عدد تكرار الخصم في الشهر
                                      </div>
                                      <div class="col-sm-9">
                                          <input type="number" name="repeats_in_month" min="1" class="form-control" value="{{old('repeats_in_month')}}" >
                                      </div>
                                  </div>


{{--                                  <div class="col-sm-12 row" style="padding: 6px;">--}}
{{--                                      <div class="col-sm-3 text-left" style="padding: 5px 0px; font-size: 13px;">--}}
{{--                                       خصم--}}
{{--                                      </div>--}}
{{--                                      <div class="col-sm-9">--}}
{{--                                          <input type="checkbox" name="withdraw" class="form-control"  checked="" >--}}
{{--                                      </div>--}}
{{--                                  </div>--}}


                                  <div class="col-sm-12 row" style="padding: 6px;">
                                      <div class="col-sm-3 text-left" style="padding: 5px 0px; font-size: 13px;">
                                          تاريخ بداية الخصم
                                      </div>
                                      <div class="col-sm-9">
                                          <input type="text" name="withdraw_start_date" class="form-control dp-peter"  data-position="left top"  value="{{old('withdraw_start_date')}}" >
                                      </div>
                                  </div>
                                  <div class="col-sm-12 row" style="padding: 6px;">
                                      <div class="col-sm-3 text-left" style="padding: 5px 0px; font-size: 13px;">
                                        تاريخ نهاية الخصم
                                      </div>
                                      <div class="col-sm-9">
                                          <input type="text" name="withdraw_end_date" class="form-control dp-peter"  data-position="left top"  value="{{old('withdraw_end_date')}}" >
                                      </div>
                                  </div>


                                  <div class="col-sm-12 row" style="padding: 6px;">
                                      <div class="col-sm-3 text-left" style="padding: 5px 0px; font-size: 13px;">
                                          الغرض من الاستقطاع
                                      </div>
                                      <div class="col-sm-9">
                                          <textarea  name="withdraw_description" class="form-control"  >{{old('repeats_in_month')}}</textarea>
                                      </div>
                                  </div>


                                  <div class="col-sm-12 row" style="padding: 6px;">
                                      <div class="col-sm-3 text-left" style="padding: 5px 0px; font-size: 13px;">
                                          إرسال رساله sms بأن العملية ناجحه
                                      </div>
                                      <div class="col-sm-9">
                                          <input type="checkbox" name="success_sms" class="form-control"  checked="" >
                                      </div>
                                  </div>

                              </div>
                          </div>

                      </div>
                  </div>
                  </form>
              </div>
              <!-- /.content -->

        </div>
    </div>
</div>


@endsection

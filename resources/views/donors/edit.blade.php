@extends('const.const')
@section('content')
<div class="col-sm-12  row" style="padding: 8px;margin-top: 55px">
    <div class="panel panel-default col-sm-12  ">




      <div class="panel-heading col-sm-12 row" style="padding: 0;background: red;">
            <div class="panel-body col-sm-12 row" style=" background: #2381c6;color: #fff;padding:  20px 5px; ">

                <div class="col-sm-6 " style="padding: 4px">
                    <span class="fa fa-user" style="color: var(--orange-light-color);margin-right: 10px;padding-left: 20px;font-size: 22px;"></span>  متبرع
                </div>
                <div class="col-sm-6  text-right" style="padding: 0;display: unset;">
                    <button></button>
                    <button class="btn btn-success  " style="padding: 3px 8px ;border-radius: 0;background: transparent;border:1px solid #39fbed;margin: 0 2px;"  onclick="$('#submit').submit();">حفظ <span class="fa fa-check"></span></button>
                </div>

            </div>
        </div>


        <div class="panel-body col-12 row" style="padding: 0;">

              <div class="col-sm-12 " style=" padding: 0 5px; ">
                <form action="{{ route('donors.update', $donor['id']) }}" method="POST" id="submit">
                   @csrf
                   @method('PATCH')
                  <div class="panel panel-primary" style="padding: 0;   border:none;">
                      <div class="panel-body  row  " style="padding: 20px;background: #fff;margin: 0; ">
                          <div class="col-sm-12 col-md-6  " style="border:none">

                              <div class="col-sm-12 col-lg-10" style="padding: 60px 5px 20px;">

                                  <div class="col-sm-12 row" style="padding: 6px;">
                                      <div class="col-sm-3 text-left" style="padding: 5px 0; font-size: 13px;">
                                          الاسم
                                      </div>
                                      <div class="col-sm-9">
                                          <input type="text" name="name" class="form-control" value="{{$donor['name']}}">
                                      </div>
                                  </div>


                                  <div class="col-sm-12 row" style="padding: 6px;">
                                      <div class="col-sm-3 text-left" style="padding: 5px 0; font-size: 13px;">
                                          بنك المتبرع
                                      </div>
                                      <div class="col-sm-9">
                                        <select  name="donor_bank" class="form-control"  >
                                          @foreach($banks as $bank)
                                            <option value="{{$bank->id}}" @if($donor['donor_bank'] == $bank->id) selected="" @endif>{{$bank->name}}</option>
                                          @endforeach
                                        </select>
                                      </div>

                                  </div>

                                  <div class="col-sm-12 row" style="padding: 6px;">
                                      <div class="col-sm-3 text-left" style="padding: 5px 0; font-size: 13px;">
                                          رقم حساب المتبرع
                                      </div>
                                      <div class="col-sm-9">
                                          <input type="text" name="donor_account_number" class="form-control" value="{{$donor['donor_account_number']}}" >
                                      </div>
                                  </div>

                                  <div class="col-sm-12 row" style="padding: 6px;">
                                      <div class="col-sm-3 text-left" style="padding: 5px 0; font-size: 13px;">
                                          اﻵي بان
                                      </div>
                                      <div class="col-sm-9">
                                          <input type="text" name="iban" class="form-control" value="{{$donor['iban']}}" >
                                      </div>
                                  </div>

                                  <div class="col-sm-12 row" style="padding: 6px;">
                                      <div class="col-sm-3 text-left" style="padding: 5px 0; font-size: 13px;">
                                          الفرع
                                      </div>
                                      <div class="col-sm-9">
                                          <select  name="branch_id" class="form-control">
                                              <option {{ $donor->branch == null? "selected" : ""}}>الفرع الرئيسي</option>
                                              @foreach($branches as $branch)
                                                  <option value="{{$branch->id}}" {{ $donor->branch != null ? $branch->id == $donor->branch->id ? "selected" : "" : ""}}>{{$branch->name}}</option>
                                              @endforeach
                                          </select>
                                      </div>
                                  </div>


                                  <div class="col-sm-12 row" style="padding: 6px;">
                                      <div class="col-sm-3 text-left" style="padding: 5px 0; font-size: 13px;">
                                          بنك ورقم الجهة
                                      </div>
                                      <div class="col-sm-9">
                                        <select  name="bank_account" class="form-control"  >
                                          @foreach($bankAccounts as $bankAccount)
                                              <option value="{{$bankAccount->id}}" @if($donor['bank_account'] == $bankAccount->id) selected="" @endif >{{$bankAccount->bank->name}} - {{number_format($bankAccount->account_number,0,'','')}}</option>
                                          @endforeach
                                        </select>
                                      </div>

                                  </div>



                                  <div class="col-sm-12 row" style="padding: 6px;">
                                      <div class="col-sm-3 text-left" style="padding: 5px 0; font-size: 13px;">
                                          مبلغ الاستقطاع
                                      </div>
                                      <div class="col-sm-9">
                                          <input type="number" min="1" name="amount_of_withdrawal" class="form-control" value="{{$donor['amount_of_withdrawal']}}" >
                                      </div>
                                  </div>

                                  <div class="col-sm-12 row" style="padding: 6px;">
                                      <div class="col-sm-3 text-left" style="padding: 5px 0; font-size: 13px;">
                                          يوم الأستقطاع
                                      </div>
                                      <div class="col-sm-9">
                                          <input type="number" min="1" max="31" name="day_of_withdraw" class="form-control" value="{{$donor['day_of_withdraw']}}" >
                                      </div>
                                  </div>

                                  <div class="col-sm-12 row" style="padding: 6px;">
                                      <div class="col-sm-3 text-left" style="padding: 5px 0; font-size: 13px;">
                                        البريد الالكتروني
                                      </div>
                                      <div class="col-sm-9">
                                          <input type="email" name="email" class="form-control" value="{{$donor['email']}}" >
                                      </div>
                                  </div>

                                  <div class="col-sm-12 row" style="padding: 6px;">
                                      <div class="col-sm-3 text-left" style="padding: 5px 0; font-size: 13px;">
                                          الجوال
                                      </div>
                                      <div class="col-sm-9">
                                          <input type="text" name="mobile" class="form-control" value="{{$donor["mobile"]}}" >
                                      </div>
                                  </div>

                                  <div class="col-sm-12 row" style="padding: 6px;">
                                      <div class="col-sm-3 text-left" style="padding: 5px 0; font-size: 13px;">
                                          الهاتف
                                      </div>
                                      <div class="col-sm-9">
                                          <input type="text" name="phone" class="form-control" value="{{$donor["phone"]}}" >
                                      </div>
                                  </div>


                                  <div class="col-sm-12 row" style="padding: 6px;">
                                      <div class="col-sm-3 text-left" style="padding: 5px 0; font-size: 13px;">
                                          عدد تكرار الخصم في الشهر
                                      </div>
                                      <div class="col-sm-9">
                                          <input type="number" min="1" name="repeats_in_month" class="form-control" value="{{$donor['repeats_in_month']}}" >
                                      </div>
                                  </div>

                                  <div class="col-sm-12 row" style="padding: 6px;">
                                      <div class="col-sm-3 text-left" style="padding: 5px 0; font-size: 13px;">
                                        تاريخ بداية الخصم
                                      </div>
                                      <div class="col-sm-9">
                                          <input type="text" name="withdraw_start_date" class="form-control dp-peter"  data-position="left top"  value="{{$donor['withdraw_start_date']}}" >
                                      </div>
                                  </div>
                                  <div class="col-sm-12 row" style="padding: 6px;">
                                      <div class="col-sm-3 text-left" style="padding: 5px 0; font-size: 13px;">
                                        تاريخ نهاية الخصم
                                      </div>
                                      <div class="col-sm-9">
                                          <input type="text" name="withdraw_end_date" class="form-control dp-peter"  data-position="left top"  value="{{$donor['withdraw_end_date']}}" >
                                      </div>
                                  </div>


                                  <div class="col-sm-12 row" style="padding: 6px;">
                                      <div class="col-sm-3 text-left" style="padding: 5px 0; font-size: 13px;">
                                        تفاصيل الخصم
                                      </div>
                                      <div class="col-sm-9">
                                          <textarea   name="withdraw_description" class="form-control"  >{{$donor['repeats_in_month']}}</textarea>
                                      </div>
                                  </div>


                                  <div class="col-sm-12 row" style="padding: 6px;">
                                      <div class="col-sm-3 text-left" style="padding: 5px 0; font-size: 13px;">
                                          إرسال رساله sms بأن العملية ناجحه
                                      </div>
                                      <div class="col-sm-9">
                                          <input type="checkbox" name="success_sms" class="form-control"  @if($donor['success_sms']) checked=""@endif>
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

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
                    <button class="btn btn-success  " style="padding: 3px 8px ;border-radius: 0px;background: transparent;border:1px solid #39fbed;margin: 0px 2px;"  onclick="$('#submit').submit();">استيراد <span class="fa fa-check"></span></button>
                </div>

            </div>
        </div>


        <div class="panel-body col-12 row" style="padding: 0px; background: ">

              <div class="col-sm-12 " style=" padding: 0px 5px; ">
                <form action="{{ route('operations.storeAuto') }}" method="POST" id="submit" enctype="multipart/form-data">
                   {{csrf_field()}}

                  <div class="panel panel-primary" style="padding: 0px;   border:none;">
                      <div class="panel-body  row  " style="padding: 20px;background: #fff;margin: 0px; ">
                          <div class="col-sm-12 col-md-6  " style="border:none">

                              <div class="col-sm-12 col-lg-10" style="padding: 20px 5px;padding-top: 60px">

                                  <div class="col-sm-12 row" style="padding: 6px;">
                                      <div class="col-sm-3 text-right" style="padding: 5px 0px; font-size: 13px;">
                                          الحساب البنكي
                                      </div>
                                      <div class="col-sm-9">
                                        <select name="bank_account" class="form-control">
                                          <option></option>
                                          @foreach($bank_accounts as $bank_account)
                                          <option value="{{$bank_account->id}}">{{number_format($bank_account->account_number,0,'','')}} ( {{$bank_account->bank->name}} )</option>
                                          @endforeach
                                        </select>

                                      </div>
                                  </div>


                                  <div class="col-sm-12 row" style="padding: 6px;">
                                      <div class="col-sm-3 text-right" style="padding: 5px 0px; font-size: 13px;">
                                          الفترة
                                      </div>
                                      <div class="col-sm-9">
                                        <select name="interval" class="form-control">
                                          <option></option>
                                          @foreach($intervals as $interval)
                                          <option value="{{$interval->id}}">{{$interval->name}} ( {{$interval->start}} - {{$interval->end }} )</option>
                                          @endforeach
                                        </select>

                                      </div>
                                  </div>


                                  <div class="col-sm-12 row" style="padding: 6px;">
                                      <div class="col-sm-3 text-right" style="padding: 5px 0px; font-size: 13px;">
                                          اختر الملف
                                      </div>
                                      <div class="col-sm-9">
                                        <input type="file" name="excel_sheet" class="form-control" style="padding: 2px;">
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


<script type="text/javascript">
    $.ajax({
      method: "POST",
      url: "",
      data: { name: "John" }
    })
      .done(function( msg ) {
        alert(  msg );
      });
</script>

@endsection

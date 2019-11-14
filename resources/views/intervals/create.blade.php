@extends('const.const')
@section('content')
<div class="col-sm-12  row" style="padding: 8px;margin-top: 55px">
    <div class="panel panel-default col-sm-12  ">




      <div class="panel-heading col-sm-12 row" style="padding: 0;background: red;">
            <div class="panel-body col-sm-12 row" style=" background: #2381c6;color: #fff;padding:  20px 5px; ">

                <div class="col-sm-6 " style="padding: 4px">
                    <span class="fa fa-user" style="color: var(--orange-light-color);margin-right: 10px;padding-left: 20px;font-size: 22px;"></span>   اضافة
                </div>
                <div class="col-sm-6  text-right" style="padding: 0;display: unset;">
                    <button></button>
                    <button class="btn btn-success  " style="padding: 3px 8px ;border-radius: 0;background: transparent;border:1px solid #39FBED;margin: 0 2px;"  onclick="$('#submit').submit();">حفظ <span class="fa fa-check"></span></button>
                </div>

            </div>
        </div>


        <div class="panel-body col-12 row" style="padding: 0;">

              <div class="col-sm-12 " style=" padding: 0 5px; ">
                <form action="{{ route('intervals.store') }}" method="POST" id="submit">
                   @csrf
                  <div class="panel panel-primary" style="padding: 0;border:none;">
                      <div class="panel-body  row  " style="padding: 20px;background: #fff;margin: 0; ">
                          <div class="col-sm-12 col-md-6  " style="border:none">

                              <div class="col-sm-12 col-lg-10" style="padding: 60px 5px 20px;">

                                  <div class="col-sm-12 row" style="padding: 6px;">
                                      <div class="col-sm-3 text-right" style="padding: 5px 0; font-size: 13px;">
                                          الاسم
                                      </div>
                                      <div class="col-sm-9">
                                          <input type="text" name="name" class="form-control" value="{{old('name')}}" autofocus="">
                                      </div>
                                  </div>

                                  <div class="col-sm-12 row" style="padding: 6px;">
                                      <div class="col-sm-3 text-right" style="padding: 5px 0; font-size: 13px;">
                                          من
                                      </div>
                                      <div class="col-sm-9">
                                          <input type='text' class="dp-peter form-control" data-position="left top" name="start"/>
                                      </div>
                                  </div>

                                  <div class="col-sm-12 row" style="padding: 6px;">
                                      <div class="col-sm-3 text-right" style="padding: 5px 0; font-size: 13px;">
                                          إلي
                                      </div>
                                      <div class="col-sm-9">
                                          <input type='text' class="dp-peter form-control" data-position="left top" name="end"/>
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

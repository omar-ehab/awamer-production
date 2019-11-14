@extends('const.const')
@section('content')
<div class="col-sm-12  row" style="padding: 8px;margin-top: 55px">
    <div class="panel panel-default col-sm-12  ">




      <div class="panel-heading col-sm-12 row" style="padding: 0px;background: red;">
            <div class="panel-body col-sm-12 row" style=" background: #2381c6;color: #fff;padding:  20px 5px; ">

                <div class="col-sm-6 " style="padding: 4px">
                    <span class="fa fa-user" style="color: var(--orange-light-color);margin-right: 10px;padding-left: 20px;font-size: 22px;"></span>  عنوان الصفحة
                </div>
                <div class="col-sm-6  text-right" style="padding: 0px;display: unset;">
                    <button></button>
                    <button class="btn btn-success  " style="padding: 3px 8px ;border-radius: 0px;background: transparent;border:1px solid #39fbed;margin: 0px 2px;"  onclick="$('#submit').submit();">حفظ <span class="fa fa-check"></span></button>
                </div>

            </div>
        </div>


        <div class="panel-body col-12 row" style="padding: 0px;">

              <div class="col-sm-12 " style=" padding: 0px 5px; ">
                <form action="{{ route('establishments.update',$establishment->id) }}" method="POST" id="submit"  enctype="multipart/form-data">
                   {{csrf_field()}}
                   {{ method_field('PATCH') }}
                  <div class="panel panel-primary" style="padding: 0px;   border:none;">
                      <div class="panel-body  row  " style="padding: 20px;background: #fff;margin: 0px; ">
                          <div class="col-sm-12 col-md-6  " style="border:none">

                              <div class="col-sm-12 col-lg-10" style="padding: 20px 5px;padding-top: 60px">

                                  <div class="col-sm-12 row" style="padding: 6px;">
                                      <div class="col-sm-3 text-left" style="padding: 5px 0px; font-size: 13px;">
                                          الاسم<span style="color: red">*</span>
                                      </div>
                                      <div class="col-sm-9">
                                          <input type="text" name="name" class="form-control" value="{{$establishment['name']}}" autofocus="">
                                      </div>
                                  </div>


                                  <div class="col-sm-12 row" style="padding: 6px;">
                                      <div class="col-sm-3 text-left" style="padding: 5px 0px; font-size: 13px;">
                                          نوع الجهة<span style="color: red">*</span>
                                      </div>
                                      <div class="col-sm-9">
                                        <select class="form-control" name="establishment_type_id">
                                          @foreach($establishmentTypes as $establishmentType)
                                          <option value="{{$establishmentType->id}}" {{$establishment->establishment_type_id == $establishmentType->id ? "selected" : ""}}>{{$establishmentType->name}}</option>
                                          @endforeach
                                        </select>

                                      </div>
                                  </div>

                                  <div class="col-sm-12 row" style="padding: 6px;">
                                      <div class="col-sm-3 text-left" style="padding: 5px 0px; font-size: 13px;">
                                          المنطقة الادارية<span style="color: red">*</span>
                                      </div>
                                      <div class="col-sm-9">
                                          <select class="form-control" name="administrative_area_id">
                                            @foreach($administrativeAreas as $administrativeArea)
                                            <option value="{{$administrativeArea->id}}" {{$establishment->administrative_area_id == $administrativeArea->id ? "selected" : ""}}>{{$administrativeArea->name}}</option>
                                            @endforeach
                                          </select>
                                      </div>
                                  </div>


                                  <div class="col-sm-12 row" style="padding: 6px;">
                                      <div class="col-sm-3 text-left" style="padding: 5px 0px; font-size: 13px;">
                                          اسم الممثل<span style="color: red">*</span>
                                      </div>
                                      <div class="col-sm-9">
                                          <input type="text" name="representative_name" class="form-control" value="{{$establishment['representative_name']}}"  >
                                      </div>
                                  </div>


                                  <div class="col-sm-12 row" style="padding: 6px;">
                                      <div class="col-sm-3 text-left" style="padding: 5px 0px; font-size: 13px;">
                                          الجوال <span style="color: red">*</span>
                                      </div>
                                      <div class="col-sm-9">
                                          <input type="text" name="mobile" class="form-control" value="{{$establishment['mobile']}}"  >
                                      </div>
                                  </div>

                                  <div class="col-sm-12 row" style="padding: 6px;">
                                      <div class="col-sm-3 text-left" style="padding: 5px 0px; font-size: 13px;">
                                          الهاتف
                                      </div>
                                      <div class="col-sm-9">
                                          <input type="text" name="phone" class="form-control" value="{{$establishment['phone']}}"  >
                                      </div>
                                  </div>


                                  <div class="col-sm-12 row" style="padding: 6px;">
                                      <div class="col-sm-3 text-left" style="padding: 5px 0px; font-size: 13px;">
                                          العنوان <span style="color: red">*</span>
                                      </div>
                                      <div class="col-sm-9">
                                          <input type="text" name="address" class="form-control" value="{{$establishment['address']}}"  >
                                      </div>
                                  </div>

                                  <div class="col-sm-12 row" style="padding: 6px;">
                                      <div class="col-sm-3 text-left" style="padding: 5px 0px; font-size: 13px;">
                                          نوع الحساب<span style="color: red">*</span>
                                      </div>
                                      <div class="col-sm-9">
                                          <select class="form-control" name="percentage">
                                              <option value="true" {{$establishment->contract->percentage ? "selected" : ""}}>نسبة مئوية</option>
                                              <option value="false" {{!$establishment->contract->percentage ? "selected" : ""}}>نسبة ثابتة</option>
                                          </select>
                                      </div>
                                  </div>

                                  <div class="col-sm-12 row" style="padding: 6px;">
                                      <div class="col-sm-3 text-left" style="padding: 5px 0px; font-size: 13px;">
                                          القيمة المحصلة<span style="color: red">*</span>
                                      </div>
                                      <div class="col-sm-9">
                                          <input type="text" name="value" class="form-control" value="{{ $establishment->contract->value }}">
                                      </div>
                                  </div>

                                  @if($establishment['logo'])
                                      <div class="col-sm-12 row" style="padding: 6px;">
                                          <div class="col-sm-3 text-left" style="padding: 5px 0px; font-size: 13px;">
                                              الشعار القديم
                                          </div>
                                          <div class="col-sm-9">
                                              <img src="{{ asset($establishment['logo']) }}" class="img-fluid img-thumbnail" alt="">
                                          </div>
                                      </div>
                                  @endif

                                  <div class="col-sm-12 row" style="padding: 6px;">
                                      <div class="col-sm-3 text-left" style="padding: 5px 0px; font-size: 13px;">
                                          الشعار <span style="color: red">*</span>
                                      </div>
                                      <div class="col-sm-9">
                                          <input type="file" name="logo" class="form-control" value="{{$establishment['logo']}}"  >
                                      </div>
                                  </div>


                                  <div class="col-sm-12 row" style="padding: 6px;">
                                      <div class="col-sm-3 text-left" style="padding: 5px 0px; font-size: 13px;">
                                          الكليشة
                                      </div>
                                      <div class="col-sm-9">
                                          <textarea  name="kalesha" class="form-control" >{{$establishment['kalesha']}}</textarea>
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

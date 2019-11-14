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


        <div class="panel-body col-12 row" style="padding: 0px; background: ">

              <div class="col-sm-12 " style=" padding: 0px 5px; ">
                <form action="{{ route('banks.store') }}" method="POST" id="submit">
                   {{csrf_field()}}
                  <div class="panel panel-primary" style="padding: 0px;   border:none;">
                      <div class="panel-body  row  " style="padding: 20px;background: #fff;margin: 0px; ">
                          <div class="col-sm-12 col-md-6  " style="border:none">

                              <div class="col-sm-12 col-lg-10" style="padding: 20px 5px;padding-top: 60px">

                                  <div class="col-sm-12 row" style="padding: 6px;">
                                      <div class="col-sm-3 text-right" style="padding: 5px 0px; font-size: 13px;">
                                          الاسم
                                      </div>
                                      <div class="col-sm-9">
                                          <input type="text" name="name" class="form-control" value="{{old('name')}}" autofocus="">
                                      </div>
                                  </div>


                                  <div class="col-sm-12 row" style="padding: 6px;">
                                      <div class="col-sm-3 text-right" style="padding: 5px 0px; font-size: 13px;">
                                          خانة التاريخ
                                      </div>
                                      <div class="col-sm-9">
                                          <input type="text" name="donation_date_col" class="form-control" value="{{old('donation_date_col')}}" autofocus=""  placeholder="مثال A او B او C ...">
                                      </div>
                                  </div>

                                  <div class="col-sm-12 row" style="padding: 6px;">
                                      <div class="col-sm-3 text-right" style="padding: 5px 0px; font-size: 13px;">
                                          خانة المبلغ
                                      </div>
                                      <div class="col-sm-9">
                                          <input type="text" name="amount_col" class="form-control" value="{{old('amount_col')}}" autofocus=""  placeholder="مثال A او B او C ...">
                                      </div>
                                  </div>


                                  <div class="col-sm-12 row" style="padding: 6px;">
                                      <div class="col-sm-3 text-right" style="padding: 5px 0px; font-size: 13px;">
                                          خانة رقم الحساب
                                      </div>
                                      <div class="col-sm-9">
                                          <input type="text" name="bank_account_number_col" class="form-control" value="{{old('bank_account_number_col')}}" autofocus="" placeholder="مثال A او B او C ...">
                                      </div>
                                  </div>


                                  <div class="col-sm-12 row" style="padding: 6px;">
                                      <div class="col-sm-3 text-right" style="padding: 5px 0px; font-size: 13px;">
                                          قراءة من الصف رقم 
                                      </div>
                                      <div class="col-sm-9">
                                          <input type="text" name="read_from_row" class="form-control" value="{{old('read_from_row')}}" autofocus="" placeholder="مثال 1 او 2 او 3 ...">
                                      </div>
                                  </div>




                                  <div class="col-sm-12 row" style="padding: 6px;">
                                      <div class="col-sm-6 text-right" style="padding: 5px 0px; font-size: 13px;">
                                          كيف يمكنني معرفة الخانات ؟
                                      </div>
                                      <div class="col-sm-6">
                                          <span class="fa fa-info-circle" style="cursor: pointer;padding: 8px" data-toggle="modal" data-target="#exampleModal"></span>
 

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











<div class="  modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background: transparent!important">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">مكان الخانة</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body row">
      <div class="col-12" style="padding: 5%;">
        <div class="col-12" style="box-shadow: 0px 0px 10px #333;">
          <img src="/images/site_images/col_place_img.png" style="max-width: 100%">
        </div>
      </div>
      </div>
      
    </div>
  </div>
</div>



@endsection

@extends('const.const')
@section('content')
    <div class="col-xs-12" style="padding: 8px;width: 100%">


        <div class="panel panel-default">
            <div class="panel-heading" style="padding: 0px;">
                <div class="panel-body animated fadeInDown" style=" background: #2381c6;color: #fff;padding: 5px;">
                    <div class="col-xs-6" style="padding: 4px">
                        إضافة موظف
                    </div>
                    <div class="col-xs-6 text-left" style="padding: 0px;display: unset;float: left">
                        <button class="btn btn-danger  " style="padding: 3px 10px ;border-radius: 0px ;background:  #ff0b6c;border:1px solid red;margin: 0px 3px;"> <span class="fa fa-times"></span></button>
                        <button class="btn btn-success  " style="padding: 3px 8px ;border-radius: 0px;background: transparent;border:1px solid #39fbed;margin: 0px 2px;" onclick="$('#submit').submit();">حفظ <span class="fa fa-check"></span></button>
                    </div>

                </div>
            </div>
            <div class="panel-body" style="padding: 0px;">


                <form action="{{ route('updatePrivacyPolicy', $privacyPolicy->id) }}" method="POST" id="submit">
                    @csrf
                    <div class="col-xs-12 " style="background: #fff;padding: 0px 5px; ">
                        <div class="panel panel-primary" style="padding: 0px;   border:none;">
                            <div class="col-xs-12 col-md-9" style="padding: 6px;">
                                <div class="col-xs-3 text-left" style="padding: 5px 0px; font-size: 13px;">
                                    الشروط والأحكام
                                </div>
                                <div class="col-xs-9">
                                    <textarea name="content" class="form-control" rows="10">{{ $privacyPolicy->content }}</textarea>
                                </div>
                            </div>


                        </div>
                    </div>
                    <!-- /.content -->
                </form>



            </div>
        </div>

    </div>


@endsection

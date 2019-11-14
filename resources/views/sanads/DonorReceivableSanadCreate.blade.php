@extends('const.const')
@section('content')
    <style type="text/css">
        #myTable_filter
        {
            display: none;
        }
        .dt-buttons{
            display: none;
        }
    </style>

    <form action="{{ route('sanads.DonorReceivableSanadStore') }}" method="POST" id="submit">
        <div class="col-sm-12  row" style="padding: 8px;margin-top: 55px">
            <div class="panel panel-default col-sm-12  ">




                <div class="panel-heading col-sm-12 row" style="padding: 0px;background: red;">
                    <div class="panel-body col-sm-12 row" style=" background: #2381c6;color: #fff;padding:  20px 5px; ">

                        <div class="col-sm-6 " style="padding: 4px">
                            <span class="fa fa-money-check-edit-alt" style="color: var(--orange-light-color);margin-right: 10px;padding-left: 20px;font-size: 22px;"></span>  إدخال عملية يدوية
                        </div>
                        <div class="col-sm-6  text-right" style="padding: 0px;display: unset;">
                            <button></button>
                            <button class="btn btn-success  " style="padding: 3px 8px ;border-radius: 0px;background: transparent;border:1px solid #39fbed;margin: 0px 2px;"  onclick="$('#submit').submit();">حفظ <span class="fa fa-check"></span></button>
                        </div>

                    </div>
                </div>


                <div class="panel-body col-12 row" style="padding: 0px; background: ">

                    <div class="col-sm-12 " style=" padding: 0px 5px; ">

                        {{csrf_field()}}
                        <div class="panel panel-primary" style="padding: 0px;   border:none;">
                            <div class="panel-body  row  " style="padding: 20px;background: #fff;margin: 0px; ">
                                <div class="col-sm-12 col-md-6  " style="border:none">

                                    <div class="col-sm-12 col-lg-10" style="padding: 20px 5px;padding-top: 60px">

                                        <div class="col-sm-12 row" style="padding: 6px;">
                                            <div class="col-sm-3 text-right" style="padding: 5px 0px; font-size: 13px;">
                                                الحساب
                                            </div>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="bank_account_id" id="bank_account">
                                                    @foreach($bank_accounts as $bank_account)
                                                        <option value="{{$bank_account->id}}">{{$bank_account->bank->name}} {{$bank_account->account_number}}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>

                                        <div class="col-sm-12 row" style="padding: 6px;">
                                            <div class="col-sm-3 text-right" style="padding: 5px 0px; font-size: 13px;">
                                                الفتره
                                            </div>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="interval_id" id="interval">
                                                    @foreach($intervals as $interval)
                                                        <option value="{{$interval->id}}">{{$interval->name}}  (من  {{$interval->start}} إلي   {{$interval->end}} )</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="col-12">
                        <table  id="myTable" class="table table-striped table-bordered col-12 " style="padding: 0px;">
                            <thead>
                            <tr>
                                <th>اختيار</th>
                                <th>الأسم</th>
                            </tr>
                            </thead>
                            <tbody id="tableBody">
                            @foreach($donors as $donor)
                                <tr>
                                    <td><input type="radio" name="donor_id" value="{{ $donor->id }}"/></td>
                                    <td>{{$donor->name}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    <!-- /.content -->
                </div>
            </div>
        </div>
    </form>
@endsection

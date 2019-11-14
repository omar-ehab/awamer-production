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

 <form action="{{ route('operations.store') }}" method="POST" id="submit">
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


            <div class="panel-body col-12 row" style="padding: 0;">

                <div class="col-sm-12 " style=" padding: 0px 5px; ">

                        {{csrf_field()}}
                        <div class="panel panel-primary" style="padding: 0px;   border:none;">
                            <div class="panel-body  row  " style="padding: 20px;background: #fff;margin: 0px; ">
                                <div class="col-sm-12 col-md-6  " style="border:none">

                                    <div class="col-sm-12 col-lg-10" style="padding: 20px 5px;padding-top: 60px">

                                        <div class="col-sm-12 row" style="padding: 6px;">
                                            <div class="col-sm-3 text-right" style="padding: 5px 0px; font-size: 13px;">
                                                الحساب المتبرع عليه
                                            </div>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="bank_account_id" id="bank_account">
                                                    @foreach($bank_accounts as $bank_account)
                                                        <option value="{{$bank_account->id}}">{{$bank_account->bank->name}} {{number_format($bank_account->account_number,0,'','')}}</option>
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
                                <th>القيمة المتبرع بها</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            @foreach($donors as $donor)
                            <tr>
                                <td><input type="checkbox" name="donor_ids[]" value="{{ $donor->id }}"/></td>
                                <td>{{$donor->name}}</td>
                                <td>{{$donor->amount_of_withdrawal}} ر.س</td>
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
<script>
    $(window).on('load', function () {
        $('select#interval').on('change', function (e) {
            var valueSelected = this.value;
            var tableBody = $("#tableBody");
            var bank_account = $("#bank_account").val();
            $.ajax({
                type: "POST",
                url: "getDonorsByIntervalAndBank",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "interval_id": valueSelected,
                    "bank_account": bank_account
                }
            }).done(function(data) {

                tableBody.empty();
                if(data.length === 0)
                {
                    tableBody.append(`<tr class="odd"><td valign="top" colspan="3" class="dataTables_empty"><img src="/system_images/empty.svg" style="width: 180px;height: 180px;display: inline-block;"> <h6 style="color:#ccc">لم يعثر على أية سجلات</h6></td></tr>`);
                    return true;
                }



                $.each(data, function (key, value) {
                    tableBody.append(`
                        <tr role="row" class=${key % 2 === 0 ? "even" : "odd"}>
                            <td><input type="checkbox" name="donor_ids[]" value="${value.id}"></td>
                            <td>${value.name}</td>
                            <td>${value.amount_of_withdrawal} ر.س</td>
                        </tr>
                    `);
                });

                $.switcher({});

            });
        });
        $('select#bank_account').on('change', function (e) {
            var valueSelected = this.value;
            var tableBody = $("#tableBody");
            var bank_account = $("#bank_account").val();
            $.ajax({
                type: "POST",
                url: "getDonorsByIntervalAndBank",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "interval_id": valueSelected,
                    "bank_account": bank_account
                }
            }).done(function(data) {

                tableBody.empty();
                if(data.length === 0)
                {
                    tableBody.append(`<tr class="odd"><td valign="top" colspan="3" class="dataTables_empty"><img src="/system_images/empty.svg" style="width: 180px;height: 180px;display: inline-block;"> <h6 style="color:#ccc">لم يعثر على أية سجلات</h6></td></tr>`);
                    return true;
                }



                $.each(data, function (key, value) {
                    tableBody.append(`
                        <tr role="row" class=${key % 2 === 0 ? "even" : "odd"}>
                            <td><input type="checkbox" name="donor_ids[]" value="${value.id}"></td>
                            <td>${value.name}</td>
                            <td>${value.amount_of_withdrawal} ر.س</td>
                        </tr>
                    `);
                });

                $.switcher({});

            });
        });
    });
</script>
@endsection

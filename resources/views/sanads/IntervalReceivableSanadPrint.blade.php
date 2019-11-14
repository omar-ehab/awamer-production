@include('const.head')
@include('const.style')
<style type="text/css">
    body
    {
        background: #fff!important;
    }
    @page{margin:0px auto;}
    @media print {
        html,body {
            margin: 0;
        }
    }
</style>
<body>


<div class="col-xs-12" style="padding: 10px 10px;">
    <div class="col-xs-12" style="padding: 20px 20px 50px;border:2px solid #919191">
        <div class="col-xs-12" style="padding: 0px;">
            <div class="col-xs-12" style="display: flex;justify-content: space-between;align-items: center">
                <div class="col-xs-6">
                    <h2>{{$result->establishment->name}}</h2>
                </div>
                @if($result->establishment->logo)
                    <div class="col-xs-6">
                        <img src="{{ asset('images/establishment/' . $result->establishment->logo) }}" style="height: 60px" alt="Establishment Logo">
                    </div>
                @endif
            </div>
            @if($result->establishment->kalesha)
                <div class="col-xs-12" style="display: flex;justify-content: space-between;align-items: center">
                    <div class="col-xs-6">
                        <div>{{ $result->establishment->kalesha }}</div>
                    </div>
                </div>
            @endif
            <div class="col-xs-12" style="display: flex">
                <div class="col-xs-6" style="padding: 10px 0px; margin-left: 250px">
                    <div class="col-xs-4 text-left" >
                        <div style="height: 20px; font-size: 15px; ">
                            التاريخ
                        </div>
                    </div>
                    <div class="col-xs-8" style=" ">
                        <div style="height: 20px;padding-top: 3px ; font-size: 15px;">
                            {{$result->sanad_date}}
                        </div>
                    </div>
                </div>

                <div class="col-xs-6" style="padding: 10px 0px">
                    <div class="col-xs-4 text-left" >
                        <div style="height: 20px; font-size: 15px; ">
                            رقم السند
                        </div>
                    </div>
                    <div class="col-xs-8" style=" ">
                        <div style="height: 20px;padding-top: 3px ; font-size: 15px;">
                            {{ $result->sanad_number }}
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-xs-12" style="margin-top: 10px;margin-bottom: 25px;">
            <div style="height: 2px;background: #000;border:1px solid #919191">

            </div>
        </div>

        <div class="col-xs-12" style="margin-top: 0px;">
            <div class="col-xs-12 text-center" style="padding-bottom: 30px;">
                <div class="col-xs-12 " style=" font-size: 40px;line-height: 1;color: #666; padding-top: 8px">
                    سند قبض لفترة : {{ $result->interval->name }}
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <div class="col-xs-3 text-left" >
                        <div style="height: 20px; font-size: 15px;color: #919191">
                            من
                        </div>
                    </div>
                    <div class="col-xs-9" style="margin-top: 15px">
                        <div style="height: 20px; font-size: 15px; opacity:0.1">
                            ------------------------------------------------------------------------
                        </div>
                        <div style="position: relative;top: -30px;font-size: 17px;color: #000">
                            {{$result->interval->start}}
                        </div>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="col-xs-3 text-left" >
                        <div style="height: 20px; font-size: 15px;color: #919191">
                            إلي
                        </div>
                    </div>
                    <div class="col-xs-9" style="margin-top: 15px">
                        <div style="height: 20px; font-size: 15px; opacity:0.1">
                            ------------------------------------------------------------------------
                        </div>
                        <div style="position: relative;top: -30px;font-size: 17px;color: #000">
                            {{$result->interval->end}}
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xs-3 text-left" >
                <div style="height: 20px; font-size: 15px;color: #919191">
                    الحساب
                </div>
            </div>
            <div class="col-xs-9" style="margin-top: 15px">
                <div style="height: 20px; font-size: 15px; opacity:0.1">
                    ------------------------------------------------------------------------
                </div>
                <div style="position: relative;top: -30px;font-size: 17px;color: #000">
                    {{$result->bank_account->bank->name}} - {{$result->bank_account->account_number}}
                </div>
            </div>
        </div>


        <div class="col-xs-12" style="margin-top: 20px;">

            <div class="col-xs-3 text-left" >
                <div style="height: 20px; font-size: 15px;color: #919191">
                    مجموع الإستقطاعات خلال الفتره
                </div>
            </div>
            <div class="col-xs-9" style="margin-top: 15px">
                <div style="height: 20px; font-size: 15px; opacity: .1">
                    ------------------------------------------------------------------------
                </div>
                <div style="position: relative;top: -30px;color: #222 ">
                    {{$result->total_amount}}
                </div>
            </div>
        </div>
        <div class="col-xs-12" style="margin-top: 20px;">

            <div class="col-xs-3 text-left" >
                <div style="height: 20px; font-size: 15px;color: #919191">
                    رقم العملية
                </div>
            </div>
            <div class="col-xs-9" style="margin-top: 15px">
                <div style="height: 20px; font-size: 15px; opacity: .1">
                    ------------------------------------------------------------------------
                </div>
                <div style="position: relative;top: -30px;color: #222 ">
                    {{$result->process_number}}
                </div>
            </div>
        </div>


        <div class="row" style="padding-top: 40px;">
            <div class="col-xs-6">
                <div class="col-xs-3 text-left" >
                    <div style="height: 20px; font-size: 15px;color: #919191">
                        اسم الموظف
                    </div>
                </div>
                <div class="col-xs-9" style="margin-top: 15px">
                    <div style="height: 20px; font-size: 15px; opacity: .1">
                        ------------------------------------------------------------------------
                    </div>
                    <div style="position: relative;top: -30px;color: #222 ">
                        {{$result->employee->name}}
                    </div>
                </div>
            </div>

            <div class="col-xs-6">
                <div class="col-xs-4 text-center">
                    المدير
                    <br>
                    <br>
                    ------------------------
                </div>
            </div>
        </div>
    </div>
</div>

</body>

<script type="text/javascript">
    (function(){
        setTimeout(function(){
            window.print();
        }, 1200);
    })();

</script>
@include('const.script')

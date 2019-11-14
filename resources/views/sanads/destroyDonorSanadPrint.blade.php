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
        <div class="col-xs-12" style="padding: 10px 0px 50px;border:2px solid #919191">
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
                <div class="col-xs-4" style="display: flex">
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
                        سند إيقاف متبرع
                    </div>
                </div>

                <div class="col-xs-3 text-left" >
                    <div style="height: 20px; font-size: 15px;color: #919191">
                        اسم المتبرع:
                    </div>
                </div>
                <div class="col-xs-9" style="margin-top: 15px">
                    <div style="height: 20px; font-size: 15px; opacity:0.1">
                        ------------------------------------------------------------------------
                    </div>
                    <div style="position: relative;top: -30px;font-size: 17px;color: #000">
                        {{$result->donor->name}}
                    </div>
                </div>


                <div class="col-xs-3 text-left" >
                    <div style="height: 20px; font-size: 15px;color: #919191">
                        السبب:
                    </div>
                </div>
                <div class="col-xs-9" style="margin-top: 15px">
                    <div style="height: 20px; font-size: 15px; opacity:0.1">
                        ------------------------------------------------------------------------
                    </div>
                    <div style="position: relative;top: -30px;font-size: 17px;color: #000">
                        {{$result->notes}}
                    </div>
                </div>
            </div>


            <div class="col-xs-12" style="margin-top: 20px;">

                <div class="col-xs-3 text-left" >
                    <div style="height: 20px; font-size: 15px;color: #919191">
                        تاريخ إيقاف المتبرع
                    </div>
                </div>
                <div class="col-xs-9" style="margin-top: 15px">
                    <div style="height: 20px; font-size: 15px; opacity: .1">
                        ------------------------------------------------------------------------
                    </div>
                    <div style="position: relative;top: -30px;color: #222 ">
                        {{$result->donor_destroy_date}}
                    </div>
                </div>
            </div>




            <div class="col-xs-12" style="padding-top: 40px;">
                <div class="col-xs-4 text-center">
                    المدير
                    <br>
                    <br>
                    ------------------------
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

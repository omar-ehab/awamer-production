@include('const.head')
@include('const.style')
<style type="text/css">
    body
    {
        background: #fff!important;
    }
    .term{
        font-size: 18px;
        padding: 10px 0;
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
                    <h2>{{$contract->establishment->name}}</h2>
                </div>
                @if($contract->establishment->logo)
                    <div class="col-xs-6">
                        <img src="{{ asset('images/establishment/' . $contract->establishment->logo) }}" style="height: 60px" alt="Establishment Logo">
                    </div>
                @endif
            </div>
            @if($contract->establishment->kalesha)
                <div class="col-xs-12" style="display: flex;justify-content: space-between;align-items: center">
                    <div class="col-xs-6">
                        <div>{{ $contract->establishment->kalesha }}</div>
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
                            {{\Carbon\Carbon::parse($contract->created_at)->toDateString()}}
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
                    عقد تسجيل جهة بمنصة الأوامر المستديمة
                </div>
            </div>

            <div class="col-xs-3 text-left" >
                <div style="height: 20px; font-size: 15px;color: #919191">
                    اسم الجهة:
                </div>
            </div>
            <div class="col-xs-9" style="margin-top: 15px">
                <div style="height: 20px; font-size: 15px; opacity:0.1">
                    ------------------------------------------------------------------------
                </div>
                <div style="position: relative;top: -30px;font-size: 17px;color: #000">
                    {{$contract->establishment->name}}
                </div>
            </div>


            <div class="col-xs-3 text-left" >
                <div style="height: 20px; font-size: 15px;color: #919191">
                    نسبة المنصة:
                </div>
            </div>
            <div class="col-xs-9" style="margin-top: 15px">
                <div style="height: 20px; font-size: 15px; opacity:0.1">
                    ------------------------------------------------------------------------
                </div>
                <div style="position: relative;top: -30px;font-size: 17px;color: #000">
                    {{$contract->percentage? $contract->value . "%" : $contract->value . " ر.س"}}
                </div>
            </div>
        </div>

        <div class="col-xs-12">
            <h5>{{ $contractStart->value }}</h5>
        </div>
        <div class="col-xs-12">
            <p>ـــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــ</p>
        </div>

        <div class="col-xs-12">
            <h1>بنود العقد :</h1>
        </div>

        <div class="col-xs-12">
            <ul>
                @foreach($terms as $term)
                    <li class="term">{{ $term->term }}</li>
                @endforeach
            </ul>
        </div>
        <div class="col-xs-12">
            <p>ـــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــ</p>
        </div>

        <div class="col-xs-12">
            <h5>{{ $contractEnd->value }}</h5>
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

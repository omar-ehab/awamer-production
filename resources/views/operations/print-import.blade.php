  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<style type="text/css">
	*
	{
		text-align: right;
		direction: rtl;
	}
</style>
<div class="col-12  row print-this" style="padding: 8px;margin-top: 55px">
    <div class="col-12">
        <div class="col-12 row " style="border-bottom: 2px solid var(--orange-color)">
            <div class="col-3">
                <div class="text-center mt-3 py-4  px-0 row " style="border:1px solid #000;margin: 20px auto">
                    <div class="col-3 text-right px-0">
                        <span class="fal fa-check" style="color: var(--orange-color);font-size: 30px;"></span>
                    </div>
                    <div class="col-9 text-left">
                        <h6 class="my-0  mb-2 pb-2">العمليات الناجحة</h6>
                        <h6 class="my-0 py-0 mt-2" style="font-size: 16px;"><span style="letter-spacing: 2px;font-weight: bold;">
                                {{$total_success_amount_money}}
                            </span> ريال
                        </h6>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="text-center mt-3 py-4  px-0 row " style="border:1px solid #000;margin: 20px auto">
                    <div class="col-3 text-right px-0">
                        <span class="fal fa-times" style="color: var(--orange-color);font-size: 30px;"></span>
                    </div>
                    <div class="col-9 text-left">
                        <h6 class="my-0 py-0">العمليات المتعثرة</h6>
                        <h6 class="my-0 py-0 mt-2" style="font-size: 16px; "> <span style="letter-spacing: 2px;font-weight: bold;">
                                {{$total_failed_amount_money}}
                            </span> ريال </h6>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="text-center mt-3 py-4  px-0 row " style="border:1px solid #000;margin: 20px auto">
                    <div class="col-3 text-right px-0">
                        <span class="fal fa-info" style="color: var(--orange-color);font-size: 30px;"></span>
                    </div>
                    <div class="col-9 text-left">
                        <h6 class="my-0 py-0">العمليات الاخري</h6>
                        <h6 class="my-0 py-0 mt-2" style="font-size: 16px; "> <span style="letter-spacing: 2px;font-weight: bold;">
                                {{$total_another_amount_money}}
                            </span> ريال</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 " style=" padding: 0px 5px;   ">
            <h3 class="mt-5 mb-0">العمليات الناجحة <span class="badge badge-info" style="background: #000">{{count($successeded_operations)}}</span> </h3>
            <table class="table table-striped table-bordered">
                <tbody>
                    @for($i=0;$i<count($successeded_operations);$i++) <tr>
                        @for($x=0;$x<count($successeded_operations[$i]['operation']) ;$x++) <td>{{$successeded_operations[$i]['operation'][$x]}}</td>
                            @endfor
                            <td style="background: var(--orange-light-color)">{{$successeded_operations[$i]['type']}}</td>
                            @endfor
                            </tr>
                </tbody>
            </table>
            <h3 class="mt-5 pt-4">العمليات المتعثرة <span class="badge badge-info" style="background: #000">{{count($failed_operations)}}</span> </h3>
            <table class="table table-striped table-bordered">
                <tbody>
                    @for($i=0;$i<count($failed_operations);$i++) <tr>
                        <td><a target="_blank" href="/donors/{{$failed_operations[$i]['operation'][0]}}/edit">{{$failed_operations[$i]['operation'][1]}}</a> </td>
                        <td><a target="_blank" href="/donors/{{$failed_operations[$i]['operation'][0]}}/stop">ايقاف</a> </td>
                        <td style="background: var(--orange-light-color);">{{$failed_operations[$i]['type']}}</td>
                        @endfor
                        </tr>
                </tbody>
            </table>
            <h3 class="mt-5 pt-4">العمليات اخري <span class="badge badge-info" style="background: #000">{{count($another_operations)}}</span> </h3>
            <table class="table table-striped table-bordered">
                <tbody>
                    @for($i=0;$i<count($another_operations);$i++) <tr>
                        @for($x=0;$x<count($another_operations[$i]['operation']) ;$x++) <td>{{$another_operations[$i]['operation'][$x]}}</td>
                            @endfor
                            <td style="background: var(--orange-light-color)">{{$another_operations[$i]['type']}}</td>
                            @endfor
                            </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
<script type="text/javascript">
	setTimeout(function(){
		window.print();
	},2000);
</script>
@extends('const.const')
@section('content')
    <div class="col-12  row" style="padding: 8px;margin-top: 55px">
        <div class="panel panel-default   col-12 ">
            <div class="panel-body row" style="padding: 0px;  ">

                @include('const.enternalConst.alert-remove')
                @include('const.enternalConst.loading-img')
                <div class="col-3 pt-5">
                    <form action="{{ route('systemFees') }}" style="width: 100%;">
                        <div class="form-group">
                            <label for="start">من</label>
                            <input type='text' class="dp-peter form-control" data-position="left top" id="start" name="start" value="{{ $start }}"/>
                        </div>
                        <div class="form-group">
                            <label for="end">إلى</label>
                            <input type='text' class="dp-peter form-control" data-position="left top" id="end" name="end" value="{{ $end }}"/>
                        </div>
                        <button type="submit" class="btn btn-primary">اعرض</button>
                    </form>
                </div>

                <div class="col-12 real-content row " style="opacity: 0;padding: 30px 0px;position: relative;">
                    <table  id="myTable" class="table table-striped table-bordered col-12 " style="padding: 0px;">
                        <thead>
                        <tr>
                            <th>الكود</th>
                            <th>اسم الجهة</th>
                            <th>من</th>
                            <th>الى</th>
                            <th>المبلغ المطلوب تحصيلة خلال الفتره</th>
                            <th>عملية</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $x = 1?>
                        @foreach($results as $result)
                            <?php
                            $ids = "";
                            foreach($result[1] as $fee)
                            {
                                $ids .= $fee->id . ",";
                            }
                            ?>
                            <tr>
                                <td style="font-size: 18px">{{$x}}</td>
                                <td style="font-size: 18px">{{ $result[0]['name'] }}</td>
                                @if($start)
                                    <td style="font-size: 18px">{{ \Carbon\Carbon::parse($start)->toDateString() }}</td>
                                @else
                                    <td>--</td>
                                @endif
                                @if($end)
                                    <td style="font-size: 18px">{{ \Carbon\Carbon::parse($end)->toDateString() }}</td>
                                @else
                                    <td>--</td>
                                @endif
                                <td style="font-weight: bold;font-size: 18px">{{$result[1]->sum('fee')}} ر.س</td>
                                <td style="max-width: 100px">
                                    @if($result[1]->sum('fee') > 0)
                                        <form action="{{ route('systemFees.pay') }}" method="post">
                                            @csrf
                                            @method('post')
                                            <input type="hidden" name="fees_ids" value="<?php echo $ids?>">
                                            <button type="submit" class="btn btn-success">تم السداد</button>
                                        </form>
                                    @else
                                        <button class="btn btn-success disabled" style="cursor: not-allowed;" disabled>تم السداد</button>
                                    @endif
                                </td>
                            </tr>
                            <?php $x++?>
                        @endforeach

                        </tbody>
                    </table>
                    <div class="col-12 "></div>
                </div>
            </div>
        </div>
    </div>
@endsection

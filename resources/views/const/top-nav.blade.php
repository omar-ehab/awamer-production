<!-- Large modal -->


<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="border-radius: 0px;">
    <div class="modal-dialog modal-lg" style="border-radius: 0px;">
        <div class="modal-content">
            <div class="col-sm-12 row">

                <form method="POST" action="/change-password" class="row">
                    @csrf
                    <div class="panel-heading col-12" style="padding: 0px;">
                        <div class="panel-body row " style=" background: #2381c6;color: #fff;padding: 5px;">
                            <div class="col-6" style="padding: 4px">
                                تغيير كلمة المرور
                            </div>
                            <div class="col-6  text-right" style="padding: 0px;display: unset;padding-top: 19px!important">

                                <button class="btn btn-success  "
                                        style="padding: 3px 8px ;border-radius: 15px!important;background: var(--orange-color); margin: 0px 2px;color: #fff;display: inline-block!important;display: block;"
                                >حفظ <span class="fa fa-check"></span></button>
                            </div>
                            <div class="col-12 row">
                                <div class="col-12 col-lg-9 row" style="padding: 20px 5px;">
                                    <div class="col-12 row" style="padding: 6px;">
                                        <div class="col-3 text-right" style="padding: 5px 0px; font-size: 13px;">
                                            كلمة المرور القديمة
                                        </div>
                                        <div class="col-9">
                                            <input type="password" name="old_password" class="form-control"  >
                                        </div>
                                    </div>

                                    <div class="col-12 row" style="padding: 6px;">
                                        <div class="col-3 text-right" style="padding: 5px 0px; font-size: 13px;">
                                            كلمة المرور
                                        </div>
                                        <div class="col-9">
                                            <input type="password" name="password" class="form-control"  >
                                        </div>
                                    </div>
                                    <div class="col-12 row" style="padding: 6px;">
                                        <div class="col-3 text-right" style="padding: 5px 0px; font-size: 13px;">
                                            تاكيد كلمة المرور
                                        </div>
                                        <div class="col-9">
                                            <input type="password" name="c_password" class="form-control"  >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div>
</div>



<div class="nav-top pr-250 animate-navs col-sm-12 navbar-fixed-top row" style="height: 55px;background: #fff;border-bottom: none;z-index: 10;position: fixed; ">
    <div class="col-sm-12 row" style="padding: 0px;">
        <audio id="notificationSound">
            <source src="{{ asset('sounds/notification.mp3') }}" type="audio/mpeg">
        </audio>





        <div class="col-sm-1 col-1 col-md-1 animate-navs text-left" style="padding: 0px 2%;">
            <span id="collapse-nav" class="fas fa-bars animate-navs " style="padding: 15px 0px; font-size: 21px;cursor: pointer;display: inline-block;color:#333"></span>
        </div>


        <div class="col-sm-5 col-5 col-md-5   d-none d-md-block  " style="padding: 10px 0px;">
        <!--   <form action="/search" method="POST" class="col-sm-12 row">
              @csrf


            <div class="col-sm-8" style="padding: 0px;">
                <input type="text" name="query" class="form-control harma" style="border:1px solid #eee;height: 37px;border-radius: 3px!important;border-top-left-radius: 0px!important;border-bottom-left-radius: 0px!important;z-index: 11;position: relative;" placeholder="ابحث عن شئ معين ..">
            </div>
            <div class="col-sm-2" style="padding: 0px;">
                 <select class="form-control" name="category"  style="border:1px solid #eee;height: 37px;position: relative;right: -1px;border-left: none;border-right: none;color: #bbb">
                    <option value="clients">عملاء</option>
                    <option value="employees">موظفين</option>
                    <option value="contracts">عقود العائلات</option>
                    <option value="categories">الأقسام</option>
                    <option value="cachers">الخزينه</option>
                    <option value="sanads">سند</option>
                    <option value="suppliers">الموردين</option>
                    <option value="warehouses">المخازن</option>
                    <option value="tasm">انواع الضرائب</option>
                    <option value="unit_of_measurements">وحدات التخزين</option>
                </select>
            </div>
            <div class="col-sm-2" style="padding: 0px;">
                  <button type="submit" style="display: inline-block;width: 50%;position: relative;right: -1px;border-top-left-radius: 3px!important; padding: 0;border: none">
                        <span style="display: inline-block;height: 37px;background: var(--orange-color);border-radius: 0px;color: #fff;padding: 9px 0px;width: 100%;display: inline-block; border-top-left-radius: 3px!important;border-bottom-left-radius: 3px!important" class="text-center hover-focus-a">
                            <span class="fa fa-search"></span>
                        </span>
                    </button>
            </div>


             </form> -->
        </div>

        <div class="col-sm-11 col-11 col-md-6" style="direction: unset;text-align: left;padding: 0px;padding-left: 6px;">
            <div style="display: inline-block;height: 55px;width: 55px; padding: 4px;padding-top: 10px;cursor: pointer;" id="fullscreen">
                <span class="fas fa-desktop" style="color:var(--orange-color);font-size: 18px;position: relative;top: 3px;padding: 4px;left: 4px"></span>
            </div>













            {{--
                      <div class="dropdown" style="display: inline-block;height: 55px;width: 55px; padding: 6px;">
                            <img src="https://img.icons8.com/color/1600/circled-user-male-skin-type-1-2.png" style="width: 100%;display: inline-block;max-width: 45px;max-height: 45px;border:2px solid #f1f1f1;border-radius: 50%;cursor: pointer;" class="dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu1" style="right: unset;left: -62px;min-width: 397px;box-shadow: none;border-radius: 0px;border:1px solid #e8eaed; padding: 10px;box-shadow: 0 6px 12px rgba(0,0,0,0.175);top:5px!important">
                                  <div class="col-md-12  calculator row" align="center">
                                    <div class="row displayBox">
                                      <p class="displayText" id="display">0</p>
                                    </div>
                                    <div class="row numberPad">
                                      <div class="col-md-9 row">
                                        <div class="row">
                                          <button class="btn clear hvr-back-pulse" id="clear">C</button>
                                          <button class="btn btn-calc hvr-radial-out" id="sqrt">√</button>
                                          <button class="btn btn-calc hvr-radial-out hvr-radial-out" id="square">x<sup>2</sup></button>
                                        </div>
                                        <div class="row">
                                          <button class="btn btn-calc hvr-radial-out" id="seven">7</button>
                                          <button class="btn btn-calc hvr-radial-out" id="eight">8</button>
                                          <button class="btn btn-calc hvr-radial-out" id="nine">9</button>
                                        </div>
                                        <div class="row">
                                          <button class="btn btn-calc hvr-radial-out" id="four">4</button>
                                          <button class="btn btn-calc hvr-radial-out" id="five">5</button>
                                          <button class="btn btn-calc hvr-radial-out" id="six">6</button>
                                        </div>
                                        <div class="row">
                                          <button class="btn btn-calc hvr-radial-out" id="one">1</button>
                                          <button class="btn btn-calc hvr-radial-out" id="two">2</button>
                                          <button class="btn btn-calc hvr-radial-out" id="three">3</button>
                                        </div>
                                        <div class="row">
                                          <button class="btn btn-calc hvr-radial-out" id="plus_minus">&#177;</button>
                                          <button class="btn btn-calc hvr-radial-out" id="zero">0</button>
                                          <button class="btn btn-calc hvr-radial-out" id="decimal">.</button>
                                        </div>
                                      </div>
                                      <div class="col-md-3 row operationSide">
                                        <button id="divide" class="btn btn-operation hvr-fade">÷</button>
                                        <button id="multiply" class="btn btn-operation hvr-fade">×</button>
                                        <button id="subtract" class="btn btn-operation hvr-fade">−</button>
                                        <button id="add" class="btn btn-operation hvr-fade">+</button>
                                        <button id="equals" class="btn btn-operation equals hvr-back-pulse">=</button>
                                      </div>
                                    </div>
                                  </div>

                            </div>
                        </div>
             --}}





            <div class="dropdown " style="display: inline-block;height: 55px;width: 55px; padding: 6px;position: relative;">



                @php
                 $notifications = auth()->user()->unreadNotifications()->orderBy('created_at','desc')->get()->toArray();
                 @endphp

                @if(count($notifications) > 0)
                    <span style="display: flex;justify-content:center;align-items: center;padding: 2px; background-color: #E5646E;color: white;width: 17px;height: 17px;border-radius: 50%;position: fixed;top: 0px;"   id="notificationIndecator"> </span>
                @endif

                <img src="/system_images/bell.svg" style="width: 100%;display: inline-block;max-width: 45px;max-height: 45px;border:2px solid #f1f1f1;border-radius: 50%;cursor: pointer;padding: 5px;" class="dropdown-toggle" type="button" data-toggle="dropdown" id="bellNotification"  aria-haspopup="true"  aria-expanded="false">


                <div class="dropdown-menu " aria-labelledby="bellNotification" style="right: unset;left: -119px;min-width: 320px;box-shadow: none;border-radius: 0px;border:1px solid #e8eaed; padding: 3px 0px 0px;box-shadow: 0 6px 12px rgba(0,0,0,0.175);height: 263px;top:5px!important" >



                    <div class="col-sm-12 notifications-scroll row" style="height: 220px;overflow: auto;padding: 0px; " id="notificationContainer">

                        @if(count($notifications) > 0)
                        <div class="col-12 py-4">


                            @foreach($notifications as $not)
                            <a href="{{route('establishments.edit',  $not['data']['stablishment_id']  )   }}" style="border-bottom: 1px solid #ddd;display: block;">
                                <div class="col-12 py-2 notifications-scroll " style=" cursor: pointer;">
                                    <h6 style="color: #666">تم اضافة جهة  {{$not['data']['name']}} </h6>
                                    <h6 style="color: #888">رقم الهاتف : {{$not['data']['mobile']}}</h6>
                                    <h6 style="color: #aaa">تاريخ الاضافة : {{ Carbon\Carbon::parse($not['data']['created_at']['date'])->diffForHumans() }}</h6>
                                </div>
                            </a>
                            @endforeach

                        </div>
                        @endif
                        @if(count($notifications) <= 0)
                            <div class="col-sm-12 notifications-hover row" style="display: flex;justify-content: center;align-items: center; height: 100%">
                                 <div style="padding: 10px 0px">لا يوجد اشعارات غير مقرؤة</div>
                             </div>
                        @endif


                    </div>

                    <div style="height: 40px; padding: 7px 0px " class="col-sm-12 row">

                      <!--   <div class="col-sm-8 row" style="color: #919191">
                            <a href="/notifications">
                                عرض كل الاشعارات
                            </a>
                        </div> -->
                        @if(count($notifications) > 0)
                        <div class="col-sm-4 row">
                            <a href="{{ route('markAsRead') }}">
                                <div style="height: 35px; padding: 7px 0px;width: 200px;margin-bottom: 10px;cursor: pointer;position: relative;top: -3px;color: #919191">
                                    <span class="fa fa-check" style="padding: 3px  ;color: #fff;border-radius: 50%;background: var(--orange-color);font-size: 11px"></span>
                                    مقروءة
                                </div>
                            </a>
                        </div>
                        @endif


                    </div>


                </div>
            </div>


            <div class="dropdown" style="display: inline-block;height: 55px;width: 55px; padding: 6px;">
                <img src="https://img.icons8.com/color/1600/circled-user-male-skin-type-1-2.png" style="width: 100%;display: inline-block;max-width: 45px;max-height: 45px;border:2px solid #f1f1f1;border-radius: 50%;cursor: pointer;" class="dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                <div class="dropdown-menu" aria-labelledby="dropdownMenu1" style="right: unset;left: -62px;min-width: 200px;box-shadow: none;border-radius: 0px;border:1px solid #e8eaed; padding: 10px;box-shadow: 0 6px 12px rgba(0,0,0,0.175);top:5px!important">
                    <div style="cursor: pointer;padding: 5px 8px" onmouseover="$(this).css('background','#eee')" onmouseout="$(this).css('background','#fff')" data-toggle="modal" data-target=".bs-example-modal-lg" >تغيير كلمة المرور</div>
                    <div style="cursor: pointer;padding: 5px 8px" onmouseover="$(this).css('background','#eee')" onmouseout="$(this).css('background','#fff')"   >
                        <a  href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();" style="display: block;">تسجيل خروج</a>
                    </div>



                </div>
            </div>




            <div style="display: inline-block;height: 55px;width: 55px; padding-top: 10px;cursor: pointer;background:var(--orange-color);left: -6px;top: -2px;position: relative;"   class="text-center">
                <span class="fas fa-sign-out-alt" style="color:#3892ff;font-size: 18px;position: relative;top: 3px;padding: 4px;color: #fff;display: inline-block;transform: rotate(180deg);left: -2px;">

                </span>
            </div>
        </div>


    </div>




    <div class="col-sm-12">

    </div>
</div>



    <div class="right-nav animate-navs" style=" background: #212121;z-index: 11; ">
            <div class="col-sm-12 prog-tittle hidden-sm row" style="padding:  0px 0px;height: 60px;overflow: hidden;background: #141414!important ">
                <div class="col-sm-12" style=" padding: 0px;">
                    <div class="text-center" style="padding: 10px ;width: 25%;display: inline-block;float: right; ">
                        <img src="https://www.marienville-fire.com/wp-content/uploads/2019/05/donation_thumbnail.jpg" style="width: 100%;display: inline-block;max-width: 45px;max-height: 45px;width: 45px;">
                    </div>
                    <div class="text-right" style="display: inline-block;   padding:20px 10px;height: 70px;float: right;">
                        <h5 style="margin: 0px;color: #f1f1f1" class="prog-tittle-name">ادارة   المستقطعات</h5>
                    </div>
                </div>
            </div>



            <div class="col-sm-12 dn d-none d-md-block" style="padding: 20px 0px ; overflow: hidden;background: #1b1b1b;padding-bottom: 25px;">
                <div class="col-sm-12">
                    <div class="text-left" style="padding: 10px ;width: 30%;display: inline-block;float: right; ">
                        <img src="https://img.icons8.com/color/1600/circled-user-male-skin-type-1-2.png" style="width: 100%;display: inline-block;max-width: 45px;max-height: 45px;border:2px solid #f1f1f1;border-radius: 50%">
                    </div>
                    <div class="text-right" style="display: inline-block;width: 70%;float: right; padding:10px 3px;">
                        <div class="col-sm-12 prog-tittle-name" style="padding: 0px">
                            <h6 style="margin: 0px; padding: 5px ;color: #c3c393">

                            </h6>
                        </div>
                        <div class="col-sm-12 prog-tittle-name" style="color: var(--orange-color);padding-right: 5px;">
                            <h6 style="margin: 0px; padding: 5px ;color: #f1f1f1;font-size: 14px">{{ auth()->user()->name }}</h6>
                            @if(auth()->user()->hasRole('super_admin'))
                                ادمن
                            @elseif(auth()->user()->hasRole('admin'))
                                ادمن موظف
                            @elseif(auth()->user()->hasRole('user'))
                                جهه
                            @endif
                        </div>
                    </div>
                </div>
            </div>






            <div class="col-sm-12 hidden-sm" style="padding: 15px 0px ;">
                <h6 style="color: #fff;padding: 0px 12% 0px 0px ">لوحة التحكم</h6>
            </div>



        <div class="col-sm-12 right-nav-menus" style="padding: 0px;overflow: auto;background: #212121 ">


            <div class="col-sm-12" style="padding:0px 2px;">
                <div style="padding: 0px;list-style: none;">
                    <div class="col-sm-12 text-center-nav node " style="padding: 0px;position: relative;">
                        <a href="/" style="display: block;">
                            <div class="col-sm-12 open-nav-menu">
                                <span class="fa fa-home text-center-nav  padding-0-nav" style="color: #f1f1f1;display: inline-block;"></span>
                                <h4 style="color: #fff;padding: 2px 20px 10px 0px;display: inline-block;font-size: 14px;" class="text-center-nav  padding-0-nav">الرئيسية <span class="fa fa-check hic" style="padding: 3px 3px;border-radius: 50%;border:1px solid #99efff!important;font-size: 12px;margin-right: 6px;color: #99efff"></span></h4>
                            </div>
                        </a>
                    </div>
                </div>
            </div>


        {{--     <div class="col-sm-12 hidden-sm" style="padding: 15px 0px ;">
                <h6 style="color: #fff;padding: 0px 12% 0px 0px ">الاعدادات</h6>
            </div>
 --}}



            @permission('read-admin')
            <div class="col-sm-12" style="padding:0px 2px;">
                <div style="padding: 0px;list-style: none;">
                    <div class="col-sm-12 text-center-nav node " style="padding: 0px;position: relative;">
                        <a href="{{route('admins')}}" style="display: block;">
                            <div class="col-sm-12 open-nav-menu">
                                <span class="fa fa-users text-center-nav  padding-0-nav" style="color: #f1f1f1;display: inline-block;"></span>
                                <h4 style="color: #fff;padding: 2px 20px 10px 0px;display: inline-block;font-size: 14px;" class="text-center-nav  padding-0-nav">الأدمن</h4>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            @endpermission

            @role(['super_admin', 'admin'])
            <div class="col-sm-12" style="padding:0px 2px;">
                <div style="padding: 0px;list-style: none;">
                    <div class="col-sm-12 text-center-nav node " style="padding: 0px;position: relative;">
                        <a href="{{ route('systemFees') }}" style="display: block;">
                            <div class="col-sm-12 open-nav-menu">
                                <span class="fa fa-dollar-sign text-center-nav  padding-0-nav" style="color: #f1f1f1;display: inline-block;"></span>
                                <h4 style="color: #fff;padding: 2px 20px 10px 0px;display: inline-block;font-size: 14px;" class="text-center-nav  padding-0-nav">مستحقات المنصة</h4>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            @endrole

            @permission('read-user')
            <div class="col-sm-12" style="padding:0px 2px;">
                <div style="padding: 0px;list-style: none;">
                    <div class="col-sm-12 text-center-nav node " style="padding: 0px;position: relative;">
                        <a href="{{route('users')}}" style="display: block;">
                            <div class="col-sm-12 open-nav-menu">
                                <span class="fa fa-users text-center-nav  padding-0-nav" style="color: #f1f1f1;display: inline-block;"></span>
                                <h4 style="color: #fff;padding: 2px 20px 10px 0px;display: inline-block;font-size: 14px;" class="text-center-nav  padding-0-nav">الموظفين</h4>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            @endpermission

            @permission('read-bank')
            <div class="col-sm-12" style="padding:0px 2px;">
                <div style="padding: 0px;list-style: none;">
                    <div class="col-sm-12 text-center-nav node " style="padding: 0px;position: relative;">
                        <a href="{{route('banks.index')}}" style="display: block;">
                            <div class="col-sm-12 open-nav-menu">
                                <span class="fa fa-university text-center-nav  padding-0-nav" style="color: #f1f1f1;display: inline-block;"></span>
                                <h4 style="color: #fff;padding: 2px 20px 10px 0px;display: inline-block;font-size: 14px;" class="text-center-nav  padding-0-nav">البنوك</h4>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            @endpermission

            @permission('read-bankAccount')
            <div class="col-sm-12" style="padding:0px 2px;">
                <div style="padding: 0px;list-style: none;">
                    <div class="col-sm-12 text-center-nav node " style="padding: 0px;position: relative;">
                        <a href="{{route('bank-accounts.index')}}" style="display: block;">
                            <div class="col-sm-12 open-nav-menu">
                                <span class="fa fa-piggy-bank text-center-nav  padding-0-nav" style="color: #f1f1f1;display: inline-block;"></span>
                                <h4 style="color: #fff;padding: 2px 20px 10px 0px;display: inline-block;font-size: 14px;" class="text-center-nav  padding-0-nav">الحسابات البنكية</h4>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            @endpermission

            @permission('read-administrativeArea')
            <div class="col-sm-12" style="padding:0px 2px;">
                <div style="padding: 0px;list-style: none;">
                    <div class="col-sm-12 text-center-nav node " style="padding: 0px;position: relative;">
                        <a href="{{route('administrative-areas.index')}}">
                            <div class="col-sm-12 open-nav-menu">
                                <span class="fa fa-location-arrow text-center-nav  padding-0-nav" style="color: #f1f1f1;display: inline-block;"></span>
                                <h4 style="color: #fff;padding: 2px 20px 10px 0px;display: inline-block;font-size: 14px;" class="text-center-nav  padding-0-nav">
                                    المناطق الأدارية <span class="fa fa-check hic" style="padding: 3px 3px;border-radius: 50%;border:1px solid #99efff!important;font-size: 12px;margin-right: 6px;color: #99efff"></span>
                                </h4>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            @endpermission

            @role(['super_admin', 'admin'])
            <div class="col-sm-12" style="padding:0px 2px;">
                <div style="padding: 0px;list-style: none;">
                    <div class="col-sm-12 text-center-nav node " style="padding: 0px;position: relative;">
                        <a href="{{ route('establishments.index') }}">
                            <div class="col-sm-12 open-nav-menu">
                                <span class="fa fa-suitcase text-center-nav  padding-0-nav" style="color: #f1f1f1;display: inline-block;"></span>
                                <h4 style="color: #fff;padding: 2px 20px 10px 0px;display: inline-block;font-size: 14px;" class="text-center-nav padding-0-nav">الجهات <span class="fa fa-check hic" style="padding: 3px 3px;border-radius: 50%;border:1px solid #99efff!important;font-size: 12px;margin-right: 6px;color: #99efff"></span></h4>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-sm-12" style="padding:0px 2px;">
                <div style="padding: 0px;list-style: none;">
                    <div class="col-sm-12 text-center-nav node " style="padding: 0px;position: relative;">
                        <a href="{{ route('unapproved-establishments') }}">
                            <div class="col-sm-12 open-nav-menu">
                                <span class="fa fa-suitcase text-center-nav  padding-0-nav" style="color: #f1f1f1;display: inline-block;"></span>
                                <h4 style="color: #fff;padding: 2px 20px 10px 0px;display: inline-block;font-size: 14px;" class="text-center-nav padding-0-nav">الجهات الجديدة<span class="fa fa-check hic" style="padding: 3px 3px;border-radius: 50%;border:1px solid #99efff!important;font-size: 12px;margin-right: 6px;color: #99efff"></span></h4>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            @endrole


            @permission('read-establishmentType')
            <div class="col-sm-12" style="padding:0px 2px;">
                <div style="padding: 0px;list-style: none;">
                    <div class="col-sm-12 text-center-nav node " style="padding: 0px;position: relative;">
                        <a href="{{route('establishment-types.index')}}">
                            <div class="col-sm-12 open-nav-menu">
                                <span class="fa fa-code-branch text-center-nav  padding-0-nav" style="color: #f1f1f1;display: inline-block;"></span>
                                <h4 style="color: #fff;padding: 2px 20px 10px 0px;display: inline-block;font-size: 14px;" class="text-center-nav  padding-0-nav">
                                    انواع الجهات <span class="fa fa-check hic" style="padding: 3px 3px;border-radius: 50%;border:1px solid #99efff!important;font-size: 12px;margin-right: 6px;color: #99efff"></span>
                                </h4>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            @endpermission



            @permission('contractTerm')
            <div class="col-sm-12" style="padding:0px 2px;">
                <div style="padding: 0px;list-style: none;">
                    <div class="col-sm-12 text-center-nav node " style="padding: 0px;position: relative;">
                        <a href="{{route('contract-terms.index')}}">
                            <div class="col-sm-12 open-nav-menu">
                                <span class="fa fa-file text-center-nav  padding-0-nav" style="color: #f1f1f1;display: inline-block;"></span>
                                <h4 style="color: #fff;padding: 2px 20px 10px 0px;display: inline-block;font-size: 14px;" class="text-center-nav  padding-0-nav">بنود العقد</h4>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            @endpermission





            @if(auth()->user()->hasRole('user') && auth()->user()->can('read-branch'))
            <div class="col-sm-12" style="padding:0px 2px;">
                <div style="padding: 0px;list-style: none;">
                    <div class="col-sm-12 text-center-nav node " style="padding: 0px;position: relative;">
                        <a href="{{route('branches.index')}}">
                            <div class="col-sm-12 open-nav-menu">
                                <span class="fa fa-code-branch text-center-nav  padding-0-nav" style="color: #f1f1f1;display: inline-block;"></span>
                                <h4 style="color: #fff;padding: 2px 20px 10px 0px;display: inline-block;font-size: 14px;" class="text-center-nav  padding-0-nav">الفروع <span class="fa fa-check hic" style="padding: 3px 3px;border-radius: 50%;border:1px solid #99efff!important;font-size: 12px;margin-right: 6px;color: #99efff"></span></h4>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            @endif

            @permission('read-interval')
            <div class="col-sm-12" style="padding:0px 2px;">
                <div style="padding: 0px;list-style: none;">
                    <div class="col-sm-12 text-center-nav node " style="padding: 0px;position: relative;">
                        <a href="{{route('intervals.index')}}">
                            <div class="col-sm-12 open-nav-menu">
                                <span class="fa fa-clock text-center-nav  padding-0-nav" style="color: #f1f1f1;display: inline-block;"></span>
                                <h4 style="color: #fff;padding: 2px 20px 10px 0px;display: inline-block;font-size: 14px;" class="text-center-nav  padding-0-nav">الفترات</h4>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            @endpermission

            @permission('read-donor')
            <div class="col-sm-12" style="padding:0px 2px;">
                <div style="padding: 0px;list-style: none;">
                    <div class="col-sm-12 text-center-nav node " style="padding: 0px;position: relative;">
                        <a href="{{ route('donors.index') }}">
                            <div class="col-sm-12 open-nav-menu">
                                <span class="fa fa-hands-usd text-center-nav  padding-0-nav" style="color: #f1f1f1;display: inline-block;"></span>
                                <h4 style="color: #fff;padding: 2px 20px 10px 0px;display: inline-block;font-size: 14px;" class="text-center-nav  padding-0-nav">المتبرعين  <span class="fa fa-check hic" style="padding: 3px 3px;border-radius: 50%;border:1px solid #99efff!important;font-size: 12px;margin-right: 6px;color: #99efff"></span></h4>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            @endpermission

            @permission('read-donor')
            <div class="col-sm-12" style="padding:0px 2px;">
                <div style="padding: 0px;list-style: none;">
                    <div class="col-sm-12 text-center-nav node " style="padding: 0px;position: relative;">
                        <a href="{{ route('unapproved-donors') }}">
                            <div class="col-sm-12 open-nav-menu">
                                <span class="fa fa-hands-usd text-center-nav  padding-0-nav" style="color: #f1f1f1;display: inline-block;"></span>
                                <h4 style="color: #fff;padding: 2px 20px 10px 0px;display: inline-block;font-size: 14px;" class="text-center-nav  padding-0-nav">المتبرعين الجدد <span class="fa fa-check hic" style="padding: 3px 3px;border-radius: 50%;border:1px solid #99efff!important;font-size: 12px;margin-right: 6px;color: #99efff"></span></h4>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            @endpermission



            @permission('read-contract')
            @if(auth()->user()->hasRole(['super_admin', 'admin']))
            <div class="col-sm-12" style="padding:0px 2px;">
                <div style="padding: 0px;list-style: none;">
                    <div class="col-sm-12 text-center-nav node " style="padding: 0px;position: relative;">
                        <a href="{{ route('contracts') }}">
                            <div class="col-sm-12 open-nav-menu">
                                <span class="fa fa-file-alt text-center-nav  padding-0-nav" style="color: #f1f1f1;display: inline-block;"></span>
                                <h4 style="color: #fff;padding: 2px 20px 10px 0px;display: inline-block;font-size: 14px;" class="text-center-nav  padding-0-nav">
                                    العقود
{{--                                    @else--}}
{{--                                    العقد--}}


                                    <span class="fa fa-check hic" style="padding: 3px 3px;border-radius: 50%;border:1px solid #99efff!important;font-size: 12px;margin-right: 6px;color: #99efff"></span>
                                </h4>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            @endif
            @endpermission

            @permission('read-contractTerm')
            <div class="col-sm-12" style="padding:0px 2px;">
                <div style="padding: 0px;list-style: none;">
                    <div class="col-sm-12 text-center-nav node " style="padding: 0px;position: relative;">
                        <a href="{{ route('contract-terms.index') }}">
                            <div class="col-sm-12 open-nav-menu">
                                <span class="fa fa-file-alt text-center-nav  padding-0-nav" style="color: #f1f1f1;display: inline-block;"></span>
                                <h4 style="color: #fff;padding: 2px 20px 10px 0px;display: inline-block;font-size: 14px;" class="text-center-nav  padding-0-nav">بنود العقد <span class="fa fa-check hic" style="padding: 3px 3px;border-radius: 50%;border:1px solid #99efff!important;font-size: 12px;margin-right: 6px;color: #99efff"></span></h4>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            @endpermission

            @role(['super_admin', 'admin'])
            <div class="col-sm-12" style="padding:0px 2px;">
                <div style="padding: 0px;list-style: none;">
                    <div class="col-sm-12 text-center-nav node " style="padding: 0px;position: relative;">
                        <a href="{{ route('sms-providers.index') }}">
                            <div class="col-sm-12 open-nav-menu">
                                <span class="fa fa-envelope text-center-nav  padding-0-nav" style="color: #f1f1f1;display: inline-block;"></span>
                                <h4 style="color: #fff;padding: 2px 20px 10px 0px;display: inline-block;font-size: 14px;" class="text-center-nav padding-0-nav">مقدمين خدمة SMS<span class="fa fa-check hic" style="padding: 3px 3px;border-radius: 50%;border:1px solid #99efff!important;font-size: 12px;margin-right: 6px;color: #99efff"></span></h4>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            @endrole

            @permission('read-operation')
            <div class="col-sm-12" style="padding:0px 2px;">
                <div style="padding: 0px;list-style: none;">
                    <div class="col-sm-12 text-center-nav node " style="padding: 0px;position: relative;">
                        <a href="{{ route('operations.create') }}">
                            <div class="col-sm-12 open-nav-menu">
                                <span class="fa fa-money-check-edit-alt text-center-nav  padding-0-nav" style="color: #f1f1f1;display: inline-block;"></span>
                                <h4 style="color: #fff;padding: 2px 20px 10px 0px;display: inline-block;font-size: 14px;" class="text-center-nav  padding-0-nav">إدخال عملية يدوية <span class="fa fa-check hic" style="padding: 3px 3px;border-radius: 50%;border:1px solid #99efff!important;font-size: 12px;margin-right: 6px;color: #99efff"></span></h4>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-sm-12" style="padding:0px 2px;">
                <div style="padding: 0px;list-style: none;">
                    <div class="col-sm-12 text-center-nav node " style="padding: 0px;position: relative;">
                        <a href="{{ route('operations.createAuto') }}">
                            <div class="col-sm-12 open-nav-menu">
                                <span class="fa fa-money-check-edit-alt text-center-nav  padding-0-nav" style="color: #f1f1f1;display: inline-block;"></span>
                                <h4 style="color: #fff;padding: 2px 20px 10px 0px;display: inline-block;font-size: 14px;" class="text-center-nav  padding-0-nav">إدخال عملية اليه <span class="fa fa-check hic" style="padding: 3px 3px;border-radius: 50%;border:1px solid #99efff!important;font-size: 12px;margin-right: 6px;color: #99efff"></span></h4>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            @endpermission





            @permission('read-sanad')
            <div class="col-xs-12" style="padding:0px 2px;">
                <div style="padding: 0px;list-style: none;">
                    <div class="col-xs-12 text-center-nav node " style="padding: 0px;position: relative;">
                        <div class="col-xs-12 open-nav-menu">
                            <span class="fa fa-sticky-note text-center-nav  padding-0-nav" style="color: #f1f1f1;display: inline-block;"></span>
                            <h4 style="color: #fff;padding: 2px 20px 10px 0px;display: inline-block;font-size: 14px;" class="text-center-nav  padding-0-nav">السنادات</h4>
                        </div>
                        <div class="col-xs-12 sub-menu" style="">
                            <ul>
                                <li style="color: #f1f1f1"><a href="{{ route('sanads.createDonorSanads') }}">سنادات تسجيل المتبرعين</a></li>
                                <li style="color: #f1f1f1"><a href="{{ route('sanads.destroyDonorSanads') }}">سنادات إيقاف المتبرعين</a></li>
                                <li style="color: #f1f1f1"><a href="{{ route('sanads.IntervalReceivableSanad') }}">سنادات قبض لفتره</a></li>
                                <li style="color: #f1f1f1"><a href="{{ route('sanads.DonorReceivableSanad') }}">سنادات قبض متبرعين</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @endpermission



            @permission('read-report')
             <div class="col-xs-12" style="padding:0px 2px;">
                <div style="padding: 0px;list-style: none;">
                    <div class="col-xs-12 text-center-nav node " style="padding: 0px;position: relative;">
                        <div class="col-xs-12 open-nav-menu">
                            <span class="fa fa-sticky-note text-center-nav  padding-0-nav" style="color: #f1f1f1;display: inline-block;"></span>
                            <h4 style="color: #fff;padding: 2px 20px 10px 0px;display: inline-block;font-size: 14px;" class="text-center-nav  padding-0-nav">التقارير</h4>
                        </div>
                        <div class="col-xs-12 sub-menu" style="">
                            <ul>
                                <li style="color: #f1f1f1"><a href="/reports/succeed-operations">العمليات الناجحة</a></li>
                                <li style="color: #f1f1f1"><a href="/reports/failed-operations">العمليات المتعثرة</a></li>
                                <li style="color: #f1f1f1"><a href="/reports/fixed-interval-init">عمليات محددة بفترة</a></li>
                                <li style="color: #f1f1f1"><a href="/reports/disabled-donors">المتبرعين الموقوفين</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @endpermission

            @if(!auth()->user()->hasRole(['super_admin', 'admin']))
                <div class="col-sm-12" style="padding:0px 2px;">
                    <div style="padding: 0px;list-style: none;">
                        <div class="col-sm-12 text-center-nav node " style="padding: 0px;position: relative;">
                            <a href="{{ route('editSingleEstablishment', auth()->user()->establishment_id) }}">
                                <div class="col-sm-12 open-nav-menu">
                                    <span class="fa fa-cogs text-center-nav  padding-0-nav" style="color: #f1f1f1;display: inline-block;"></span>
                                    <h4 style="color: #fff;padding: 2px 20px 10px 0px;display: inline-block;font-size: 14px;" class="text-center-nav  padding-0-nav">تعديل بيانات الجهة<span class="fa fa-check hic" style="padding: 3px 3px;border-radius: 50%;border:1px solid #99efff!important;font-size: 12px;margin-right: 6px;color: #99efff"></span></h4>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            @endif

            @if(auth()->user()->hasRole(['super_admin', 'admin']))
                <div class="col-sm-12" style="padding:0px 2px;">
                    <div style="padding: 0px;list-style: none;">
                        <div class="col-sm-12 text-center-nav node " style="padding: 0px;position: relative;">
                            <a href="{{ route('privacyPolicy') }}">
                                <div class="col-sm-12 open-nav-menu">
                                    <span class="fa fa-file-alt text-center-nav  padding-0-nav" style="color: #f1f1f1;display: inline-block;"></span>
                                    <h4 style="color: #fff;padding: 2px 20px 10px 0px;display: inline-block;font-size: 14px;" class="text-center-nav  padding-0-nav">الشروط والأحكام<span class="fa fa-check hic" style="padding: 3px 3px;border-radius: 50%;border:1px solid #99efff!important;font-size: 12px;margin-right: 6px;color: #99efff"></span></h4>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            @endif






                <div class="col-sm-12" style="padding:3px 0px;">
                    <div style="padding: 0px;list-style: none;">
                        <div class="col-sm-12 text-center-nav node " style="padding: 0px;position: relative;">
                            <a     href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();" style="color: #333;padding: 3px;display:block;">
                                <div class="col-sm-12 open-nav-menu">
                                    <span class="fa fa-sign-out-alt text-center-nav  padding-0-nav" style="color: #f1f1f1;display: inline-block;"></span>
                                    <h4 style="color: #fff;padding: 2px 20px 10px 0px;display: inline-block;font-size: 14px;" class="text-center-nav  padding-0-nav">تسجيل خروج <span class="fa fa-check hic" style="padding: 3px 3px;border-radius: 50%;border:1px solid #99efff!important;font-size: 12px;margin-right: 6px;color: #99efff"></span> </h4>
                                </div>
                            </a>



                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                                @method('post')
                            </form>


                        </div>
                    </div>
                </div>



                 <div class="col-sm-12" style="padding:0px 2px;">
                    <hr>
                 </div>












              {{--   <div class="col-sm-12" style="padding:0px 2px;">
                    <div style="padding: 0px;list-style: none;">
                        <div class="col-sm-12 text-center-nav node " style="padding: 0px;position: relative;">
                            <a href="#">
                                <div class="col-sm-12 open-nav-menu">
                                    <span class="fa fa-receipt text-center-nav  padding-0-nav" style="color: #f1f1f1;display: inline-block;"></span>
                                    <h4 style="color: #fff;padding: 2px 20px 10px 0px;display: inline-block;font-size: 14px;" class="text-center-nav  padding-0-nav">طلبات الاشتراك</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>








                   <div class="col-sm-12" style="padding:0px 2px;">
                    <div style="padding: 0px;list-style: none;">
                        <div class="col-sm-12 text-center-nav node " style="padding: 0px;position: relative;">
                            <a href="#">
                                <div class="col-sm-12 open-nav-menu">
                                    <span class="fa fa-mail-bulk text-center-nav  padding-0-nav" style="color: #f1f1f1;display: inline-block;"></span>
                                    <h4 style="color: #fff;padding: 2px 20px 10px 0px;display: inline-block;font-size: 14px;" class="text-center-nav  padding-0-nav">الرسائل النصية </h4>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>



                <div class="col-sm-12" style="padding:0px 2px;">
                    <div style="padding: 0px;list-style: none;">
                        <div class="col-sm-12 text-center-nav node " style="padding: 0px;position: relative;">
                            <a href="#">
                                <div class="col-sm-12 open-nav-menu">
                                    <span class="fa fa-bell text-center-nav  padding-0-nav" style="color: #f1f1f1;display: inline-block;"></span>
                                    <h4 style="color: #fff;padding: 2px 20px 10px 0px;display: inline-block;font-size: 14px;" class="text-center-nav  padding-0-nav">
                                        الاشعارات

                                    </h4>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>


            <div class="col-sm-12" style="padding:0px 2px;">
                <div style="padding: 0px;list-style: none;">
                    <div class="col-sm-12 text-center-nav node " style="padding: 0px;position: relative;">
                        <div class="col-sm-12 open-nav-menu">
                            <span class="fa fa-cogs text-center-nav  padding-0-nav" style="color: #f1f1f1;display: inline-block;"></span>
                            <h4 style="color: #fff;padding: 2px 20px 10px 0px;display: inline-block;font-size: 14px;" class="text-center-nav  padding-0-nav">الاعدادات</h4>
                        </div>

                    </div>
                </div>
            </div>
 --}}


         </div>








</div>


<script type="text/javascript">

    $('.right-nav-menus').css('height',$(window).height()-220 +'px');
    setInterval(function(){
        $('.right-nav-menus').css('height',$(window).height()-220 +'px');
    },200);


</script>

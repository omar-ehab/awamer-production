@extends('const.const')
@section('content')

    <div class="col-12  mt-4">

        <div class="col-12 row mt-5" style="overflow: hidden;">
            <div class="col-12 text-center loading-chart pt-5"
                 style="position: absolute; width: 100%; background: rgb(255, 255, 255); height: 700px; z-index: 12444; ">
                <div class="spinner-border mt-5" role="status" style="border-radius: 50%!important;">
                    <span class="sr-only"></span>
                </div>
            </div>

            @role(['super_admin', 'admin'])
            <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                <div class="text-center mt-3 py-4  px-0 row "
                     style="border-radius: 8px!important;box-shadow: 0px 0px 10px #eee;margin: 20px auto">
                    <div class="col-3 text-right px-0">
                        <span class="fad fa-users" style="color: var(--orange-color);font-size: 30px;"></span>
                    </div>
                    <div class="col-9 text-left">
                        <h6 class="my-0 py-0">الادمن</h6>
                        <h6 class="my-0 py-0 mt-2"
                            style="font-size: 16px;letter-spacing: 2px;font-weight: bold;">{{ $adminsCount }}</h6>
                    </div>
                </div>
            </div>


            <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                <div class="text-center mt-3 py-4  px-0 row "
                     style="border-radius: 8px!important;box-shadow: 0px 0px 10px #eee;margin: 20px auto">
                    <div class="col-3 text-right px-0">
                        <span class="fad fa-university" style="color: var(--orange-color);font-size: 30px;"></span>
                    </div>
                    <div class="col-9 text-left">
                        <h6 class="my-0 py-0">البنوك</h6>
                        <h6 class="my-0 py-0 mt-2"
                            style="font-size: 16px;letter-spacing: 2px;font-weight: bold;">{{ $banksCount }}</h6>
                    </div>
                </div>
            </div>


            <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                <div class="text-center mt-3 py-4  px-0 row "
                     style="border-radius: 8px!important;box-shadow: 0px 0px 10px #eee;margin: 20px auto">
                    <div class="col-3 text-right px-0">
                        <span class="fad fa-map-marker-check"
                              style="color: var(--orange-color);font-size: 30px;"></span>
                    </div>
                    <div class="col-9 text-left">
                        <h6 class="my-0 py-0">المناطق الادارية</h6>
                        <h6 class="my-0 py-0 mt-2"
                            style="font-size: 16px;letter-spacing: 2px;font-weight: bold;">{{ $administrativeAreasCount }}</h6>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                <div class="text-center mt-3 py-4  px-0 row "
                     style="border-radius: 8px!important;box-shadow: 0px 0px 10px #eee;margin: 20px auto">
                    <div class="col-3 text-right px-0">
                        <span class="fad fa-code-branch" style="color: var(--orange-color);font-size: 30px;"></span>
                    </div>
                    <div class="col-9 text-left">
                        <h6 class="my-0 py-0">انواع الجهات</h6>
                        <h6 class="my-0 py-0 mt-2"
                            style="font-size: 16px;letter-spacing: 2px;font-weight: bold;">{{ $establishmentTypesCount }}</h6>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                <div class="text-center mt-3 py-4  px-0 row "
                     style="border-radius: 8px!important;box-shadow: 0px 0px 10px #eee;margin: 20px auto">
                    <div class="col-3 text-right px-0">
                        <span class="fad fa-suitcase" style="color: var(--orange-color);font-size: 30px;"></span>
                    </div>
                    <div class="col-9 text-left">
                        <h6 class="my-0 py-0">الجهات</h6>
                        <h6 class="my-0 py-0 mt-2"
                            style="font-size: 16px;letter-spacing: 2px;font-weight: bold;">{{ $establishmentsCount - 1 }}</h6>
                    </div>
                </div>
            </div>
            @endrole

            <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                <div class="text-center mt-3 py-4  px-0 row "
                     style="border-radius: 8px!important;box-shadow: 0px 0px 10px #eee;margin: 20px auto">
                    <div class="col-3 text-right px-0">
                        <span class="fad fa-wallet" style="color: var(--orange-color);font-size: 30px;"></span>
                    </div>
                    <div class="col-9 text-left">
                        <h6 class="my-0 py-0">الحسابات البنكية</h6>
                        <h6 class="my-0 py-0 mt-2"
                            style="font-size: 16px;letter-spacing: 2px;font-weight: bold;">{{ $bankAccountsCount }}</h6>
                    </div>
                </div>
            </div>

            @permission('read-operation')
            <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                <div class="text-center mt-3 py-4  px-0 row "
                     style="border-radius: 8px!important;box-shadow: 0px 0px 10px #eee;margin: 20px auto">
                    <div class="col-3 text-right px-0">
                        <span class="fad fa-wallet" style="color: var(--orange-color);font-size: 30px;"></span>
                    </div>
                    <div class="col-9 text-left">
                        <h6 class="my-0 py-0">عدد العمليات اليدوية</h6>
                        <h6 class="my-0 py-0 mt-2"
                            style="font-size: 16px;letter-spacing: 2px;font-weight: bold;">{{ $manualOperations }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                <div class="text-center mt-3 py-4  px-0 row "
                     style="border-radius: 8px!important;box-shadow: 0px 0px 10px #eee;margin: 20px auto">
                    <div class="col-3 text-right px-0">
                        <span class="fad fa-wallet" style="color: var(--orange-color);font-size: 30px;"></span>
                    </div>
                    <div class="col-9 text-left">
                        <h6 class="my-0 py-0">عدد العمليات الآلية</h6>
                        <h6 class="my-0 py-0 mt-2"
                            style="font-size: 16px;letter-spacing: 2px;font-weight: bold;">{{ $autoOperations }}</h6>
                    </div>
                </div>
            </div>
            @endpermission
            @role(['super_admin', 'admin'])
            <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                <div class="text-center mt-3 py-4  px-0 row "
                     style="border-radius: 8px!important;box-shadow: 0px 0px 10px #eee;margin: 20px auto">
                    <div class="col-3 text-right px-0">
                        <span class="fad fa-clock" style="color: var(--orange-color);font-size: 30px;"></span>
                    </div>
                    <div class="col-9 text-left">
                        <h6 class="my-0 py-0">الفترات</h6>
                        <h6 class="my-0 py-0 mt-2"
                            style="font-size: 16px;letter-spacing: 2px;font-weight: bold;">{{ $intervalsCount }}</h6>
                    </div>
                </div>
            </div>
            @endrole
            <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                <div class="text-center mt-3 py-4  px-0 row "
                     style="border-radius: 8px!important;box-shadow: 0px 0px 10px #eee;margin: 20px auto">
                    <div class="col-3 text-right px-0">
                        <span class="fad fa-hand-holding-usd"
                              style="color: var(--orange-color);font-size: 30px;"></span>
                    </div>
                    <div class="col-9 text-left">
                        <h6 class="my-0 py-0">المتبرعين</h6>
                        <h6 class="my-0 py-0 mt-2" style="font-size: 16px;letter-spacing: 2px;font-weight: bold;">
                            @role(['super_admin', 'admin'])
                            {{ $adminDonorsCount }}
                            @endrole

                            @permission('read-donor')
                            {{ $donorsCount }}
                            @endpermission
                        </h6>
                    </div>
                </div>
            </div>

            @role(['super_admin', 'admin'])
            <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                <div class="text-center mt-3 py-4  px-0 row "
                     style="border-radius: 8px!important;box-shadow: 0px 0px 10px #eee;margin: 20px auto">
                    <div class="col-3 text-right px-0">
                        <span class="fad fa-file-certificate"
                              style="color: var(--orange-color);font-size: 30px;"></span>
                    </div>
                    <div class="col-9 text-left">
                        <h6 class="my-0 py-0">بنود العقود</h6>
                        <h6 class="my-0 py-0 mt-2"
                            style="font-size: 16px;letter-spacing: 2px;font-weight: bold;">{{ $contractTermsCount }}</h6>
                    </div>
                </div>
            </div>
            @endrole
            @permission('read-branch')
            <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                <div class="text-center mt-3 py-4  px-0 row "
                     style="border-radius: 8px!important;box-shadow: 0px 0px 10px #eee;margin: 20px auto">
                    <div class="col-3 text-right px-0">
                        <span class="fad fa-file-certificate"
                              style="color: var(--orange-color);font-size: 30px;"></span>
                    </div>
                    <div class="col-9 text-left">
                        <h6 class="my-0 py-0">عدد الفروع</h6>
                        <h6 class="my-0 py-0 mt-2"
                            style="font-size: 16px;letter-spacing: 2px;font-weight: bold;">{{ $branches }}</h6>
                    </div>
                </div>
            </div>
            @endpermission

        </div>

        <div class="col-12 row">


            <div class="col-12 col-md-7 mt-5 px-3 pt-4  text-center ">
                <div class="col-12 mb-4">


                    <div class="progress" style="height: 7px">
                        <div class="progress-bar  progress-bar-animated  progress-bar-striped bg-warning"
                             role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0"
                             aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="col-12 ">


                    <div class="col-12 row">


                        <div class="col-12 text-center loading-chart pt-5"
                             style="position: absolute; width: 100%; background: rgb(255, 255, 255); height: 700px; z-index: 12444; ">
                            <div class="spinner-border mt-5" role="status" style="border-radius: 50%!important;">
                                <span class="sr-only"></span>
                            </div>
                        </div>

                        @role(['super_admin', 'admin'])
                        <div class="col-12 col-sm-6 col-md-4 col-xl-3 wow bounceInUp">
                            <div class="text-center mt-3 py-4  px-5"
                                 style="border-radius: 8px!important;box-shadow: 0px 0px 10px #eee;margin: 20px auto">
                                <span class="fad fa-users" style="color: var(--orange-color);font-size: 40px;"></span>
                                <br>
                                <h6 class="text-center mt-4">الادمن</h6>
                                <br>
                                <a href="{{ route('admins.create') }}">
                                    <button class="btn btn-warning text-center hover-focus-a"
                                            style="background: var(--orange-color);color: #fff;border-radius: 25px!important">
                                        إضافة
                                    </button>
                                </a>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-4 col-xl-3 wow bounceInUp">
                            <div class="text-center mt-3 py-4  px-5"
                                 style="border-radius: 8px!important;box-shadow: 0px 0px 10px #eee;margin: 20px auto">
                                <span class="fad fa-university"
                                      style="color: var(--orange-color);font-size: 40px;"></span>
                                <br>
                                <h6 class="text-center mt-4">البنوك</h6>
                                <br>
                                <a href="{{ route('banks.create') }}">
                                    <button class="btn btn-warning text-center hover-focus-a"
                                            style="background: var(--orange-color);color: #fff;border-radius: 25px!important">
                                        إضافة
                                    </button>
                                </a>
                            </div>
                        </div>


                        <div class="col-12 col-sm-6 col-md-4 col-xl-3 wow bounceInUp">
                            <div class="text-center mt-3 py-4  px-5"
                                 style="border-radius: 8px!important;box-shadow: 0px 0px 10px #eee;margin: 20px auto">
                                <span class="fad fa-map-marker-check"
                                      style="color: var(--orange-color);font-size: 40px;"></span>
                                <br>
                                <h6 class="text-center mt-4"> المناطق الادارية</h6>
                                <br>
                                <a href="{{ route('administrative-areas.create') }}">
                                    <button class="btn btn-warning text-center hover-focus-a"
                                            style="background: var(--orange-color);color: #fff;border-radius: 25px!important">
                                        إضافة
                                    </button>
                                </a>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-4 col-xl-3 wow bounceInUp">
                            <div class="text-center mt-3 py-4  px-5"
                                 style="border-radius: 8px!important;box-shadow: 0px 0px 10px #eee;margin: 20px auto">
                                <span class="fad fa-suitcase"
                                      style="color: var(--orange-color);font-size: 40px;"></span>
                                <br>
                                <h6 class="text-center mt-4"> الجهات</h6>
                                <br>
                                <a href="{{ route('establishments.create') }}">
                                    <button class="btn btn-warning text-center hover-focus-a"
                                            style="background: var(--orange-color);color: #fff;border-radius: 25px!important">
                                        إضافة
                                    </button>
                                </a>
                            </div>
                        </div>
                        @endrole

                        @role(['super_admin', 'admin'])
                        <div class="col-12 col-sm-6 col-md-4 col-xl-3 wow bounceInUp">
                            <div class="text-center mt-3 py-4  px-5"
                                 style="border-radius: 8px!important;box-shadow: 0px 0px 10px #eee;margin: 20px auto">
                                <span class="fad fa-code-branch"
                                      style="color: var(--orange-color);font-size: 40px;"></span>
                                <br>
                                <h6 class="text-center mt-4"> انواع الجهات</h6>
                                <br>
                                <a href="{{ route('establishment-types.create') }}">
                                    <button class="btn btn-warning text-center hover-focus-a"
                                            style="background: var(--orange-color);color: #fff;border-radius: 25px!important">
                                        إضافة
                                    </button>
                                </a>
                            </div>
                        </div>
                        @endrole

                        <div class="col-12 col-sm-6 col-md-4 col-xl-3 wow bounceInUp">
                            <div class="text-center mt-3 py-4  px-5"
                                 style="border-radius: 8px!important;box-shadow: 0px 0px 10px #eee;margin: 20px auto">
                                <span class="fad fa-wallet" style="color: var(--orange-color);font-size: 40px;"></span>
                                <br>
                                <h6 class="text-center mt-4">الحسابات البنكية</h6>
                                <br>
                                <a href="{{ route('bank-accounts.create') }}">
                                    <button class="btn btn-warning text-center hover-focus-a"
                                            style="background: var(--orange-color);color: #fff;border-radius: 25px!important">
                                        إضافة
                                    </button>
                                </a>
                            </div>
                        </div>
                        @role(['super_admin', 'admin'])
                        <div class="col-12 col-sm-6 col-md-4 col-xl-3 wow bounceInUp">
                            <div class="text-center mt-3 py-4  px-5"
                                 style="border-radius: 8px!important;box-shadow: 0px 0px 10px #eee;margin: 20px auto">
                                <span class="fad fa-clock" style="color: var(--orange-color);font-size: 40px;"></span>
                                <br>
                                <h6 class="text-center mt-4"> الفترات</h6>
                                <br>
                                <a href="{{ route('intervals.create') }}">
                                    <button class="btn btn-warning text-center hover-focus-a"
                                            style="background: var(--orange-color);color: #fff;border-radius: 25px!important">
                                        إضافة
                                    </button>
                                </a>
                            </div>
                        </div>
                        @endrole

                        @permission('read-donor')
                        <div class="col-12 col-sm-6 col-md-4 col-xl-3 wow bounceInUp">
                            <div class="text-center mt-3 py-4  px-5"
                                 style="border-radius: 8px!important;box-shadow: 0px 0px 10px #eee;margin: 20px auto">
                                <span class="fad fa-hand-holding-usd"
                                      style="color: var(--orange-color);font-size: 40px;"></span>
                                <br>
                                <h6 class="text-center mt-4"> المتبرعين</h6>
                                <br>
                                <a href="{{ route('donors.create') }}">
                                    <button class="btn btn-warning text-center hover-focus-a"
                                            style="background: var(--orange-color);color: #fff;border-radius: 25px!important">
                                        إضافة
                                    </button>
                                </a>
                            </div>
                        </div>
                        @endpermission


                        @role(['super_admin', 'admin'])
                        <div class="col-12 col-sm-6 col-md-4 col-xl-3 wow bounceInUp">
                            <div class="text-center mt-3 py-4  px-5"
                                 style="border-radius: 8px!important;box-shadow: 0px 0px 10px #eee;margin: 20px auto">
                                <span class="fad fa-file-certificate"
                                      style="color: var(--orange-color);font-size: 40px;"></span>
                                <br>
                                <h6 class="text-center mt-4"> بنود العقود</h6>
                                <br>
                                <a href="{{ route('contract-terms.create') }}">
                                    <button class="btn btn-warning text-center hover-focus-a"
                                            style="background: var(--orange-color);color: #fff;border-radius: 25px!important">
                                        إضافة
                                    </button>
                                </a>
                            </div>
                        </div>
                        @endrole
                        <div class="col-12 col-sm-6 col-md-4 col-xl-3 wow bounceInUp">
                            <div class="text-center mt-3 py-4  px-5"
                                 style="border-radius: 8px!important;box-shadow: 0px 0px 10px #eee;margin: 20px auto">
                                <span class="fad fa-file-pdf"
                                      style="color: var(--orange-color);font-size: 40px;"></span>
                                <br>
                                <h6 class="text-center mt-4">سنادات تسجيل المتبرعين</h6>
                                <br>
                                <a href="{{ route('sanads.createDonorSanads') }}">
                                    <button class="btn btn-info text-center hover-focus-a"
                                            style="color: #fff;border-radius: 25px!important">عرض
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-xl-3 wow bounceInUp">
                            <div class="text-center mt-3 py-4  px-5"
                                 style="border-radius: 8px!important;box-shadow: 0px 0px 10px #eee;margin: 20px auto">
                                <span class="fad fa-file-pdf"
                                      style="color: var(--orange-color);font-size: 40px;"></span>
                                <br>
                                <h6 class="text-center mt-4">سنادات إيقاف المتبرعين</h6>
                                <br>
                                <a href="{{ route('sanads.destroyDonorSanads') }}">
                                    <button class="btn btn-info text-center hover-focus-a"
                                            style="color: #fff;border-radius: 25px!important">عرض
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-xl-3 wow bounceInUp">
                            <div class="text-center mt-3 py-4  px-5"
                                 style="border-radius: 8px!important;box-shadow: 0px 0px 10px #eee;margin: 20px auto">
                                <span class="fad fa-file-pdf"
                                      style="color: var(--orange-color);font-size: 40px;"></span>
                                <br>
                                <h6 class="text-center mt-4">سنادات قبض لفتره</h6>
                                <br>
                                <a href="{{ route('sanads.IntervalReceivableSanad') }}">
                                    <button class="btn btn-info text-center hover-focus-a"
                                            style="color: #fff;border-radius: 25px!important">عرض
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-xl-3 wow bounceInUp">
                            <div class="text-center mt-3 py-4  px-5"
                                 style="border-radius: 8px!important;box-shadow: 0px 0px 10px #eee;margin: 20px auto">
                                <span class="fad fa-file-pdf"
                                      style="color: var(--orange-color);font-size: 40px;"></span>
                                <br>
                                <h6 class="text-center mt-4">سنادات قبض متبرعين</h6>
                                <br>
                                <a href="{{ route('sanads.DonorReceivableSanad') }}">
                                    <button class="btn btn-info text-center hover-focus-a"
                                            style="color: #fff;border-radius: 25px!important">عرض
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <div class="col-12 col-md-5 my-4 px-3 ">
                <div style="background: #fff;padding: 0px;/*box-shadow: 0px 0px 12px #eee;*/overflow: hidden; "
                     class="col-12 row mt-5 pt-4">
                    <div class="col-12 text-center loading-chart"
                         style="position: absolute;width: 100%;background: #fff;height: 700px;z-index:12 ">
                        <div class="spinner-border mt-5" role="status" style="border-radius: 50%!important;">
                            <span class="sr-only"></span>
                        </div>
                    </div>

                    @role(['super_admin', 'admin'])
                    <div class="col-12" style="">
                        <h6 class="cairo text-center">ارباح المنصة آخر 6 اشهر</h6>
                        <canvas id="myChart" style="width: 100%" height="190"></canvas>
                    </div>
                    @endrole


                    @permission('read-donor')
                    <div class="col-12 " style="">
                        <h6 class="cairo text-center">عدد العمليات خلال اخر 6 اشهر</h6>
                        <canvas id="myChart-establishment" style="width: 100%" height="190"></canvas>
                    </div>
                    @endpermission
                </div>
            </div>
            @permission('read-donor')
            <div class="col-12 mb-4">
                <div class="progress" style="height: 7px">
                    <div class="progress-bar  progress-bar-animated  progress-bar-striped bg-warning" role="progressbar"
                         style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                    </div>
                </div>
            </div>
            <div class="d-flex flex-column col-12 align-items-center">
                <div class="d-flex flex-column align-items-center col-12" style="overflow: hidden;">
                    <p style="font-size: 16px;font-weight: bold">قم بالنقر علي الصوره لتحميلها وطباعتها او نشرها ليتمكن
                        المتبرعين من التسجيل online</p>
                    <a href="{{ $qrCode_link }}" target="_blank" class="text-primary">{{ $qrCode_link }}</a>
                    <a class="mt-2" download="Qr Code.png"
                       href="data:image/png;base64, {!! base64_encode(\QrCode::format('png')->size(900)->generate($qrCode_link)) !!} ">
                        <a class="mt-2" download="Qr Code.png"
                           href="data:image/png;base64, {!! base64_encode(\QrCode::format('png')->size(900)->generate($qrCode_link)) !!} "
                           style="max-width: 100%;overflow: hidden;">
                            <img
                                src="data:image/png;base64, {!! base64_encode(\QrCode::format('png')->size(400)->generate($qrCode_link)) !!} "
                                alt="QR Code" class="img-thumbnail" style="max-width: 100%">
                        </a>
                </div>
            </div>
            @endpermission
        </div>
    </div>

    @role(['super_admin', 'admin'])
    <script>

        (function () {
            setTimeout(function () {


                var ctx = document.getElementById('myChart').getContext('2d');

                $.ajax({
                    url: '{{ route('getAdminChart') }}',
                    type: 'get',

                    dataType: 'json',
                    success: function (data) {
                        var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: data.labels,
                                datasets: [{
                                    label: '',
                                    data: data.fees,
                                    backgroundColor: 'rgba(245, 164, 44, 0.7)',
                                    borderColor: 'rgba(245, 164, 44, 0.93)',
                                    pointStyle: 'rect',
                                    lineTension: '.15'
                                }]
                            },
                            options: {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero: false
                                        },
                                    }],
                                    xAxes: [{
                                        gridLines: {
                                            color: "rgba(0, 0, 0, 0)",
                                        }
                                    }],
                                },
                                hover: {
                                    // Overrides the global setting
                                    mode: 'index'
                                },
                                legend: {
                                    labels: {
                                        // This more specific font property overrides the global property

                                        fontFamily: 'Tajawal',
                                        defaultFontFamily: 'Tajawal',
                                    }
                                },
                                elements: {
                                    line: {
                                        tension: 1 // disables bezier curves
                                    }
                                }


                            }
                        });

                        $('.loading-chart').fadeOut('slow');
                    }
                });


            }, 350);
        })();
    </script>
    @endrole


    @permission('read-donor')
    <script>
        (function () {
            setTimeout(function () {
                var ctx_establishment = document.getElementById('myChart-establishment').getContext('2d');
                $.ajax({
                    url: '{{ route('getEstablishmentChart') }}',
                    type: 'get',
                    dataType: 'json',
                    success: function (data) {
                        var myChart = new Chart(ctx_establishment, {
                            type: 'bar',
                            data: {
                                labels: data.labels,
                                datasets: [{
                                    label: '',
                                    data: data.operations,
                                    backgroundColor: 'rgba(245, 164, 44, 0.7)',
                                    borderColor: 'rgba(245, 164, 44, 0.93)',
                                    pointStyle: 'rect',
                                    lineTension: '.15'
                                }]
                            },
                            options: {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero: false
                                        },
                                    }],
                                    xAxes: [{
                                        gridLines: {
                                            color: "rgba(0, 0, 0, 0)",
                                        }
                                    }],
                                },
                                hover: {
                                    // Overrides the global setting
                                    mode: 'index'
                                },
                                legend: {
                                    labels: {
                                        // This more specific font property overrides the global property

                                        fontFamily: 'Tajawal',
                                        defaultFontFamily: 'Tajawal',
                                    }
                                },
                                elements: {
                                    line: {
                                        tension: 1 // disables bezier curves
                                    }
                                }


                            }
                        });

                        $('.loading-chart').fadeOut('slow');
                    }
                });


            }, 350);
        })();
    </script>
    @endpermission



@endsection

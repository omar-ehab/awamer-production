<!DOCTYPE html>
<html dir="rtl" lang="ar"> 
@include('const.head')
<body style="background: #fff;height: 100vh" id="body">
@include('const.style')
<div class="col-sm-12 row" style="padding: 0px;">
@include('const.right-nav')
@include('const.top-nav')
@include('const.alert')
<div class="content pr-250 animate-navs col-sm-12 row" style="padding-left: 0px;margin-top: 0px;">
    @yield('content')
</div>
</div>
@include('const.script')
</body>
</html>

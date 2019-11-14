<!DOCTYPE html>
<html>
<head>
	<title>Application</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


	<!--font awsome-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<!--google font-->
	<link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
	<!--bootstrap-->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-rtl.css">
	<link rel="stylesheet" type="text/css" href="css/table.min.css">
	

	<!--jquery-->
 	<script type="text/javascript" src="js/jquery.js"></script>
</head>
<body style="background: #f1f1f1" id="body"> 

	<style type="text/css">
		*
		{
			font-family: 'Cairo', sans-serif;
			/*transition: all .3s ease-in-out;*/
		}
		.content
		{
			 
			background: #f1f1f1;
			min-height: 1200px;
			 
		}
		.animate-navs
		{
			transition: all .3s ease-in-out;
		}




		/* width */
		::-webkit-scrollbar {
		  width: 0px;

		}

		/* Track */
		::-webkit-scrollbar-track {
		  background: #10233a; 
		}

		/* Handle */
		::-webkit-scrollbar-thumb {
		  background: #10233a; 
		}

		/* Handle on hover */
		::-webkit-scrollbar-thumb:hover {
		  background: #10233a; 
		}

		.small-right-nav .prog-tittle  >div ,.small-right-nav .prog-tittle  >div
		{
			width: 100%!important;
			text-align: center!important;
		}
		.small-right-nav .prog-tittle-name
		{
			display: none;
			transition: all 0s ease-in-out;
		}
		.small-right-nav .dn
		{
			display: none;
		}
		.small-right-nav .text-center-nav
		{
			text-align: center!important;	
		}
		.small-right-nav .padding-0-nav
		{
			padding: 0px!important;
		}
		 
		.small-right-nav  .node div > .fa
		{
			font-size: 18px!important;
			display: block!important;
		}
		.small-right-nav  .node div > h4
		{
			font-size: 13px!important;
			padding: 10px 0px 5px 0px !important;
			 
		}
		.node div > h4
		{
			padding: 5px 12px 5px 0px!important;
			font-size: 14px!important;;
		}
		
		.border-left-right-nav
		{
			border-left: 5px solid #2381c6;
			background: #1a9889;
		}
		.small-right-nav .sub-menu
		{
			right: 90px;
			top: 0px;
			position: absolute;
		}
		.sub-menu
		{
			width: 250px; 
			background: #1f3146;
		 
			padding: 8px 0px;
			display: none;
			text-align: right;
		}
		.sub-menu ul
		{
			list-style: none;
			margin: 0px;
		}
		.sub-menu ul li , .sub-menu ul li a
		{
			color: #f1f1f1;
			text-decoration: none;
			font-size: 13px!important;
		}
		.sub-menu ul li
		{
			transition: all .2s ease-in-out;
		}
		.sub-menu ul li:hover
		{
			padding-right: 5px;
		}
		.open-nav-menu
		{
			padding: 5px 10%;transition: unset;
			cursor: pointer;
		}
		.open-nav-menu h4
		{
			padding: 0px;
			margin: 0px;
		}
		input,select,textarea
		{
			border-radius: 2px!important;
			box-shadow: none!important;
		}
		input:focus,select:focus,textarea:focus
		{
			border:1px solid #23c691!important;
		}
		.focus-right-nav
		{
			background: linear-gradient(#34495e,#34495e),#34495e!important;
			box-shadow: 0px 0px 17px #000;
		}





















		/*table*/
		table.dataTable thead .sorting_asc:after,
		table.dataTable thead .sorting_desc:after,
		table.dataTable thead .sorting:after
		{
			display: none;
		}
		.paginate_button:hover,.paginate_button:focus
		{
			background: transparent!important;
			border:none!important;
		}
		.dataTables_wrapper .dataTables_length
		{
			float:right;
		}
		div.dataTables_wrapper div.dataTables_filter
		{
			float:left;
		}
		.dataTables_wrapper .dataTables_paginate .paginate_button
		{
		

			display: inline!important;
			outline: none!important;
			box-shadow: none!important;
		}
		table.dataTable thead .sorting
		{
			background-image:unset!important;
		}
		table.dataTable thead .sorting_asc
		{
			background-image:unset!important;
		}
		table.dataTable tfoot th
		{
				border-top: 1px solid #23c691!important;
		}
		table.dataTable thead th
		{
				border-bottom: 1px solid #23c691!important;
		}
		.dataTables_filter input
		{
			margin-right: 6px!important;
		}
		.dataTables_length select
		{
			margin-right: 6px!important;
			margin-left: 6px!important;
		}




		@media screen and (max-width:768px) { /*xs*/
			.right-nav
			{
				width: 250px;
				position: fixed;
				top: 55px;
				z-index: 1;
				right: -250px;

			}
			.toggle-right-nav
			{
				right: 0px;
			}
			 
		}
		@media screen and (min-width:769px)  { /*sm*/
			.right-nav
			{
				width: 250px;
				position: fixed;
				top: 0px;
				z-index: 1;
				 
			}
			
			.content
			{
				padding-right: 250px;
			 
				 
			}
			 
			.pr-250
			{
				padding-right: 250px;
			}



			.small-right-nav
			{
				width: 90px;
				 
			}

			.small-top-nav-content
			{
				padding-right: 90px;
			}
			 




		}
		@media  screen and (min-width:992px) { /*md*/

		}
		@media screen and (min-width:1201px) { /*md*/

		}


	</style>
	<div class="col-xs-12" style="padding: 0px;">
		 <div class="nav-top pr-250 animate-navs col-xs-12" style="height: 55px;background: #fff;border-bottom: 1px solid #23c691;z-index: 10">


		 	 

		 	<div class="col-xs-12" style="padding: 0px;">
		 		<div class="col-xs-6 animate-navs" style="padding: 0px;">
		 			<span id="collapse-nav"  class="fas fa-bars animate-navs "
				  	  style="padding: 15px 20px; font-size: 21px;cursor: pointer;display: inline-block;" 
				  	  ></span>
		 		</div>

		 		<div class="col-xs-6" style="direction: unset;text-align: left;padding: 0px;padding-left: 6px;">

		 			<div style="display: inline-block;height: 55px;width: 55px; padding: 4px;padding-top: 10px;cursor: pointer;" id="fullscreen">
						<span class="fas fa-desktop" style="color:#3892ff;font-size: 18px;position: relative;top: 3px;padding: 4px;left: 4px"></span>
					</div>

		 			<div class="dropdown" style="display: inline-block;height: 55px;width: 55px; padding: 6px;">
						  <img src="https://img.icons8.com/color/1600/circled-user-male-skin-type-1-2.png" style="width: 100%;display: inline-block;max-width: 45px;max-height: 45px;border:2px solid #f1f1f1;border-radius: 50%;cursor: pointer;" class="dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">


						  <div class="dropdown-menu" aria-labelledby="dropdownMenu1" style="right: unset;left: 5px;min-width: 250px;box-shadow: none;border-radius: 0px;border:1px solid #23c691; padding: 30px;">
 								test
						  </div>
					</div>
					
		 		</div>
		 	</div>
		  	
		 	 
		 </div>
		 <div class="right-nav animate-navs" style="min-height: 1200px;background: #10233a;z-index: 11">

		 	 <div class="col-xs-12 prog-tittle" style="padding:  0px 0px;height: 60px;overflow: hidden;">
		 	 	<div class="text-left" style="padding: 10px ;width: 25%;display: inline-block;float: right; ">
		 	 		<img src="http://icons.iconarchive.com/icons/martz90/circle/512/app-draw-icon.png" style="width: 100%;display: inline-block;max-width: 45px;max-height: 45px;">
		 	 	</div>
		 	 	<div   class="text-right" style="display: inline-block;width: 75%;float: right; padding:20px 10px;">
		 	 		<h4 style="margin: 0px;color: #f1f1f1" class="prog-tittle-name">ادارة الاسر المنتجة</h4>
		 	 	</div>	 
		 	 </div>

		 	 <div class="col-xs-12 dn" style="padding: 20px 0px ;height: 83px;overflow: hidden;">
		 	 	<div class="col-xs-12">
		 	 		 <div class="text-left" style="padding: 10px ;width: 30%;display: inline-block;float: right; ">
		 	 		<img src="https://img.icons8.com/color/1600/circled-user-male-skin-type-1-2.png" style="width: 100%;display: inline-block;max-width: 45px;max-height: 45px;border:2px solid #f1f1f1;border-radius: 50%">
			 	 	</div>
			 	 	<div   class="text-right" style="display: inline-block;width: 70%;float: right; padding:10px 3px;">
			 	 		<div class="col-xs-12 prog-tittle-name" style="padding: 0px">
			 	 			<h6 style="margin: 0px; padding: 5px ;color: #c3c393">مدير النظام</h6>
			 	 		</div>
			 	 		<div class="col-xs-12 prog-tittle-name"  >
			 	 			<h6 style="margin: 0px; padding: 5px ;color: #f1f1f1">بيتر ثروت</h6>
			 	 		</div>
			 	 		 
			 	 	</div>
		 	 	</div>
		 	 </div>

		 	 <div class="col-xs-12" style="padding: 15px 0px ;">
		 	 	<h6 style="color: #fff;padding: 0px 12% 0px 0px ">لوحة التحكم</h6>
		 	 </div>


		 	 <div class="col-xs-12" style="padding:6px 0px;">
		 	 	<div style="padding: 0px;list-style: none;">
		 	 		<div class="col-xs-12 text-center-nav node " style="padding: 0px;position: relative;">
		 	 			<div class="col-xs-12 open-nav-menu" >
		 	 				<span class="fa fa-home text-center-nav  padding-0-nav" style="color: #f1f1f1;display: inline-block;"></span>
		 	 				<h4 style="color: #fff;padding: 2px 20px 10px 0px;display: inline-block;font-size: 14px;" class="text-center-nav  padding-0-nav">الرئيسية</h4>
		 	 			</div>
		 	 			<div class="col-xs-12 sub-menu" style="">
		 	 				<ul>
		 	 					<li style="color: #f1f1f1"><a href="#">إضافة عميل جديد</a></li>
		 	 					<li style="color: #f1f1f1"><a href="#">عرض كافة العملاء</a></li>
		 	 				</ul>
		 	 			</div>
		 	 		</div>
		 	 	 
		 	 	</div>
		 	 </div>
		 	 <div class="col-xs-12" style="padding:6px 0px;">
		 	 	<div style="padding: 0px;list-style: none;">
		 	 		<div class="col-xs-12 text-center-nav node " style="padding: 0px;position: relative;">
		 	 			<div class="col-xs-12 open-nav-menu" >
		 	 				<span class="fa fa-user text-center-nav  padding-0-nav" style="color: #f1f1f1;display: inline-block;"></span>
		 	 				<h4 style="color: #fff;padding: 2px 20px 10px 0px;display: inline-block;font-size: 14px;" class="text-center-nav  padding-0-nav">العملاء</h4>
		 	 			</div>
		 	 			<div class="col-xs-12 sub-menu" style="">
		 	 				<ul>
		 	 					<li style="color: #f1f1f1"><a href="#">إضافة عميل جديد</a></li>
		 	 					<li style="color: #f1f1f1"><a href="#">عرض كافة العملاء</a></li>
		 	 				</ul>
		 	 			</div>
		 	 		</div>
		 	 	 
		 	 	</div>
		 	 </div>
		 	 <div class="col-xs-12" style="padding:6px 0px;">
		 	 	<div style="padding: 0px;list-style: none;">
		 	 		<div class="col-xs-12 text-center-nav node " style="padding: 0px;position: relative;">
		 	 			<div class="col-xs-12 open-nav-menu" >
		 	 				<span class="fa fa-users text-center-nav  padding-0-nav" style="color: #f1f1f1;display: inline-block;"></span>
		 	 				<h4 style="color: #fff;padding: 2px 20px 10px 0px;display: inline-block;font-size: 14px;" class="text-center-nav  padding-0-nav">الموظفين</h4>
		 	 			</div>
		 	 			<div class="col-xs-12 sub-menu" style="">
		 	 				<ul>
		 	 					<li style="color: #f1f1f1"><a href="#">إضافة عميل جديد</a></li>
		 	 					<li style="color: #f1f1f1"><a href="#">عرض كافة العملاء</a></li>
		 	 				</ul>
		 	 			</div>
		 	 		</div>
		 	 	 
		 	 	</div>
		 	 </div>
		 	 <div class="col-xs-12" style="padding:6px 0px;">
		 	 	<div style="padding: 0px;list-style: none;">
		 	 		<div class="col-xs-12 text-center-nav node " style="padding: 0px;position: relative;">
		 	 			<div class="col-xs-12 open-nav-menu" >
		 	 				<span class="fa fa-store text-center-nav  padding-0-nav" style="color: #f1f1f1;display: inline-block;"></span>
		 	 				<h4 style="color: #fff;padding: 2px 20px 10px 0px;display: inline-block;font-size: 14px;" class="text-center-nav  padding-0-nav">المخازن</h4>
		 	 			</div>
		 	 			<div class="col-xs-12 sub-menu" style="">
		 	 				<ul>
		 	 					<li style="color: #f1f1f1"><a href="#">إضافة عميل جديد</a></li>
		 	 					<li style="color: #f1f1f1"><a href="#">عرض كافة العملاء</a></li>
		 	 				</ul>
		 	 			</div>
		 	 		</div>
		 	 	 
		 	 	</div>
		 	 </div>
		 	 <div class="col-xs-12" style="padding:6px 0px;">
		 	 	<div style="padding: 0px;list-style: none;">
		 	 		<div class="col-xs-12 text-center-nav node " style="padding: 0px;position: relative;">
		 	 			<div class="col-xs-12 open-nav-menu" >
		 	 				<span class="fa fa-cash-register text-center-nav  padding-0-nav" style="color: #f1f1f1;display: inline-block;"></span>
		 	 				<h4 style="color: #fff;padding: 2px 20px 10px 0px;display: inline-block;font-size: 14px;" class="text-center-nav  padding-0-nav">الخزينة</h4>
		 	 			</div>
		 	 			<div class="col-xs-12 sub-menu" style="">
		 	 				<ul>
		 	 					<li style="color: #f1f1f1"><a href="#">إضافة عميل جديد</a></li>
		 	 					<li style="color: #f1f1f1"><a href="#">عرض كافة العملاء</a></li>
		 	 				</ul>
		 	 			</div>
		 	 		</div>
		 	 	 
		 	 	</div>
		 	 </div>
		 	 <div class="col-xs-12" style="padding:6px 0px;">
		 	 	<div style="padding: 0px;list-style: none;">
		 	 		<div class="col-xs-12 text-center-nav node " style="padding: 0px;position: relative;">
		 	 			<div class="col-xs-12 open-nav-menu" >
		 	 				<span class="fa fa-box text-center-nav  padding-0-nav" style="color: #f1f1f1;display: inline-block;"></span>
		 	 				<h4 style="color: #fff;padding: 2px 20px 10px 0px;display: inline-block;font-size: 14px;" class="text-center-nav  padding-0-nav">الوحدات</h4>
		 	 			</div>
		 	 			<div class="col-xs-12 sub-menu" style="">
		 	 				<ul>
		 	 					<li style="color: #f1f1f1"><a href="#">إضافة عميل جديد</a></li>
		 	 					<li style="color: #f1f1f1"><a href="#">عرض كافة العملاء</a></li>
		 	 				</ul>
		 	 			</div>
		 	 		</div>
		 	 	 
		 	 	</div>
		 	 </div>
		 	 <div class="col-xs-12" style="padding:6px 0px;">
		 	 	<div style="padding: 0px;list-style: none;">
		 	 		<div class="col-xs-12 text-center-nav node " style="padding: 0px;position: relative;">
		 	 			<div class="col-xs-12 open-nav-menu" >
		 	 				<span class="fa fa-tags text-center-nav  padding-0-nav" style="color: #f1f1f1;display: inline-block;"></span>
		 	 				<h4 style="color: #fff;padding: 2px 20px 10px 0px;display: inline-block;font-size: 14px;" class="text-center-nav  padding-0-nav">الاقسام</h4>
		 	 			</div>
		 	 			<div class="col-xs-12 sub-menu" style="">
		 	 				<ul>
		 	 					<li style="color: #f1f1f1"><a href="#">إضافة عميل جديد</a></li>
		 	 					<li style="color: #f1f1f1"><a href="#">عرض كافة العملاء</a></li>
		 	 				</ul>
		 	 			</div>
		 	 		</div>
		 	 	 
		 	 	</div>
		 	 </div>
		 	 <div class="col-xs-12" style="padding:6px 0px;">
		 	 	<div style="padding: 0px;list-style: none;">
		 	 		<div class="col-xs-12 text-center-nav node " style="padding: 0px;position: relative;">
		 	 			<div class="col-xs-12 open-nav-menu" >
		 	 				<span class="fa fa-user-tie text-center-nav  padding-0-nav" style="color: #f1f1f1;display: inline-block;"></span>
		 	 				<h4 style="color: #fff;padding: 2px 20px 10px 0px;display: inline-block;font-size: 14px;" class="text-center-nav  padding-0-nav">الموردين</h4>
		 	 			</div>
		 	 			<div class="col-xs-12 sub-menu" style="">
		 	 				<ul>
		 	 					<li style="color: #f1f1f1"><a href="#">إضافة عميل جديد</a></li>
		 	 					<li style="color: #f1f1f1"><a href="#">عرض كافة العملاء</a></li>
		 	 				</ul>
		 	 			</div>
		 	 		</div>
		 	 	 
		 	 	</div>
		 	 </div>
		 	 <div class="col-xs-12" style="padding:6px 0px;">
		 	 	<div style="padding: 0px;list-style: none;">
		 	 		<div class="col-xs-12 text-center-nav node " style="padding: 0px;position: relative;">
		 	 			<div class="col-xs-12 open-nav-menu" >
		 	 				<span class="fa fa-shopping-bag text-center-nav  padding-0-nav" style="color: #f1f1f1;display: inline-block;"></span>
		 	 				<h4 style="color: #fff;padding: 2px 20px 10px 0px;display: inline-block;font-size: 14px;" class="text-center-nav  padding-0-nav">المنتجات</h4>
		 	 			</div>
		 	 			<div class="col-xs-12 sub-menu" style="">
		 	 				<ul>
		 	 					<li style="color: #f1f1f1"><a href="#">إضافة عميل جديد</a></li>
		 	 					<li style="color: #f1f1f1"><a href="#">عرض كافة العملاء</a></li>
		 	 				</ul>
		 	 			</div>
		 	 		</div>
		 	 	 
		 	 	</div>
		 	 </div>
		 	 <div class="col-xs-12" style="padding:6px 0px;">
		 	 	<div style="padding: 0px;list-style: none;">
		 	 		<div class="col-xs-12 text-center-nav node " style="padding: 0px;position: relative;">
		 	 			<div class="col-xs-12 open-nav-menu" >
		 	 				<span class="fa fa-percent text-center-nav  padding-0-nav" style="color: #f1f1f1;display: inline-block;"></span>
		 	 				<h4 style="color: #fff;padding: 2px 20px 10px 0px;display: inline-block;font-size: 14px;" class="text-center-nav  padding-0-nav">الضرائب و الخصومات</h4>
		 	 			</div>
		 	 			<div class="col-xs-12 sub-menu" style="">
		 	 				<ul>
		 	 					<li style="color: #f1f1f1"><a href="#">إضافة عميل جديد</a></li>
		 	 					<li style="color: #f1f1f1"><a href="#">عرض كافة العملاء</a></li>
		 	 				</ul>
		 	 			</div>
		 	 		</div>
		 	 	 
		 	 	</div>
		 	 </div>
		 	 <div class="col-xs-12" style="padding:6px 0px;">
		 	 	<div style="padding: 0px;list-style: none;">
		 	 		<div class="col-xs-12 text-center-nav node " style="padding: 0px;position: relative;">
		 	 			<div class="col-xs-12 open-nav-menu" >
		 	 				<span class="fa fa-bell text-center-nav  padding-0-nav" style="color: #f1f1f1;display: inline-block;"></span>
		 	 				<h4 style="color: #fff;padding: 2px 20px 10px 0px;display: inline-block;font-size: 14px;" class="text-center-nav  padding-0-nav">الاشعارات</h4>
		 	 			</div>
		 	 			<div class="col-xs-12 sub-menu" style="">
		 	 				<ul>
		 	 					<li style="color: #f1f1f1"><a href="#">إضافة عميل جديد</a></li>
		 	 					<li style="color: #f1f1f1"><a href="#">عرض كافة العملاء</a></li>
		 	 				</ul>
		 	 			</div>
		 	 		</div>
		 	 	 
		 	 	</div>
		 	 </div>
		 	 <div class="col-xs-12" style="padding:6px 0px;">
		 	 	<div style="padding: 0px;list-style: none;">
		 	 		<div class="col-xs-12 text-center-nav node " style="padding: 0px;position: relative;">
		 	 			<div class="col-xs-12 open-nav-menu" >
		 	 				<span class="fa fa-envelope text-center-nav  padding-0-nav" style="color: #f1f1f1;display: inline-block;"></span>
		 	 				<h4 style="color: #fff;padding: 2px 20px 10px 0px;display: inline-block;font-size: 14px;" class="text-center-nav  padding-0-nav">نمازج الرسائل</h4>
		 	 			</div>
		 	 			<div class="col-xs-12 sub-menu" style="">
		 	 				<ul>
		 	 					<li style="color: #f1f1f1"><a href="#">إضافة عميل جديد</a></li>
		 	 					<li style="color: #f1f1f1"><a href="#">عرض كافة العملاء</a></li>
		 	 				</ul>
		 	 			</div>
		 	 		</div>
		 	 	 
		 	 	</div>
		 	 </div>
		 	 <div class="col-xs-12" style="padding:6px 0px;">
		 	 	<div style="padding: 0px;list-style: none;">
		 	 		<div class="col-xs-12 text-center-nav node " style="padding: 0px;position: relative;">
		 	 			<div class="col-xs-12 open-nav-menu" >
		 	 				<span class="fa fa-file-contract text-center-nav  padding-0-nav" style="color: #f1f1f1;display: inline-block;"></span>
		 	 				<h4 style="color: #fff;padding: 2px 20px 10px 0px;display: inline-block;font-size: 14px;" class="text-center-nav  padding-0-nav">عقود المشتركين</h4>
		 	 			</div>
		 	 			<div class="col-xs-12 sub-menu" style="">
		 	 				<ul>
		 	 					<li style="color: #f1f1f1"><a href="#">إضافة عميل جديد</a></li>
		 	 					<li style="color: #f1f1f1"><a href="#">عرض كافة العملاء</a></li>
		 	 				</ul>
		 	 			</div>
		 	 		</div>
		 	 	 
		 	 	</div>
		 	 </div>

		 	 <div class="col-xs-12" style="padding:6px 0px;">
		 	 	<div style="padding: 0px;list-style: none;">
		 	 		<div class="col-xs-12 text-center-nav node " style="padding: 0px;position: relative;">
		 	 			<div class="col-xs-12 open-nav-menu" >
		 	 				<span class="fa fa-file-invoice text-center-nav  padding-0-nav" style="color: #f1f1f1;display: inline-block;"></span>
		 	 				<h4 style="color: #fff;padding: 2px 20px 10px 0px;display: inline-block;font-size: 14px;" class="text-center-nav  padding-0-nav">الفواتير</h4>
		 	 			</div>
		 	 			<div class="col-xs-12 sub-menu" style="">
		 	 				<ul>
		 	 					<li style="color: #f1f1f1"><a href="#">إضافة عميل جديد</a></li>
		 	 					<li style="color: #f1f1f1"><a href="#">عرض كافة العملاء</a></li>
		 	 				</ul>
		 	 			</div>
		 	 		</div>
		 	 	 
		 	 	</div>
		 	 </div>

		 	 <div class="col-xs-12" style="padding:6px 0px;">
		 	 	<div style="padding: 0px;list-style: none;">
		 	 		<div class="col-xs-12 text-center-nav node " style="padding: 0px;position: relative;">
		 	 			<div class="col-xs-12 open-nav-menu" >
		 	 				<span class="fa fa-book text-center-nav  padding-0-nav" style="color: #f1f1f1;display: inline-block;"></span>
		 	 				<h4 style="color: #fff;padding: 2px 20px 10px 0px;display: inline-block;font-size: 14px;" class="text-center-nav  padding-0-nav">السند</h4>
		 	 			</div>
		 	 			<div class="col-xs-12 sub-menu" style="">
		 	 				<ul>
		 	 					<li style="color: #f1f1f1"><a href="#">إضافة عميل جديد</a></li>
		 	 					<li style="color: #f1f1f1"><a href="#">عرض كافة العملاء</a></li>
		 	 				</ul>
		 	 			</div>
		 	 		</div>
		 	 	 
		 	 	</div>
		 	 </div>

		 	 <div class="col-xs-12" style="padding:6px 0px;">
		 	 	<div style="padding: 0px;list-style: none;">
		 	 		<div class="col-xs-12 text-center-nav node " style="padding: 0px;position: relative;">
		 	 			<div class="col-xs-12 open-nav-menu" >
		 	 				<span class="fa fa-cogs text-center-nav  padding-0-nav" style="color: #f1f1f1;display: inline-block;"></span>
		 	 				<h4 style="color: #fff;padding: 2px 20px 10px 0px;display: inline-block;font-size: 14px;" class="text-center-nav  padding-0-nav">الاعدادات</h4>
		 	 			</div>
		 	 			<div class="col-xs-12 sub-menu" style="">
		 	 				<ul>
		 	 					<li style="color: #f1f1f1"><a href="#">إضافة عميل جديد</a></li>
		 	 					<li style="color: #f1f1f1"><a href="#">عرض كافة العملاء</a></li>
		 	 				</ul>
		 	 			</div>
		 	 		</div>
		 	 	 
		 	 	</div>
		 	 </div>






		 	 
		 </div>
		 <div class="content pr-250 animate-navs col-xs-12"  >

		 	<div class="col-xs-12 col-md-3" style="padding: 10px;">
		 		<div class="panel panel-default">
				  <div class="panel-heading">استمارة اضافة</div>
				  <div class="panel-body">
				    محتوي الاستمارة
				  </div>
				</div>
		 	</div>
		 	<div class="col-xs-12 col-md-9" style="padding: 10px;">
		 		<div class="panel panel-default">
				  <div class="panel-heading">استمارة عرض</div>
				  <div class="panel-body" style="overflow: auto;position: relative;">

				  	<div class="col-xs-12 text-center loading-img" style="height: 700px;position: absolute;z-index: 1;padding-top: 100px;background: #fff;z-index: 9;overflow: hidden;">
				  		<img src="https://www.umalis.fr/Front/assets/images/loader-2.gif" style="display: inline-block;width: 70px;height: 70px;">
				  	</div>

				  	<div class="col-xs-12 real-content" style="opacity: 0;padding: 0px">

						<table id="myTable" class="table table-striped table-bordered col-xs-12" style="width:100%;padding: 0px;">
					        <thead>
					            <tr>
					                <th>الكود</th>
					                <th>المنصب</th>
					                <th>المكتب</th>
					                <th>العمر</th>
					                <th>تاريخ البداية</th>
					                <th>عملية</th>
					            </tr>
					        </thead>
					        <tbody>
					            <tr>
					                <td>Tiger Nixon</td>
					                <td>System Architect</td>
					                <td>Edinburgh</td>
					                <td>61</td>
					                <td>2011/04/25</td>
					                <td><a href="#">حذف</a></td>
					            </tr>
					            <tr>
					                <td>Garrett Winters</td>
					                <td>Accountant</td>
					                <td>Tokyo</td>
					                <td>63</td>
					                <td>2011/07/25</td>
					                <td>$170,750</td>
					            </tr>
					            <tr>
					                <td>Ashton Cox</td>
					                <td>Junior Technical Author</td>
					                <td>San Francisco</td>
					                <td>66</td>
					                <td>2009/01/12</td>
					                <td>$86,000</td>
					            </tr>
					             
					            <tr>
					                <td>Lael Greer</td>
					                <td>Systems Administrator</td>
					                <td>London</td>
					                <td>21</td>
					                <td>2009/02/27</td>
					                <td>$103,500</td>
					            </tr>
					            <tr>
					                <td>Jonas Alexander</td>
					                <td>Developer</td>
					                <td>San Francisco</td>
					                <td>30</td>
					                <td>2010/07/14</td>
					                <td>$86,500</td>
					            </tr>
					            <tr>
					                <td>Shad Decker</td>
					                <td>Regional Director</td>
					                <td>Edinburgh</td>
					                <td>51</td>
					                <td>2008/11/13</td>
					                <td>$183,000</td>
					            </tr>
					            <tr>
					                <td>Michael Bruce</td>
					                <td>Javascript Developer</td>
					                <td>Singapore</td>
					                <td>29</td>
					                <td>2011/06/27</td>
					                <td>$183,000</td>
					            </tr>
					            <tr>
					                <td>Donna Snider</td>
					                <td>Customer Support</td>
					                <td>New York</td>
					                <td>27</td>
					                <td>2011/01/25</td>
					                <td>$112,000</td>
					            </tr><tr>
					                <td>Tiger Nixon</td>
					                <td>System Architect</td>
					                <td>Edinburgh</td>
					                <td>61</td>
					                <td>2011/04/25</td>
					                <td><a href="#">حذف</a></td>
					            </tr>
					            <tr>
					                <td>Garrett Winters</td>
					                <td>Accountant</td>
					                <td>Tokyo</td>
					                <td>63</td>
					                <td>2011/07/25</td>
					                <td>$170,750</td>
					            </tr>
					            <tr>
					                <td>Ashton Cox</td>
					                <td>Junior Technical Author</td>
					                <td>San Francisco</td>
					                <td>66</td>
					                <td>2009/01/12</td>
					                <td>$86,000</td>
					            </tr>
					             
					            <tr>
					                <td>Lael Greer</td>
					                <td>Systems Administrator</td>
					                <td>London</td>
					                <td>21</td>
					                <td>2009/02/27</td>
					                <td>$103,500</td>
					            </tr>
					            <tr>
					                <td>Jonas Alexander</td>
					                <td>Developer</td>
					                <td>San Francisco</td>
					                <td>30</td>
					                <td>2010/07/14</td>
					                <td>$86,500</td>
					            </tr>
					            <tr>
					                <td>Shad Decker</td>
					                <td>Regional Director</td>
					                <td>Edinburgh</td>
					                <td>51</td>
					                <td>2008/11/13</td>
					                <td>$183,000</td>
					            </tr>
					            <tr>
					                <td>Michael Bruce</td>
					                <td>Javascript Developer</td>
					                <td>Singapore</td>
					                <td>29</td>
					                <td>2011/06/27</td>
					                <td>$183,000</td>
					            </tr>
					            <tr>
					                <td>Donna Snider</td>
					                <td>Customer Support</td>
					                <td>New York</td>
					                <td>27</td>
					                <td>2011/01/25</td>
					                <td>$112,000</td>
					            </tr><tr>
					                <td>Tiger Nixon</td>
					                <td>System Architect</td>
					                <td>Edinburgh</td>
					                <td>61</td>
					                <td>2011/04/25</td>
					                <td><a href="#">حذف</a></td>
					            </tr>
					            <tr>
					                <td>Garrett Winters</td>
					                <td>Accountant</td>
					                <td>Tokyo</td>
					                <td>63</td>
					                <td>2011/07/25</td>
					                <td>$170,750</td>
					            </tr>
					            <tr>
					                <td>Ashton Cox</td>
					                <td>Junior Technical Author</td>
					                <td>San Francisco</td>
					                <td>66</td>
					                <td>2009/01/12</td>
					                <td>$86,000</td>
					            </tr>
					             
					            <tr>
					                <td>Lael Greer</td>
					                <td>Systems Administrator</td>
					                <td>London</td>
					                <td>21</td>
					                <td>2009/02/27</td>
					                <td>$103,500</td>
					            </tr>
					            <tr>
					                <td>Jonas Alexander</td>
					                <td>Developer</td>
					                <td>San Francisco</td>
					                <td>30</td>
					                <td>2010/07/14</td>
					                <td>$86,500</td>
					            </tr>
					            <tr>
					                <td>Shad Decker</td>
					                <td>Regional Director</td>
					                <td>Edinburgh</td>
					                <td>51</td>
					                <td>2008/11/13</td>
					                <td>$183,000</td>
					            </tr>
					            <tr>
					                <td>Michael Bruce</td>
					                <td>Javascript Developer</td>
					                <td>Singapore</td>
					                <td>29</td>
					                <td>2011/06/27</td>
					                <td>$183,000</td>
					            </tr>
					            <tr>
					                <td>Donna Snider</td>
					                <td>Customer Support</td>
					                <td>New York</td>
					                <td>27</td>
					                <td>2011/01/25</td>
					                <td>$112,000</td>
					            </tr><tr>
					                <td>Tiger Nixon</td>
					                <td>System Architect</td>
					                <td>Edinburgh</td>
					                <td>61</td>
					                <td>2011/04/25</td>
					                <td><a href="#">حذف</a></td>
					            </tr>
					            <tr>
					                <td>Garrett Winters</td>
					                <td>Accountant</td>
					                <td>Tokyo</td>
					                <td>63</td>
					                <td>2011/07/25</td>
					                <td>$170,750</td>
					            </tr>
					            <tr>
					                <td>Ashton Cox</td>
					                <td>Junior Technical Author</td>
					                <td>San Francisco</td>
					                <td>66</td>
					                <td>2009/01/12</td>
					                <td>$86,000</td>
					            </tr>
					             
					            <tr>
					                <td>Lael Greer</td>
					                <td>Systems Administrator</td>
					                <td>London</td>
					                <td>21</td>
					                <td>2009/02/27</td>
					                <td>$103,500</td>
					            </tr>
					            <tr>
					                <td>Jonas Alexander</td>
					                <td>Developer</td>
					                <td>San Francisco</td>
					                <td>30</td>
					                <td>2010/07/14</td>
					                <td>$86,500</td>
					            </tr>
					            <tr>
					                <td>Shad Decker</td>
					                <td>Regional Director</td>
					                <td>Edinburgh</td>
					                <td>51</td>
					                <td>2008/11/13</td>
					                <td>$183,000</td>
					            </tr>
					            <tr>
					                <td>Michael Bruce</td>
					                <td>Javascript Developer</td>
					                <td>Singapore</td>
					                <td>29</td>
					                <td>2011/06/27</td>
					                <td>$183,000</td>
					            </tr>
					            <tr>
					                <td>Donna Snider</td>
					                <td>Customer Support</td>
					                <td>New York</td>
					                <td>27</td>
					                <td>2011/01/25</td>
					                <td>$112,000</td>
					            </tr>
					        </tbody>
					        <tfoot>
					            <tr>
					                <th>الكود</th>
					                <th>المنصب</th>
					                <th>المكتب</th>
					                <th>العمر</th>
					                <th>تاريخ البداية</th>
					                <th>عملية</th>
					            </tr>
					        </tfoot>
					    </table>

					</div>
				   

				  </div>
				</div>
		 	</div>
		 	



		 </div>

	</div>






	 

	<!--boostrap-->
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/table.min.js"></script>
	<script type="text/javascript">
		/*navbar top*/
		$('#collapse-nav').click(function(){
			
			$('.right-nav').toggleClass('small-right-nav');

			if($('body').width()<='768'){		 
				$('.right-nav').removeClass('small-right-nav'); 
			}
				//alert($('body').width());
			
			$('.content,.nav-top').toggleClass('small-top-nav-content');
			$('.right-nav').toggleClass('toggle-right-nav'); /* xs */


			if(!$('.right-nav').hasClass('toggle-right-nav'))
				{
					$('.text-center-sm-nav').addClass('text-center');
				}
			


		});
		$('.node .open-nav-menu').click(function(){

			//$('.node .open-nav-menu').next().fadeOut(0);
			$(this).toggleClass('border-left-right-nav');
			$(this).toggleClass('focus-right-nav');
			 
			$(this).next().toggleClass('border-left-right-nav');
			$(this).next().fadeToggle(200);		 		 
		});




	 
		$('#fullscreen').click(function(){
			
			var elem = document.getElementById("body"); 
			$(this).toggleClass('exitfullscreen');
			if($(this).hasClass('exitfullscreen'))
			{
				 
				  if (elem.requestFullscreen) {
				    elem.requestFullscreen();
				  } else if (elem.mozRequestFullScreen) { /* Firefox */
				    elem.mozRequestFullScreen();
				  } else if (elem.webkitRequestFullscreen) { /* Chrome, Safari and Opera */
				    elem.webkitRequestFullscreen();
				  } else if (elem.msRequestFullscreen) { /* IE/Edge */
				    elem.msRequestFullscreen();
				  }
				 
			}
			else
			{
				 
				  if (document.exitFullscreen) {
				    document.exitFullscreen();
				  } else if (document.mozCancelFullScreen) { /* Firefox */
				    document.mozCancelFullScreen();
				  } else if (document.webkitExitFullscreen) { /* Chrome, Safari and Opera */
				    document.webkitExitFullscreen();
				  } else if (document.msExitFullscreen) { /* IE/Edge */
				    document.msExitFullscreen();
				  }
				 

			}

		});



		


		 
		(function(){


 
			 
			$('#myTable').DataTable( {

				"language": {
                    "url": "http://cdn.datatables.net/plug-ins/1.10.19/i18n/Arabic.json"
                },
                 responsive: true

			  

			} );

		 

		})();

		 
    $('.loading-img').fadeOut(500);
    setTimeout(function(){
        $('.real-content').animate({opacity: 1}, 800);
        $('body').css('background','#10233a');
    },500);
 

		 


		/* Get the documentElement (<html>) to display the page in fullscreen */
		

		/* View in fullscreen */
		

		/* Close fullscreen */
		



	</script>
</body>
</html>
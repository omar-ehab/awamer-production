<style type="text/css">


    html{
        --main-color:#212121;
        --second-color:#7ae684;
        --third-color:#ffca28;

        @if(true)
        --orange-color:#f5a42c;
        --orange-dark-color:#bd7100;
        --orange-light-color:#ffac33;
        --orange-lighter-color:#fff3e1;
        @elseif(true)
        --orange-color:#29eac0;
        --orange-dark-color:#00bb92;
        --orange-light-color:#95ffe8;
        --orange-lighter-color:#d7fff6;

        @endif



        --font-color:#222;
    }
    * {
        font-family: 'Cairo', sans-serif;
        /*transition: all .3s ease-in-out;*/
        text-decoration: none!important;
        font-size: 13px;
        outline: none!important;
        text-align: right;
        direction: rtl;
    }
    body
    {
        overflow-x: hidden;
        padding-top: 0px;
    }
    .harma
    {
        font-family: 'Tajawal', sans-serif;
    }

    .content {

        background: #f8f8f8;
        min-height: 1200px;

    }

    .animate-navs {
        transition: all .3s ease-in-out;
    }



    .fa, .fas {
        font-family: "Font Awesome 5 Pro";
        font-weight: 500;
    }


    [type=button], [type=reset], [type=submit], button {
        -webkit-appearance: unset;
    }



    .row
    {
        margin: 0px;
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
        background: var(--orange-lighter-color);
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: var(--orange-dark-color);
    }


    .right-nav-menus::-webkit-scrollbar {
        width: 5px;
    }

    /* Track */
    .right-nav-menus::-webkit-scrollbar-track {
        background: var(--orange-lighter-color);
    }

    /* Handle */
    .right-nav-menus::-webkit-scrollbar-thumb {
        background: var(--orange-light-color);
    }

    /* Handle on hover */
    .right-nav-menus::-webkit-scrollbar-thumb:hover {
        background: var(--orange-dark-color);
    }



    .prog-tittle{
        background: #1a2d4c!important;
    }
    .small-right-nav .prog-tittle>div,
    .small-right-nav .prog-tittle>div {
        width: 100% !important;
        text-align: center !important;
    }

    .small-right-nav .prog-tittle-name {
        display: none;
        transition: all 0s ease-in-out;
    }

    .small-right-nav .dn {
        display: none!important;
    }

    .small-right-nav .text-center-nav {
        text-align: center !important;
    }

    .small-right-nav .padding-0-nav {
        padding: 0px !important;
    }

    .small-right-nav .node div>.fa {
        font-size: 20px !important;
        display: block !important;
    }

    .small-right-nav .node div>h4 {
        font-size: 11px !important;
        padding: 4px 0px 3px 0px !important;

    }



    .notifications-scroll::-webkit-scrollbar {
        width: 8px;
    }

    /* Track */
    .notifications-scroll::-webkit-scrollbar-track {
        background: #f5f7fb;
        border-radius: 5px;
    }

    /* Handle */
    .notifications-scroll::-webkit-scrollbar-thumb {
        background: #069cb9;
        border-radius: 5px;
    }

    /* Handle on hover */
    .notifications-scroll::-webkit-scrollbar-thumb:hover {
        background: #5cd5c4;
    }
    .notifications-hover:hover
    {
        background: #eee!important;
    }




    .node div>h4 {
        padding: 5px 12px 5px 0px !important;
        font-size: 14px !important;
    ;
    }

    .border-left-right-nav {
        border-left: 5px solid var(--orange-color);

    }

    .border-left-right-nav.sub-menu
    {
        border-left: 0px solid transparent!important;
    }

    .small-right-nav .sub-menu {
        right: 90px;
        top: 0px;
        position: absolute;
    }

    .sub-menu {
        width: 248px;
        background: #141414;

        padding: 8px 0px;
        display: none;
        text-align: right;
    }

    .sub-menu ul {
        list-style: none;
        margin: 0px;
    }

    .sub-menu ul li,
    .sub-menu ul li a {
        color: #f1f1f1;
        text-decoration: none;
        font-size: 13px !important;
    }

    .sub-menu ul li {
        transition: all .2s ease-in-out;
    }

    .sub-menu ul li:hover {
        padding-right: 5px;
    }

    .open-nav-menu {
        padding: 7px 10%;
        transition: unset;
        cursor: pointer;
    }

    .open-nav-menu h4 {
        padding: 0px;
        margin: 0px;
    }

    input,
    select,
    textarea {
        border-radius: 2px !important;
        box-shadow: none !important;
    }

    input:focus,
    select:focus,
    textarea:focus {
        border: 1px solid var(--orange-light-color)!important;
    }

    .focus-right-nav {
        background: #333!important;

    }
    .focus-right-nav *
    {
        color: #fff!important;
    }



    .active .open-nav-menu   *{
        color: #fff!important;
    }
    .active .open-nav-menu {
        background: #141414!important;
    }






    /*table*/



    .paginate_button:hover,
    .paginate_button:focus {
        background: transparent !important;
        border: none !important;
    }


    .dataTables_wrapper
    {
        width: 100%
    }
    .dataTables_wrapper .dataTables_length {
        float: right;
    }

    div.dataTables_wrapper div.dataTables_filter {
        float: right;
    }

    .dt-buttons {
        float: left;
        padding-top: 0px;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button {


        display: inline !important;
        outline: none !important;
        box-shadow: none !important;
    }

    table.dataTable thead .sorting {
        background-image: unset !important;
    }

    table.dataTable thead .sorting_asc {
        background-image: unset !important;
    }

    table.dataTable tfoot th {
        border-top: 1px solid transparent !important;
    }

    /*table.dataTable thead th {
        border-bottom: 1px solid transparent !important;
    }*/

    .dataTables_filter input {
        margin-right: 6px !important;
        padding: 0px 20px;
    }

    .dataTables_length select {
        margin-right: 6px !important;
        margin-left: 6px !important;
    }


    #myTable_wrapper .dt-buttons {
        padding-top: 0px;
        box-shadow: none !important;


    }

    .table {
        margin-bottom: 0px !important;
    }

    #myTable_filter {
        float: right;
        margin-bottom: 20px;

    }
    #myTable_filter input{
        border-color: #f1f1f1;
        height: 35px;
        width: 300px;
        border-radius: 49px!important;
        max-width: 100%;
    }
    #myTable_filter  {

        max-width: 100%;
    }


    #myTable_wrapper .dt-buttons span {

        font-weight: normal;
    }

    .btn-default {
        box-shadow: none !important;
        background: #fff !important;
        padding: 5px 8px;
    }

    .padding-0 {
        padding: 0px !important;
    }

    .real-content-new {

        background: #f1f1f1 !important;
    }

    .dt-print-view h1 {
        display: none;
    }

    table.dataTable thead th
    {
        padding: 13px 10px;
        border:1px solid #f1f1f1!important;
    }
    .table-bordered
    {
        border:1px solid #f1f1f1;
    }
    .table-bordered>tbody>tr>td
    {
        border: 1px solid #f1f1f1;
        padding: 13px 10px 8px;
    }

    .table-striped>tbody>tr:nth-of-type(even):hover,.table-striped>tbody>tr:nth-of-type(odd):hover
    {
        background: #f4f4f4;
    }
    .dt-buttons button
    {
        background: var(--orange-color);
    }
    /*table*/
    table.dataTable thead .sorting_asc:after,
    table.dataTable thead .sorting_desc:after,
    table.dataTable thead .sorting:after {
        display: none;
    }

    .paginate_button:hover,
    .paginate_button:focus {
        background: transparent !important;
        border: none !important;
    }

    .dataTables_wrapper .dataTables_length {
        float: right;
    }

    div.dataTables_wrapper div.dataTables_filter {
        float: left;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button {


        display: inline !important;
        outline: none !important;
        box-shadow: none !important;
    }

    table.dataTable thead .sorting {
        background-image: unset !important;
    }

    table.dataTable thead .sorting_asc {
        background-image: unset !important;
    }

    /*   table.dataTable tfoot th {
           border-top: 1px solid #23c691 !important;
       }

       table.dataTable thead th {
           border-bottom: 1px solid #23c691 !important;
       }*/

    .dataTables_filter input {
        margin-right: 6px !important;
    }

    .dataTables_length select {
        margin-right: 6px !important;
        margin-left: 6px !important;
    }


    .table-striped>tbody>tr:nth-of-type(odd) {
        background: #f5f5f5
    }

    table.dataTable tfoot th {
        border-top: 1px solid #c1c1c1 !important;
    }

    table.dataTable thead th {
        border: 1px solid #c1c1c1;
    }
    .table-striped>tbody>tr:nth-of-type(odd)
    {
        background: #fafafa
    }
    .table thead th,.table tfoot th
    {
        font-weight: normal
    }
    div.dataTables_wrapper div.dataTables_filter label
    {
        font-weight: normal;


    }

    .table tbody td span
    {
        color: #333
    }
    .table tbody td
    {
        font-size: 12px;
    }
    .table tr , .table th , .table td
    {
        font-family: 'Tajawal', sans-serif!important;
    }
    .dataTables_empty
    {
        padding: 100px 0px!important;
        text-align: center;
    }


    .dataTables_empty h6{
        text-align: center;
        padding-top: 20px;
    }
    .dataTables_empty:after
    {
        width: 100px;height: 100px;display: inline-block;background: red;
    }
    .table tfoot
    {
        display: none;
    }
    .dataTables_empty
    {
        border:none!important;
    }
    #myTable_info {
        text-align: left;
        padding-top: 9px;
    }











    /*select 2*/


    .select2-container--default .select2-selection--single {
        outline: none;
    }

    .select2-container--default .select2-selection--single {
        border-radius: 0px;
        border: 1px solid #ccc;
        height: 35px;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {

        line-height: 28px;
        padding: 3px 7px;
    }

    .select2-selection__arrow {
        top: 4px !important;
        left: 0px;
    }

    .select2-search:after {
        display: none;
    }

    .select2-selection__rendered {
        float: right;
    }

    .select2-results__option.select2-results__option--highlighted {
        text-align: right;
    }






















    .btn-circle>i {
        font-size: 18px !important;
        padding: 10px 8px !important;
        height: 40px;
        width: 40px;
        display: inline-block;

    }

    .toolbar a {
        font-size: 12px !important;
    }

    .btn-circle b.badge {
        border: 1px solid;
    }

    .navbar-brand {
        padding: 10px 5px !important;
    }





    .navbar-brand {
        font-style: normal;
    }

    #content {

        min-height: -webkit-fill-available;
    }

    .panel {
        transition: all .5s ease-in-out;
    }

    .nav-primary .a-exact-active {
        color: #fff !important;
        background: #233445 !important;
    }

    input,
    button {
        border-radius: 0px !important;

    }

    input {
        box-shadow: none !important;
    }

    input:focus {
        background: var(--orange-lighter-color);
    }



    .h1,
    .h2,
    .h3,
    .h4,
    .h5,
    .h6 {
        font-family: 'Tajawal', sans-serif!important;
    }



    .real-content * {
        font-size: 14px;
    }

    .has_no_mount {
        display: none;
    }

    .statis:hover section {
        top: 0px !important;
    }

    .statis * {
        transition: all .5s ease-in-out;
    }


    input {
        border-radius: 0px !important;
        box-shadow: none !important;
        border: 1px solid #13c4a5;
        padding-top: 0px;

    }

    select {
        border-radius: 0px !important;
        box-shadow: none !important;
        outline: 0;
        border: 1px solid #13c4a5;
        padding-top: 0px !important
    }


    .nav-top
    {
        padding-left: 0px;
        box-shadow: 0px 0px 12px var(--orange-lighter-color);
    }


    .content
    {
        margin-top: 55px;
    }
    .content>div
    {
        padding: 8px!important;
        background: #fafafa!important;
    }



    @media only screen and (max-width: 575.98px) {



        /*xs*/
        .right-nav {
            width: 250px;
            position: fixed;
            top: 55px;
            z-index: 1;
            right: -250px;

        }

        .toggle-right-nav {
            right: 0px;
        }

    }

    @media only screen and (min-width: 575.98px) {



        /*sm*/
        .right-nav {
            width: 250px;
            position: fixed;
            top: 0px;
            z-index: 1;

        }

        .content {
            padding-right: 250px;


        }

        .pr-250 {
            padding-right: 250px;
        }



        .small-right-nav {
            width: 90px;

        }

        .small-top-nav-content {
            padding-right: 90px;
        }





    }



    /* .dataTables_filter input
     {
             border-radius: 65px!important;
             border: 1px solid #08c152;
             background: #e7fff0;
     }*/


    textarea
    {
        border-radius: 0px!important;
        max-width: 100%;min-height: 100%;
        min-height: 100px;
    }


    .small-right-nav .node h4
    {
        display: none!important;
    }


    .small-right-nav .open-nav-menu {
        padding: 8px 1%;
    }


    .main-stas-view
    {
        padding:5px 5px;
    }
    .main-stas-view >div
    {
        border-radius: 20px;
        border-bottom-right-radius: 10px;
        border-bottom-left-radius: 10px;
        border-top-right-radius: 35px;
        border-bottom-left-radius: 35px;


    }
    .main-stas-view div div:first-of-type
    {
        border-radius: 25px;
    }
    /*   .btn-group>.btn:first-child:not(:last-child):not(.dropdown-toggle)
       {
           border-top-right-radius: 10px!important;
       }
       .btn-group>.btn:last-child:not(:first-child), .btn-group>.dropdown-toggle:not(:first-child)
       {
            border-bottom-left-radius: 10px!important;
       }*/






    /*.dt-buttons:before
    {
        content: 'تصدير';
        margin-bottom: 5px;
        border:1px solid #eee;
        padding: 2px 10px;
    }
    .dt-buttons
    {

        width: 105px!important;
        cursor: pointer;
        height: 50px;


    }
    .dt-buttons button
    {

        width: 105px!important;
        border:none;
        text-align: right;
        display: none;
        z-index: 111;
        padding:5px;

    }
    .dt-buttons:hover button
    {
        display: inline-block;
    }*/





    #show-view
    {
        transition: all .5s ease-in-out!important;
    }
    #show-view *
    {
        transition: all .5s ease-in-out!important;
    }

    .sub-menu *:not(.fa):not(.fab):not(.far):not(.fas)
    {
        font-family: 'Tajawal',sans-serif!important;
    }


















    /*pace*/
    .pace {
        -webkit-pointer-events: none;
        pointer-events: none;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    .pace-inactive {
        display: none;
    }

    .pace .pace-progress {
        background: #29d;
        position: fixed;
        z-index: 2000;
        top: 0;
        right: 100%;
        width: 100%;
        height: 2px;
    }

    .pace .pace-progress-inner {
        display: block;
        position: absolute;
        right: 0px;
        width: 100px;
        height: 100%;
        box-shadow: 0 0 10px #29d, 0 0 5px #29d;
        opacity: 1.0;
        -webkit-transform: rotate(3deg) translate(0px, -4px);
        -moz-transform: rotate(3deg) translate(0px, -4px);
        -ms-transform: rotate(3deg) translate(0px, -4px);
        -o-transform: rotate(3deg) translate(0px, -4px);
        transform: rotate(3deg) translate(0px, -4px);
    }

    .pace .pace-activity {
        display: block;
        position: fixed;
        z-index: 2000;
        top: 20px;
        right: 300px;
        width: 14px;
        height: 14px;
        border: solid 2px transparent;
        border-top-color: #29d;
        border-left-color: #29d;
        border-radius: 10px;
        -webkit-animation: pace-spinner 400ms linear infinite;
        -moz-animation: pace-spinner 400ms linear infinite;
        -ms-animation: pace-spinner 400ms linear infinite;
        -o-animation: pace-spinner 400ms linear infinite;
        animation: pace-spinner 400ms linear infinite;
    }

    @-webkit-keyframes pace-spinner {
        0% { -webkit-transform: rotate(0deg); transform: rotate(0deg); }
        100% { -webkit-transform: rotate(360deg); transform: rotate(360deg); }
    }
    @-moz-keyframes pace-spinner {
        0% { -moz-transform: rotate(0deg); transform: rotate(0deg); }
        100% { -moz-transform: rotate(360deg); transform: rotate(360deg); }
    }
    @-o-keyframes pace-spinner {
        0% { -o-transform: rotate(0deg); transform: rotate(0deg); }
        100% { -o-transform: rotate(360deg); transform: rotate(360deg); }
    }
    @-ms-keyframes pace-spinner {
        0% { -ms-transform: rotate(0deg); transform: rotate(0deg); }
        100% { -ms-transform: rotate(360deg); transform: rotate(360deg); }
    }
    @keyframes pace-spinner {
        0% { transform: rotate(0deg); transform: rotate(0deg); }
        100% { transform: rotate(360deg); transform: rotate(360deg); }
    }








    .hover-focus-a:hover
    {
        background: var(--orange-dark-color)!important;
    }

    .hic
    {
        display: none!important;
    }






    .ui-switcher {
        background-color: #bdc1c2;
        display: inline-block;
        height: 20px;
        width: 48px;
        border-radius: 10px;
        box-sizing: border-box;
        vertical-align: middle;
        position: relative;
        cursor: pointer;
        transition: border-color 0.25s;
        margin: -2px 4px 0 0;
        box-shadow: inset 1px 1px 1px rgba(0, 0, 0, 0.15);
    }

    .ui-switcher:before {
        font-family: sans-serif;
        font-size: 10px;
        font-weight: 400;
        color: #ffffff;
        line-height: 1;
        display: inline-block;
        position: absolute;
        top: 6px;
        height: 12px;
        width: 20px;
        text-align: center;
    }

    .ui-switcher:after {
        background-color: #ffffff;
        content: '\0020';
        display: inline-block;
        position: absolute;
        top: 2px;
        height: 16px;
        width: 16px;
        border-radius: 50%;
        transition: left 0.25s;
    }

    .ui-switcher[aria-checked=true]:before {
        content: '';

        left: 7px;
    }
    .ui-switcher[aria-checked=false]:before {
        content: '';
        right: 7px;
    }
    .ui-switcher
    {
        margin-bottom: 7px!important;
        margin-top: 4px!important;
    }



    #name_or_barcode_search_bill .ui-switcher[aria-checked=true]:before {
        content: 'باركود';
        font-family:'Tajawal';
        left: 35px;
        font-size: 16px;
        top: 3px
    }

    #name_or_barcode_search_bill .ui-switcher  {
        background: #07a0bc;
    }


    #name_or_barcode_search_bill .ui-switcher[aria-checked=true]:after {
        left: 61px;
    }

    #name_or_barcode_search_bill .ui-switcher[aria-checked=false]:before {
        content: 'اسم';
        font-family:'Tajawal';
        left: 7px;
        font-size: 16px;
        top: 3px;
        color: #fff;
    }
    #name_or_barcode_search_bill .ui-switcher{
        width: 80px;
    }




    #n_or_a .ui-switcher[aria-checked=true]:before {
        content: 'نقدي';
        font-family:'Tajawal';
        left: 35px;
        font-size: 16px;
        top: 3px
    }

    #n_or_a  .ui-switcher  {
        background: #07a0bc;
    }


    #n_or_a .ui-switcher[aria-checked=true]:after {
        left: 61px;
    }

    #n_or_a  .ui-switcher[aria-checked=false]:before {
        content: 'آجل';
        font-family:'Tajawal';
        left: 7px;
        font-size: 16px;
        top: 3px;
        color: #fff;
    }
    #n_or_a  .ui-switcher{
        width: 80px;
    }









    .panel{
        border:none;
        box-shadow: none;
    }
    .panel-body
    {
        background: #fff!important;
        color: #555!important;
        padding: 10px 1%!important;
    }
    .panel-heading
    {
        border-bottom:1px solid #fff!important;
    }
    .panel-heading >div>div:first-of-type
    {
        border-bottom: 2px solid var(--orange-color);
        padding-bottom: 23px!important;

    }
    .panel-heading >div>div:nth-of-type(2) button:nth-of-type(2)
    {
        background: var(--orange-color)!important;
        border-radius: 17px!important;
        padding: 5px 17px!important;
        border:none!important;
    }

    .panel-heading >div>div:nth-of-type(2) button:nth-of-type(1)
    {
        display: none;
    }



    .panel-heading >div>div
    {

        padding: 15px!important
    }
    .panel-body.row{
        padding: 0px!important;
    }


    .product_input::-webkit-input-placeholder
    {
        color: #ddd!important;
    }
    select.product_input
    {
        color: #ddd!important;
    }











    .per-calss
    {
        transition: all .5s ease-in-out;
    }
    .per-calss-left
    {
        left: 0px!important;
    }


    .select2-selection__rendered{
        padding: 2px 10px!important;
    }



    .btn
    {
        border:none;
    }

    /*.table *{font-family: DejaVu Sans, sans-serif!important;}
     */
</style>

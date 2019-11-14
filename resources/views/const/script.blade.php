    <!--boostrap-->
    <script type="text/javascript" src="/js/table.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
    <script type="text/javascript" src="/js/jquery.switcher.min.js"></script>

    <script
  src="https://cdn.rtlcss.com/bootstrap/v4.2.1/js/bootstrap.min.js"

 ></script>



    <!-- <script type="text/javascript" src="/js/dragdrop.js"></script> -->

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/pace-js@1.0.2/pace.min.js"></script>
    <!-- <script type="text/javascript" src="/js/calculate.js"></script> -->
    <!-- Latest compiled and minified JavaScript -->

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/js/bootstrap-select.min.js"></script>
 --}}





    <script src="https://wowjs.uk/dist/wow.min.js"></script>
    <script type="text/javascript">
        (function(){
            setTimeout(function(){new WOW().init();},200)
            }
        )();

    </script>
    <input type="hidden" disabled id="userId" value="1">
    <input type="hidden" disabled id="storeId" value="1">





    <script>
        function markNotificationsAsRead() {
            $.ajax({
                method: "GET",
                url: '/notifications/mark-as-read',
            })
                .done(function () {
                    location.reload();
                });
        }
    </script>

    <script type="text/javascript">


        $('.right-nav').css('height',$(window).height());


        $(function(){
           $.switcher({});
        });



    /*navbar top*/
    $('#collapse-nav').click(function() {

        $('.right-nav').toggleClass('small-right-nav');

        if ($('body').width() <= '575.98') {
            $('.right-nav').removeClass('small-right-nav');
        }
        //alert($('body').width());

        $('.content,.nav-top').toggleClass('small-top-nav-content');
        $('.right-nav').toggleClass('toggle-right-nav'); /* xs */


        if (!$('.right-nav').hasClass('toggle-right-nav')) {
            $('.text-center-sm-nav').addClass('text-center');
        }



    });
    $('.node .open-nav-menu').click(function() {

        //$('.node .open-nav-menu').next().fadeOut(0);
        $(this).toggleClass('border-left-right-nav');
        $(this).toggleClass('focus-right-nav');

        $(this).next().toggleClass('border-left-right-nav');
        $(this).next().fadeToggle(200);
    });





    $('#fullscreen').click(function() {

        var elem = document.getElementById("body");
        $(this).toggleClass('exitfullscreen');
        if ($(this).hasClass('exitfullscreen')) {

            if (elem.requestFullscreen) {
                elem.requestFullscreen();
            } else if (elem.mozRequestFullScreen) { /* Firefox */
                elem.mozRequestFullScreen();
            } else if (elem.webkitRequestFullscreen) { /* Chrome, Safari and Opera */
                elem.webkitRequestFullscreen();
            } else if (elem.msRequestFullscreen) { /* IE/Edge */
                elem.msRequestFullscreen();
            }

        } else {

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



    $('.loading-img').fadeOut(500);
    setTimeout(function() {
        $('.real-content').animate({ opacity: 1 }, 800);
        $('body').css('background', '#10233a');
    }, 500);


    $('.cust-alert').click(function() {
        $('.cust-alert').hide('slow');
    });

    setTimeout(function(){$('.cust-alert').slideUp('slow');},5000);


    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/af-2.3.3/b-1.5.6/b-colvis-1.5.6/b-flash-1.5.6/b-html5-1.5.6/b-print-1.5.6/cr-1.5.0/fc-3.2.5/fh-3.1.4/kt-2.5.0/r-2.2.2/rg-1.1.0/rr-1.2.4/sc-2.0.0/sl-1.3.0/datatables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>


    <script type="text/javascript">
    (function() {


        $('#myTable').DataTable({
            dom: 'Bfrtip',
            lengthMenu: [
                [50, 100, 150, -1],
                ['50 صف', '100 صف', '150 صف', 'عرض الكل']
            ],

            buttons: [ 
                {
                    extend: 'print',
                    text: 'طباعة وتصدير PDF',
                    exportOptions: {
                        modifier: {
                            search: 'none'
                        }
                    }
                },
                {
                    extend: 'excel',
                    text: 'Excel',
                    exportOptions: {
                        modifier: {
                            search: 'none'
                        }
                    }
                },
            ],


            "language": {

                "sProcessing": "جارٍ التحميل...",
                "sLengthMenu": "أظهر _MENU_ مدخلات",
                "sZeroRecords": "لم يعثر على أية سجلات",
                "sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
                "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
                "sInfoPostFix": "",
                "sSearch": "ابحث:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "الأول",
                    "sPrevious": "السابق",
                    "sNext": "التالي",
                    "sLast": "الأخير"
                },
                buttons: {
                    pageLength: {
                        _: "عرض %d عناصر",
                        '-1': "Tout afficher"
                    }
                }
            },
            responsive: true,
            scrollY: 700,
            paging: false
        });

    })();



    setTimeout(function() {
        $(document).ready(function() {


        });
    }, 500);



    $('.select2').select2();
    setTimeout(function() {
    $('.select2-results__message').text("لم يتم العثور علي نتائج");
    },100);



    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })
    $('a[href="/'+window.location.pathname.split('/')[1]+'"]').addClass('active');

    $('.dataTables_empty').empty();
    $('.dataTables_empty').append('<img src="/system_images/empty.svg" style="width: 180px;height: 180px;display: inline-block;"> <h6 style="color:#ccc">لم يعثر على أية سجلات</h6>');



/*    $('.dt-buttons').empty();
    $('.dt-buttons').addClass('dropdown');
    $('.dt-buttons').css('display','inline-block');
 */

/*$('.dt-buttons').append('<div class="dropdown"  style="display: inline-block;">\
              <button class="btn   dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="background: transparent;">\
                <span style="padding: 0px 5px;color: #8e8e8f">ريال سعودي </span>\
                <span class="caret" style="color: #8e8e8f"></span>\
              </button>\
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1" style="position:relative;z-index:444;background:green">\
                <li><a href="#">عربي</a></li>\
                <li><a href="#">English</a></li>\
              </ul>\
            </div>');
*/
       /*$('.dt-buttons').append('<button class="btn dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="background: transparent;">\
                <span style="padding: 0px 5px;color: #8e8e8f">تصدير </span>\
                <span class="caret" style="color: #8e8e8f"></span>\
              </button>\
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu2" style="z-index:4555;position:relative">\
                <li><button class="btn btn-default buttons-copy buttons-html5" tabindex="0"             aria-controls="myTable" type="button"><span>نسخ</span></button> \
                </li>\
\
                <li><button class="btn btn-default buttons-csv buttons-html5" tabindex="0"             aria-controls="myTable" type="button"><span>نسخ</span></button> \
                </li>\
\
                <li><button class="btn btn-default buttons-print buttons-html5" tabindex="0"             aria-controls="myTable" type="button"><span>نسخ</span></button> \
                </li>\
                <li><button class="btn btn-default buttons-excel buttons-html5" tabindex="0"             aria-controls="myTable" type="button"><span>نسخ</span></button></li></ul>');

*/

    /*$('.selectpicker').selectpicker();

*/


     function getdateajax(argument) {


         console.log("/"+argument.url['url']+"/"+argument.id['id']);

         $.ajax({
          method: "GET",
          url: "/"+argument.url['url']+"/"+argument.id['id'],
          data: {  }
        })
          .done(function( msg ) {

            var g = Object.keys(msg['item']);
            $('#content-view').empty();


            for(var i =0 ; i < Object.keys(argument.keys).length;i++)
            {


                 var result=msg['item'][argument.keys[Object.keys(argument.keys)[i]]];
                if(msg['item'][argument.keys[Object.keys(argument.keys)[i]]]==null)
                    result='فارغ';

                 $('#content-view').append('<div class="col-xs-12" style=" background: #fff;border-bottom: 1px solid #eee;padding: 6px;">\
                    <div class="col-xs-5"><span class="fa fa-check" style="color:#07a3bf;"></span> '+Object.keys(argument.keys)[i] +'</div>\
                    <div class="col-xs-7" style="">'+result+'</div></div>' ) ;
            }
          });
        }



    $('.dataTables_filter input').focus();
    </script>


    <script src="/js/datapicker.js"></script>


    <script type="text/javascript">
        (function(){
            $('.dp-peter').datepicker({
                firstDay: 0
            });
            $('.dp-peter').data('datepicker');

        })();

    </script>








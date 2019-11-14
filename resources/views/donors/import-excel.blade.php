<style type="text/css">
  .show-scroll::-webkit-scrollbar {
  width: 10px;
}

/* Track */
.show-scroll::-webkit-scrollbar-track {
  background: #f1f1f1;
}

/* Handle */
.show-scroll::-webkit-scrollbar-thumb {
  background: #888;
}

/* Handle on hover */
.show-scroll::-webkit-scrollbar-thumb:hover {
  background: #555;
}
</style>
@extends('const.const')
@section('content')
<div class="col-sm-12  row" style="padding: 8px;margin-top: 55px">
    <div class="panel panel-default col-sm-12  ">




      <div class="panel-heading col-sm-12 row" style="padding: 0px;background: red;">
            <div class="panel-body col-sm-12 row" style=" background: #2381c6;color: #fff;padding:  20px 5px; ">

                <div class="col-sm-6 " style="padding: 4px">
                    <span class="fal fa-file-import" style="color: var(--orange-light-color);margin-right: 10px;padding-left: 20px;font-size: 22px;"></span> ملخص
                </div>
     

            </div>
        </div>





        <div class="panel-body col-12 row show-scroll" style="padding: 0px;">

          <div class="col-12 row " style="border-bottom: 2px solid var(--orange-color)">
                  <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                      <div class="text-center mt-3 py-4  px-0 row " style="border-radius: 8px!important;box-shadow: 0px 0px 10px #dadada;margin: 20px auto">
                          <div class="col-3 text-right px-0">
                              <span class="fal fa-check" style="color: var(--orange-color);font-size: 30px;"></span>
                          </div>
                          <div class="col-9 text-left">
                              <h6 class="my-0  mb-2 pb-2">العمليات الناجحة</h6>

                              <h6  class="my-0 py-0 mt-2" style="font-size: 16px;"><span style="letter-spacing: 2px;font-weight: bold;"> 
 
                                {{$total_success_amount_money}}
                               </span>  ريال
                             </h6>
                          </div>
                      </div>
                  </div>


                  <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                      <div class="text-center mt-3 py-4  px-0 row " style="border-radius: 8px!important;box-shadow: 0px 0px 10px #dadada;margin: 20px auto">
                          <div class="col-3 text-right px-0">
                              <span class="fal fa-times" style="color: var(--orange-color);font-size: 30px;"></span>
                          </div>
                          <div class="col-9 text-left">
                              <h6 class="my-0 py-0">العمليات  المتعثرة</h6>
                              <h6  class="my-0 py-0 mt-2" style="font-size: 16px; ">  <span style="letter-spacing: 2px;font-weight: bold;"> 
                                {{$total_failed_amount_money}}
                               </span> ريال </h6>
                          </div>
                      </div>
                  </div>

                  <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                      <div class="text-center mt-3 py-4  px-0 row " style="border-radius: 8px!important;box-shadow: 0px 0px 10px #dadada;margin: 20px auto">
                          <div class="col-3 text-right px-0">
                              <span class="fal fa-info" style="color: var(--orange-color);font-size: 30px;"></span>
                          </div>
                          <div class="col-9 text-left">
                              <h6 class="my-0 py-0">العمليات الاخري</h6>
                              <h6  class="my-0 py-0 mt-2" style="font-size: 16px; "> <span style="letter-spacing: 2px;font-weight: bold;"> 
                                {{$total_another_amount_money}}
                               </span>  ريال</h6>
                          </div>
                      </div>
                  </div>
 




                </div>



              <div class="col-12 " style=" padding: 0px 5px;  height: 80vh;overflow-x: hidden;overflow-y: auto;">



                



                <h3 class="mt-5 mb-0">العمليات الناجحة <span class="badge badge-info">{{count($successeded_operations)}}</span> </h3>
                <table   class="table table-striped table-bordered">
                  <tbody>
                    @for($i=0;$i<count($successeded_operations);$i++)
                      <tr>
                      
                        @for($x=0;$x<count($successeded_operations[$i]['operation']) ;$x++)
                     
                           <td>{{$successeded_operations[$i]['operation'][$x]}}</td>
                      
                          
                        @endfor
                        <td style="background: var(--orange-light-color)">{{$successeded_operations[$i]['type']}}</td>
                    @endfor
                   </tr>
                  </tbody>
                </table>

                <h3 class="mt-5 pt-4">العمليات المتعثرة <span class="badge badge-info">{{count($failed_operations)}}</span> </h3>
                <table   class="table table-striped table-bordered">
                  <tbody>
                    @for($i=0;$i<count($failed_operations);$i++)
                      <tr>
                      


                       <td><a target="_blank" href="/donors/{{$failed_operations[$i]['operation'][0]}}/edit">{{$failed_operations[$i]['operation'][1]}}</a>  </td>

                  
                        <td><a target="_blank" href="/donors/{{$failed_operations[$i]['operation'][0]}}/stop">ايقاف</a>  </td>

                        <td style="background: var(--orange-light-color);">{{$failed_operations[$i]['type']}}</td>
                        
                    @endfor
                   </tr>
                  </tbody>
                </table>


                <h3 class="mt-5 pt-4">العمليات اخري <span class="badge badge-info">{{count($another_operations)}}</span> </h3>
                <table   class="table table-striped table-bordered">
                  <tbody>
                    @for($i=0;$i<count($another_operations);$i++)
                      <tr>
                      
                        @for($x=0;$x<count($another_operations[$i]['operation']) ;$x++)
                           <td>{{$another_operations[$i]['operation'][$x]}}</td>
                        @endfor

                        <td style="background: var(--orange-light-color)">{{$another_operations[$i]['type']}}</td>
                    @endfor
                   </tr>
                  </tbody>
                </table>


                





              </div>
              <!-- /.content -->

        </div>
    </div>
</div>


 

@endsection

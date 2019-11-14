
<div style="position: fixed;left: -15px;height: 900px;width: 400px;background: #fff;z-index: 123456;border-radius:0px; border:1px solid #eee;left: -400px;" id="show-view">
    <div class="col-sm-12">
        <div class="col-sm-10" style="padding: 13px ">
             عرض البيانات
        </div>

        <div class="col-sm-2" style="direction: unset;padding: 10px 0px;text-align: left; ">
             <span class="fa fa-times " style="color: #fcfcfc;background: #b3b3b3;padding: 5px 7px;border-radius: 50%;font-size: 10px;margin-top: 6px;cursor: pointer;z-index: 1;position: relative;" onclick="
            
             $('.real-content').css('filter','blur(0px)');
             $('#show-view').css('left','-420px');

             setTimeout(function(){
                $('#show-view').fadeOut('fast');
                $('.layered-up').css('display','none');
             },200);

             
             "></span>
        </div>
        <div  class="col-sm-12 text-right">
            <img src="/system_images/info.png" style=" display: inline-block;font-size: 30px;color: #bbb; ;background: #fff; position: relative;z-index: 111;height: 60px;width: 60px;padding: 5px;background: #fff"> 
            <div class="col-sm-12"  style="background: #bbb;height: 2px;position: relative;top: -20px;"> </div>
        </div>
        <div class="col-sm-12" style="padding-top: 20px;height: 40px;">
            <div id="content-view"  >
                 
            </div>
        </div>
        
        
    </div>
</div>

 <div class="col-sm-12 layered-up" style="position: fixed;height: 900px;width: 100%;background: rgba(22, 38, 63, 0.01);z-index: 1222;display: none;" onclick="
            
             $('.real-content').css('filter','blur(0px)');
             $('#show-view').css('left','-420px');

             setTimeout(function(){
                $('#show-view').fadeOut('fast');
                $('.layered-up').css('display','none');
             },200);

             
             ">
  </div>






  
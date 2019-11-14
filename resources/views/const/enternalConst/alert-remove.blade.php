<div style="position: absolute; background: rgba(255, 255, 255, 0.83);z-index: 111;width: 100%;height: 900px;left: 0px;top: 0px;display: none;" class="alert-layer">
      <form method="POST" action="" id="remove-target">
          @csrf
          {{ method_field('delete') }}
          <div  style="position: absolute;width: 500px;height:200px;background: ;z-index: 112;right: 0px;left: 0px;margin-left: auto;margin-right: auto;top: 150px;border:1px dashed #2381c6;background: #fff;"  class="row">
            <div class="col-12   text-center" >
                <span  style="font-size: 19px;background: #fff;position: relative;top: -13px;padding: 0px 10px;">هل انت متاكد من الحذف ؟</span>
            </div>
            <div class="col-6   text-center" style="padding-top: 0px">
                <img src="https://cdn1.iconfinder.com/data/icons/human-emotions/100/emotions-43-512.png" style="width: 100px;height: 100px;">
            </div>
            <div class="col-6  " style="padding-top: 40px;">
                <button href="#" class="btn btn-success" style="color: #fff" ><span  style="margin: 0px 10px;width: 60px;border-radius: 0px;">
                      نعم
                  </span>
                </button>
                <span class="btn btn-info" style="margin: 0px 10px;width: 60px;border-radius: 0px;" onclick="$('.alert-layer').fadeOut();">لا</span>
            </div>
        </div>
      </form>

</div>

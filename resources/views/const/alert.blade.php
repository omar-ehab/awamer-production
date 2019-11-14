<?php $count=count($errors->all()); ?>
@if(session()->has('data') || $count  )   
 
    <div style=" width: 400px; background: #101c2f;z-index: 111;float: left;position: fixed;left: 40px;top:80px;opacity: .9;padding: 12px;border-radius: 5px;cursor: pointer;padding-bottom: 22px" class="col-sm-12 row cust-alert">
        <p style="color: #fff;"> 
        <div class="col-sm-12 row" style="padding: 0px;">
            


            <div class="col-sm-12 row" style="padding: 0px;color: #fff">

                @if(session()->has('data'))
                <div class="col-sm-12 row" style="margin-top: 4px;">
                    <div class="col-xs-3">
                        <div class="col-sm-12 row">
                            <span class="fa fa-info btn-{{  session('data')['alert-type'] }}" style="color: #fff;padding: 6px 10px;border-radius: 50%;border:1px solid #eee"></span>
                        </div>
                    </div>
                    <div class="col-xs-9 harma" style="padding: 5px ">
                        {{  session('data')['alert'] }} 
                    </div>
                </div>
                @endif
            
            
           
            @foreach ($errors->all() as $message) 
            <div class="col-sm-12 row" style="margin-top: 4px">
                <div class="col-xs-3">
                    <div class="col-sm-12 row">
                        <span class="fa fa-info btn-danger" style="color: #fff;padding: 6px 10px;border-radius: 50%;border:1px solid #eee"></span>
                    </div>
                </div>
                <div class="col-xs-9 harma" style="padding: 5px ">
                    {{ $message }}
                </div>
            </div>
            @endforeach
          
                
            </div>
        </div>       
        </p>
    </div>
@endif













<div style=" width: 400px; background: #101c2f;z-index: 111;float: left;position: fixed;left: 40px;top:80px;opacity: .9;padding: 12px;border-radius: 5px;cursor: pointer;padding-bottom: 22px;display: none;" class="col-sm-12 row cust-alert">
        <p style="color: #fff;"> 
        <div class="col-sm-12 row" style="padding: 0px;">
            <div class="col-sm-12 row" style="padding: 0px;color: #fff">
            <div class="col-sm-12 row" style="margin-top: 4px">
                <div class="col-xs-3">

                    <div class="col-sm-12 row">
                        <span class="fa fa-info alert-type-ajax" style="color: #fff;padding: 6px 10px;border-radius: 50%;border:1px solid #eee"></span>
                    </div>
                </div>
                <div class="col-xs-9 harma alert-content-ajax" style="padding: 5px ">
                    
                </div>
            </div>     
            </div>
        </div>       
        </p>
    </div>


    

 
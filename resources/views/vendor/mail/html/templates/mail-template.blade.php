@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            {{ config('app.name') }}
        @endcomponent
    @endslot

    {{-- Body --}}
    <div class=" px-0   py-5 mb-0 px-4 " style="background: #fff;box-shadow: 0px 12px 12px #eee;text-align: right!important;width: 100%" >
 		<h4>{{$mail_text}}</h4>
 	</div>

 

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            © {{ date('Y') }} {{ config('app.name') }}. @lang('جميع الحقوق محفوظة')
        @endcomponent
    @endslot
@endcomponent



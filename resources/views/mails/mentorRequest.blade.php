@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => url('/')])
            <img src="{{asset('img/logo.png')}}" height="80px"/>
        @endcomponent
    @endslot{{-- Body --}}
    {!! nl2br("Hello Admin,\r\n\r\nThis notification has been sent to alert you about the new mentor request by host with email: <b>$email</b>\r\n\r\nBest Regards,\r\nIn2Science") !!}
    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            © {{ date('Y') }}  <a href="http://in2science.org.au/"> In2Science.com </a>
        @endcomponent
    @endslot
@endcomponent

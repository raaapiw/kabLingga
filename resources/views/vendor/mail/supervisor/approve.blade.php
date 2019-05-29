@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            Monitoring Minba PTSI
        @endcomponent
    @endslot
{{-- Body --}}
Shipping Perusahaan {{$report->shipping->client->nama_PT}} sudah selesai.
<br>
<br> 
SEGERA LAKUKAN APPROVE UNTUK PRINT LS-L
<br>

<a href="127.0.0.1:8000/login" class="btn btn-success" target="_blank">Monitoring Minba PTSI</a>
{{-- Subcopy --}}
    @isset($subcopy)
        @slot('subcopy')
            @component('mail::subcopy')
                {{ $subcopy }}
            @endcomponent
        @endslot
    @endisset
{{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            © Surveyor Indonesia
        @endcomponent
    @endslot
@endcomponent
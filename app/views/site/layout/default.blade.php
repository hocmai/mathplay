@include('site.common.header')
    
@include('site.common.main-menu')

@section('breadcrumb')
@show

@section('slide')
@show
<main>

    @yield('content_front')

    @section('content')
    @show

</main>
@include('site.common.footer')
    @section('footer_content')
        <div id="lof_go_top">
            <span class="ico_up"></span>
        </div>
    @show

</div>

@section('js_header')
{{ HTML::script('frontend/js/jquery.min.js')}}
{{ HTML::script('frontend/js/bootstrap.min.js')}}

{{ HTML::script('frontend/js/slick.min.js')}}
{{ HTML::script('frontend/js/menu-mobile.js')}}
{{ HTML::script('frontend/js/jquery-ui.js')}}
{{ HTML::script('frontend/js/touch-punch.jquery.ui.js')}}
{{ HTML::script('frontend/js/myscript.js')}}

{{-- {{ HTML::script('frontend/js/main.js') }} --}}
@show
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="js/html5shiv.min.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
</body>
</html>
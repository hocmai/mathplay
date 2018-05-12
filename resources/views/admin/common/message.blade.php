@if (count($errors->all()) > 0)
<div class="alert alert-danger alert-block">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	{!! app('html')->ul($errors->all()) !!}
</div>
@endif

@if ($message = session()->get('success'))
<div class="alert alert-success alert-block">
    <i class="fa fa-check"></i>
	<button type="button" class="close" data-dismiss="alert">&times;</button>
    @if(is_array($message))
    @foreach ($message as $m)
    {{ $m }}
    @endforeach
    @else
    {{ $message }}
    @endif
</div>
@endif

@if ($message = session()->get('error'))
<div class="alert alert-danger alert-dismissable">
    <i class="fa fa-ban"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    @if(is_array($message))
    @foreach ($message as $m)
    {{ $m }}
    @endforeach
    @else
    {{ $message }}
    @endif
</div>
@endif

@if ($message = session()->get('warning'))
<div class="alert alert-warning alert-block">
    <i class="fa fa-warning"></i>
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    @if(is_array($message))
    @foreach ($message as $m)
    {{ $m }}
    @endforeach
    @else
    {{ $message }}
    @endif
</div>
@endif

@if ($message = session()->get('notice'))
<div class="alert alert-warning alert-block">
    <i class="fa fa-warning"></i>
	<button type="button" class="close" data-dismiss="alert">&times;</button>
    @if(is_array($message))
    @foreach ($message as $m)
    {{ $m }}
    @endforeach
    @else
    {{ $message }}
    @endif
</div>
@endif

@if ($message = session()->get('info'))
<div class="alert alert-info alert-block">
    <i class="fa fa-info"></i>
	<button type="button" class="close" data-dismiss="alert">&times;</button>
    @if(is_array($message))
    @foreach ($message as $m)
    {{ $m }}
    @endforeach
    @else
    {{ $message }}
    @endif
</div>
@endif

@if (session()->has('message'))
    <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong><center>{{ session()->get('message') }}</center></strong>
    </div>
@endif

@extends('layout')
@section('content')
                
@foreach($contact as $key => $cont)
<div class="google-map-area">
    <div id="googleMap">{!!$cont->info_map!!}</div>
</div>
<br><br><br><br><br>
@endforeach
@endsection
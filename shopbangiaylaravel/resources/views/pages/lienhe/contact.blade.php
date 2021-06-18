@extends('layout')
@section('content')
                
@foreach($contact as $key => $cont)
<br>
<div class="contact-area">
    <div class="container-fluid p-0">
        <div class="row no-gutters">
            <!-- <div class="col-md-12 col-lg-6" style="background: #f2f2f2;">
                <div class="google-map-area">
                    <div id="googleMap">{!!$cont->info_map!!}</div>
                </div>
            </div> -->
            <div class="col-md-12">
                <div class="raavin-address">
                    <h2 class="contact-title">CONTACT US</h2>
                    <p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram anteposuerit litterarum formas human.</p>
                    <ul>
                        <li><i class="fa fa-fax"></i> Address : {!!$cont->info_map!!}</li>
                        <li><i class="fa fa-phone"></i> +(1234) 567 890</li>
                        <li><i class="fa fa-envelope-o"></i> info@yourdomain.com</li>
                    </ul>
                    <div class="working-time">
                        <h3><strong>Working hours</strong></h3>
                        <p><strong>Monday – Saturday</strong>: &nbsp;08AM – 22PM</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
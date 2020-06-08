@extends('front.layouts.app')

@section('content')

@if($detail->image)
<div class="breadcrumbs overlay" data-stellar-background-ratio="0.7" style="background-image: url('{{asset('images/main/'.$detail->image)}}');">
@else
<div class="breadcrumbs overlay" data-stellar-background-ratio="0.7" style="background-image: url('/assets/front/images/slider/3.jpg');">
@endif
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul class="list">
                    <li><a href="/">Home</a></li>

                    <li><a href="#">{{$detail->title}}</a></li>
                </ul>
                <h2>{{$detail->title}}</h2>
            </div>
        </div>
    </div>
</div>
<div class="inner-section-area section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-md-12 single-page-text">



                        <div class="detail_blog">

                            {!! $detail->description !!}

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

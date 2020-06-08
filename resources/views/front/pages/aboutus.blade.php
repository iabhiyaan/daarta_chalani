@extends('front.layouts.app')

@section('content')
@if($detail->image)
<div class="breadcrumbs overlay" data-stellar-background-ratio="0.7" style="background-image: url('{{asset('images/main/'.$detail->image)}}');">
@else
<div class="breadcrumbs overlay" data-stellar-background-ratio="0.7" style="background-image: url('/assets/front/images/slider/2.jpg');">
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
            <div class="col-lg-12 col-md-12  col-12">
                <div class="sidebar-widget mb-30">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-12">
                            <h5>organization title</h5>
                            <p>{{$dashboard_composer->site_name}}</p>

                        </div>

                        <div class="col-lg-3 col-md-6 col-12">
                            <h5>Address</h5>
                            <p>{{$dashboard_composer->address}}</p>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <h5>Postal Address</h5>
                            <p>{{$dashboard_composer->post_box}}</p>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <h5>Contact</h5>
                            <p>{{$dashboard_composer->telephone}}</p>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <h5>Email</h5>
                            <p>{{$dashboard_composer->email}}</p>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-8 col-md-6  col-12">
                <div class="row">
                    <div class="col-md-12 single-page-text about_page">

                        {!! $detail->description !!}

                    </div>

                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                    <div class="sidebar-widget ">
                        <h3>Latest Destination</h3>
                        <div class="recent-post-widget">
                        @foreach($relatedDestination as $related)
                            <div class="recent-posts-content clearfix">
                                <div class="image-recent-post">
                                    <a href="{{route('packageDetails', $related->slug)}}">
                                        <img src="{{asset('images/thumbnail/'.$related->image)}}" alt="recent img">
                                    </a>
                                </div>
                                <div class="date-title-recent-post">
                                    <span class="recent-post-title">
                                        <a href="{{route('packageDetails',$related->slug)}}">{{$related->package_title}}</a>
                                    </span>
                                    <span class="recent-post-date">{{\Carbon\Carbon::parse($related->created_at)->format('d M, Y')}}</span>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>

        </div>
    </div>
</div>
@endsection

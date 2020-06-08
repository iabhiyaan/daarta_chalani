@extends('front.layouts.app')

@section('content')
    <div class="breadcrumbs overlay" data-stellar-background-ratio="0.7" style="background-image: url('{{asset('images/main/'.$details->banner_image)}}');">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="list">
                        <li><a href="/">Home</a></li>
                        <li><a href="{{route('blogList')}}">Blog</a></li>
                        <li><a href="#">Blog Details</a></li>
                    </ul>
                    <!-- <h2>{{$details->title}}</h2> -->
                </div>
            </div>
        </div>
    </div>
    <div class="inner-section-area section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-6 col-12">
                    <div class="row">
                        <div class="col-md-12 single-page-text">
                            <h1>{{$details->title}}</h1>
                            <p class="writers"><span><i class="fa fa-clock"></i>{{\Carbon\Carbon::parse($details->created_at)->format('d M, Y')}} </span></p>
                            <!-- <div class="about_image">
                                <img src="images/slider/1.jpg">
                            </div> -->
                            <div class="detail_blog trekkings">

                              {!! $details->description !!}
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="sidebar-widget">
                        <h3>Recent Blogs</h3>
                        <div class="recent-post-widget">
                          @foreach($relatedBlogs as $related)
                            <div class="recent-posts-content clearfix">
                                <div class="image-recent-post">
                                    <a href="{{route('blogDetails',$related->slug)}}">
                                        <img src="{{asset('images/thumbnail/'.$related->banner_image)}}" alt="recent img">
                                    </a>
                                </div>
                                <div class="date-title-recent-post">
                                    <span class="recent-post-title">
                                        <a href="{{route('blogDetails',$related->slug)}}">{{$related->title}}</a>
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

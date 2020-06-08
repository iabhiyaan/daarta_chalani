@extends('front.layouts.app')

@section('content')
<div class="breadcrumbs overlay" data-stellar-background-ratio="0.7" style="background-image: url('{{asset('images/main/'.$details->banner_image)}}');">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul class="list">
                    <li><a href="/">Home</a></li>
                    <li><a href="#">Destination Type</a></li>
                </ul>
                <h2>{{$details->title}}</h2>
            </div>
        </div>
    </div>
</div>
<div class="blog-section section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12  col-12">
              @foreach($destinations as $key => $desti)
                <div class="row">
                  @if($key % 2 != 0)
                    <div class="col-lg-12 col-md-12 m_b30">
                        <div class="blog-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="blog-img">
                                        <a class="post-pic" href="{{route('packageDetails', $desti->slug)}}">
                                            <img src="{{asset('images/listing/'.$desti->image)}}" title="pic-name">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="artical-info">
                                        <div class="post-head">
                                            <div class="post-head-left">
                                                <h4><a href="{{route('packageDetails', $desti->slug)}}">{{$desti->package_title}}</a></h4>
                                                <p class="author">

                                                    <span class="publish_time">{{\Carbon\Carbon::parse($desti->created_at)->format('d M, Y')}}</span>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="blog-desc">
                                            <p class="post-text">
                                                {{$desti->short_description}}
                                            </p>
                                            <div class="post-bottom">
                                                <a class="artbtn" href="{{route('packageDetails', $desti->slug)}}">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  @endif
                  @if($key % 2 == 0)
                    <div class="col-lg-12 col-md-12 m_b30">
                        <div class="blog-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12  only_mobile">
                                    <div class="blog-img">
                                        <a class="post-pic" href="{{route('packageDetails', $desti->slug)}}">
                                            <img src="{{asset('images/listing/'.$desti->image)}}" title="pic-name">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="artical-info">
                                        <div class="post-head">
                                            <div class="post-head-left">
                                                <h4><a href="{{route('packageDetails', $desti->slug)}}">{{$desti->package_title}}</a></h4>
                                                <p class="author">
                                                    <span class="publish_time">{{\Carbon\Carbon::parse($desti->created_at)->format('d M, Y')}}</span>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="blog-desc">
                                            <p class="post-text">
                                                {{$desti->short_description}}
                                            </p>
                                            <div class="post-bottom">
                                                <a class="artbtn" href="{{route('packageDetails', $desti->slug)}}">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12 only_desktop">
                                    <div class="blog-img">
                                        <a class="post-pic" href="{{route('packageDetails', $desti->slug)}}">
                                            <img src="{{asset('images/listing/'.$desti->image)}}" title="pic-name">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
              @endforeach
            </div>
        </div>
        <div class="pagination-section mt-5">
                <div class="row">
                    <div class="col-sm-4 offset-sm-4">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                              {{$destinations->links()}}
                            </ul>
                        </nav>
                    </div>
                </div>
        </div>
    </div>
</div>

@endsection

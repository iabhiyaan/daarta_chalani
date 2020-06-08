@extends('front.layouts.app')

@section('content')
@if($blogImage)
<div class="breadcrumbs overlay" data-stellar-background-ratio="0.7" style="background-image: url('{{asset('images/main/'.$blogImage->banner_image)}}');">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul class="list">
                    <li><a href="/">Home</a></li>
                    <li><a href="#">Blogs List</a></li>
                </ul>
                <!-- <h2>Nepal Adventure Tours & Travels Blogs</h2> -->
            </div>
        </div>
    </div>
</div>
@else
<div class="breadcrumbs overlay" data-stellar-background-ratio="0.7" style="background-image: url('{{asset('assets/front/images/slider/3.jpg')}}');">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul class="list">
                    <li><a href="/">Home</a></li>
                    <li><a href="#">Blogs List</a></li>
                </ul>
                <!-- <h2>Nepal Adventure Tours & Travels Blogs</h2> -->
            </div>
        </div>
    </div>
</div>
@endif
<div class="blog-section section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12  col-12">
                <div class="row">
                  @foreach($details as $data)
                    <div class="col-lg-6 col-md-12 m_b30">
                        <div class="blog-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="blog-img">
                                        <a class="post-pic" href="{{route('blogDetails',$data->slug)}}">
                                            <img src="{{asset('images/listing/'.$data->banner_image)}}" title="pic-name">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="artical-info">
                                        <div class="post-head">
                                            <div class="post-head-left">
                                                <h4><a href="{{route('blogDetails',$data->slug)}}">{{$data->title}}</a></h4>
                                                <p class="author">

                                                    <span class="publish_time">{{\Carbon\Carbon::parse($data->created_at)->format('d M, Y')}}</span>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="blog-desc">
                                            <p class="post-text">
                                                {{$data->short_description}}
                                            </p>
                                            <div class="post-bottom">
                                                <a class="artbtn" href="{{route('blogDetails',$data->slug)}}">Read More</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>


                        </div>
                    </div>
                  @endforeach

                </div>
            </div>
        </div>
        <div class="pagination-section mt-5">
                <div class="row">
                    <div class="col-sm-4 offset-sm-4">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                {{$details->links()}}
                            </ul>
                        </nav>
                    </div>
                </div>
        </div>
    </div>
</div>

@endsection

@extends('front.layouts.app')

@section('content')
@if($dashboard_composer->team_banner_image)
<div class="breadcrumbs overlay" data-stellar-background-ratio="0.7" style="background-image: url('{{asset('images/main/'.$dashboard_composer->team_banner_image)}}');">
@else
<div class="breadcrumbs overlay" data-stellar-background-ratio="0.7" style="background-image: url('/assets/front/images/slider/1.jpg');">
@endif
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="list">
                        <li><a href="/">Home</a></li>
                        <li><a href="#">Teams</a></li>
                    </ul>
                    <h2>Our Energetic Family Member </h2>
                </div>
            </div>
        </div>
    </div>
<div class="inner-section-area section">
        <div class="container">
            <div class="blog-list">

              @foreach($details->chunk(2) as $key => $data)
                <div class="row">

                    @if($key % 2 == 0)
                    @foreach($data as $record)

                    <div class="col-md-6 col-12  blog-left-image m_b25">
                        <div class="row nepal-blog">
                            <div class="col-sm-6 blog-image-head">
                                <div class="blog-image-border">
                                    <div class="blog-cover-border">
                                        <img src="{{asset('images/main/'.$record->image)}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 blog-head-background blog-arrow">
                                <div class="blog-text-inner">
                                    <h5> {{$record->name}}</h5>

                                    <h4><i class="fa fa-user"></i>{{$record->position}}</h4>
                                    <p>
                                       {{$record->description}}
                                    </p>

                                </div>
                            </div>
                        </div> <!-- inner row end  -->
                    </div> <!-- outer col-sm-6 end  -->
                  @endforeach
                  @endif
                </div>

                <div class="row">
                  @if($key % 2 != 0)
                      @foreach($data as $record)
                    <div class="col-md-6 col-12 blog-left-image">
                        <div class="row nepal-blog">
                            <div class="col-sm-6 blog-head-background blog-arrow-1">
                                <div class="blog-text-inner">
                                    <h5>{{$record->name}}</h5>
                                    <h4><i class="fa fa-user"></i> {{$record->position}}</h4>
                                    <p>
                                      {{$record->description}}
                                    </p>

                                </div>
                            </div>
                            <div class="col-sm-6 blog-image-head">
                                <div class="blog-image-border">
                                    <div class="blog-cover-border">
                                        <img src="{{asset('images/main/'.$record->image)}}">
                                    </div>
                                </div>
                            </div>
                        </div> <!-- inner row end  -->
                    </div> <!-- outer col-sm-6 end  -->
                 @endforeach
                 @endif

                </div> <!-- row table head end here -->
                @endforeach



            </div>
        </div>
    </div>

  @endsection

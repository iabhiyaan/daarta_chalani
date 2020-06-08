@extends('front.layouts.app')

@section('content')

@if(@$bannerImage)
<div class="breadcrumbs overlay" data-stellar-background-ratio="0.7" style="background-image: url('{{asset('images/main/'.$bannerImage->image)}}');">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="list">
                        <li><a href="/">Home</a></li>
                        <li><a href="#">Image Gallery</a></li>
                    </ul>
                    <h2>Our Gallery</h2>
                </div>
            </div>
        </div>
    </div>
@else
<div class="breadcrumbs overlay" data-stellar-background-ratio="0.7" style="background-image: url('/assets/front/images/slider/2.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="list">
                        <li><a href="/">Home</a></li>
                        <li><a href="#">Image Gallery</a></li>
                    </ul>
                    <h2>Our Gallery</h2>
                </div>
            </div>
        </div>
    </div>

@endif


    <section class="gallery-inner section">
        <div class="container">
            <!-- <div class="gallery-inner-title">
                <h3>Gallery</h3>
            </div> -->
            <div class="gallery-image-size">
                <div class="row">
                  @foreach($details as $data)
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="mains">
                            <div class="views">
                                <a href="{{route('galleryDetails', $data->slug)}}"><img src="{{asset('images/thumbnail/'.$data->image)}}" alt="Loading file"></a>
                                <a href="{{route('galleryDetails', $data->slug)}}"><div class="img-title">
                                    <h2>{{$data->title}}</h2>
                                </div></a>
                            </div>
                        </div>
                    </div>
              @endforeach


                </div>
            </div>
            <div class="pagination-section mt-5">
                <div class="container">
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
    </section>

@endsection

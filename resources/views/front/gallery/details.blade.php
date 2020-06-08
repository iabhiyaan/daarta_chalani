@extends('front.layouts.app')

@section('content')
    <div class="breadcrumbs overlay" data-stellar-background-ratio="0.7" style="background-image: url('{{asset('images/main/'.$bannerImage->image)}}');">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="list">
                        <li><a href="/">Home</a></li>
                        <li><a href="#">Inside Gallery</a></li>
                    </ul>
                    <h2>{{$details->title}}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="gallery-inner-page section">
        <div class="container">
            <div class="gallery-images">
                <div class="row no-gutters">
                  @foreach($galleryImages as $gimage)
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="gallery-view gallery-overlay">
                            <img src="{{asset('images/thumbnail/'.$gimage->image)}}" alt="Loading file" class="img-fluid ">
                            <div class="gallery-effect gallery-flex-center gallery-rgba">
                                <a href="{{asset('images/main/'.$gimage->image)}}" data-lightbox="roadtrip"  ><i class="fa fa-search-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                @endforeach
                </div>
            </div>
        </div>
    </div>


@endsection

@extends('front.layouts.app')

@section('content')
@if($dashboard_composer->testimonial_banner_image)
<div class="breadcrumbs overlay" data-stellar-background-ratio="0.7" style="background-image: url('{{asset('images/main/'.$dashboard_composer->testimonial_banner_image)}}');">
@else
<div class="breadcrumbs overlay" data-stellar-background-ratio="0.7" style="background-image: url('/assets/front/images/slider/1.jpg');">
@endif
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="list">
                        <li><a href="/">Home</a></li>
                        <li><a href="#">Testimonials</a></li>
                    </ul>
                    <h2>Our Testimonials </h2>
                </div>
            </div>
        </div>
    </div>
    <section class="testimonial-page-section sec-padding">
    <div class="test-overly"></div>
    <div class="container">
        <div class="row row-eq-height">
      @foreach($details as $data)
            <div class="col-lg-6 col-md-6 col-12 job_testimonial m_b45">
                <div class="testimonial_text">
                    <!-- <div class="testimonial_arrow"></div> -->
                    <div class="testimonial_image">
                    <img src="{{asset('images/main/'.$data->image)}}">
                    </div>
                    <h3>{{$data->name}}</h3>
                    <p>
                      {{$data->words}}
                    </p>
                </div>
            </div>
        @endforeach

        </div>
    </div>

</section>


@endsection

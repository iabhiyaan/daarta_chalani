@extends('front.layouts.app')

@section('content')
@if($dashboard_composer->contactus_image)
<div class="breadcrumbs overlay" data-stellar-background-ratio="0.7" style="background-image: url('{{asset('images/main/'.$dashboard_composer->contactus_image)}}');">
@else
<div class="breadcrumbs overlay" data-stellar-background-ratio="0.7" style="background-image: url('/assets/front/images/slider/1.jpg');">
@endif
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul class="list">
                    <li><a href="/">Home</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
                <h2>Contact Us</h2>
            </div>
        </div>
    </div>
</div>
<section id="contact-us" class="contact-us section">
    <div class="container">

        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-6 col-md-6 ">

              @if(session('message'))
                  <div class="alert alert-info alert-dismissible" id="successMessage">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      {{session('message')}}
                  </div>
              @endif
                <form class="form" method="post" action="{{route('enquirySave')}}">
                  @csrf
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <input type="text" name="name" placeholder="Name" required="required" class="form-control required">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <input type="email" name="email" placeholder="Email" required="required" class="form-control required">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input type="text" name="subject" placeholder="Subject" required="required" class="form-control required">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea name="message" rows="4" placeholder="Your Message" class="form-control required"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 text-right">
                            <div class="form-group button contact_button">
                              <input type="submit" name="contactus"  value="Send Message">
                                <!-- <button type="submit"  >Send Message</button> -->
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!--/ End Contact Form -->
            <div class="col-lg-4 col-md-6 p_t10">
                <div class="contact">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-12">
                            <!-- Single Contact -->
                            <div class="single-contact">
                                <ul>
                                    <li>
                                        <i class="fa fa-map-marker"></i>
                                    </li>
                                    <li>
                                        <h4>Our Location</h4>
                                        <p>{{$dashboard_composer->address}}</p>
                                    </li>
                                </ul>


                            </div>
                            <!--/ End Single Contact -->
                        </div>
                        <div class="col-lg-12 col-md-12 col-12">
                            <!-- Single Contact -->

                            <div class="single-contact">
                                <ul>
                                    <li>
                                        <i class="fa fa-mobile"></i>
                                    </li>
                                    <li>
                                        <h4>Contact Us</h4>
                                    <p>Telephone: {{$dashboard_composer->telephone}}</p>
                                    <p>
                                        <a href="mailto:{{$dashboard_composer->email}}">Email: {{$dashboard_composer->email}}</a>
                                    </p>
                                    </li>
                                </ul>

                            </div>
                            <!--/ End Single Contact -->
                        </div>
                        <div class="col-lg-12 col-md-12 col-12">

                            <div class="single-contact">
                                <ul>
                                    <li>
                                        <i class="fa fa-clock-o"></i>
                                    </li>
                                    <li>
                                        <h4>Working Times</h4>
                                        <p>
                                            {{$dashboard_composer->working_times}}
                                        </p>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="map-area wow fadeInUp" data-wow-delay="300ms">
        <div id="googleMap">
            <iframe src="https://www.google.com/maps/embed?pb=!1m22!1m8!1m3!1d3533.1264829626907!2d85.33079451506151!3d27.68248538280219!3m2!1i1024!2i768!4f13.1!4m11!3e6!4m3!3m2!1d27.6825193!2d85.3330608!4m5!1s0x39eb1941bee8fd3b%3A0x32ba8029d5f9110e!2sWeb+House+Nepal+Pvt.+Ltd.%2C+Shankhamul+Marg%2C+Kathmandu+44600!3m2!1d27.682432!2d85.33295849999999!5e0!3m2!1sen!2snp!4v1542008710775" width="100%" height="550" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
    </div>

  @endsection

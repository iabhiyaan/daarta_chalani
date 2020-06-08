@extends('front.layouts.app')

@section('content')

<div class="contant_wrapper">

	<div class="home_slider">
		<section class="inquiry_form p_a15 res_d_none">
			@if(session('message'))
			    <div class="alert alert-info alert-dismissible" id="successMessage">
			        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			        {{session('message')}}
			    </div>
			@endif
		<form action="{{route('enquirySave')}}" method="post" class="form form-horizontal form-responsive">
			@csrf
			<div class="row form-group">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div class="text-center text-uppercase white font_18 font_weight600 m_b15">
						inquiery online
					</div>
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div class=" text-capitalize font_16  m_b15">
						<input type="text" name="name" class="form-control" required placeholder="Full name:">
					</div>
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div class=" text-capitalize font_16  m_b15">
						<input type="text" name="email" class="form-control" required placeholder="Email:">
					</div>
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div class=" text-capitalize font_16  m_b15">
						<input type="text" name="contact" class="form-control" required placeholder="Contact:">
					</div>
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div class=" text-capitalize font_16  m_b15">
						<textarea name="message" id=""   rows="3" class="form-control" required placeholder="What do you looking for"></textarea>
					</div>
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div class="text-right text-capitalize font_16  m_b15">
						<input type="submit" class="btn btn-info" name="enquiry" value="Submit">
						<!-- <button type="submit" class="btn btn-info">Submit</button> -->
					</div>
				</div>
			</div>
		</form>
	</section>
		<div class="home_banner owl-carousel home_owl_slider">
			@foreach($sliders as $slider)
				<div class="home_slider_item">
					<img src="{{asset('images/main/'.$slider->image)}}" alt="">
					<div class="slider_caption">
						<h4>
							{{$slider->title}}
						</h4>
						<h2>
						 	{{$slider->subtitle}}
						</h2>
						<div class="text-center text-capitalize m_t45">
							<a href="{{route('getPages', 'about-us')}}" class="btn all_team">LETS EXPLORE</a>
						</div>
					</div>
				</div>
			@endforeach
		</div>
	</div>


	<section class="our_over_view p_tb45">
		<div class="container">
			<div class="row">

      @foreach($pillers as $key => $piller)
				<div class="col-lg-3 col-md-6 col-12 text-center">
				 	<div class="flat_icon">
				 		<span class="{{getClassNameForIcons($piller->slug)}}"></span>
				 	</div>
				 	<h2>{{$piller->name}}</h2>
				 	<p>
            {{$piller->description}}
				 	</p>
				</div>
      @endforeach
			</div>
		</div>
	</section>

@if(@$holidays->count() > 0)
	<section class="things_to p_tb45">
		<div class="container">
			<div class="text-center text-uppercase font_weight600">
				<h1 class="font_weight900 font_35 section_title"><span class="title_first">Holidays</span></h1>
			</div>
			<div class="row">
				<div class="col-lg-6 col-md-12 col-12">
					<div class="height_manage">

						<div class="grid">
							<figure class="effect-julia main_thumbnail">
								<img src="{{asset('images/listing/'.$holidays->first()->image)}}" alt="Best Paragliding in Pokhara">
								<figcaption>
									<h2>{{$holidays->first()->package_title}}</h2>
									<span>{{$holidays->first()->destination_name}}</span>
									<div class="hover_text">
										<p>{{str_limit($holidays->first()->short_description, 200)}}</p>
									</div>
									
									<a href="{{route('packageDetails',$holidays->shift()->slug)}}">View more</a>
								</figcaption>
							</figure>
						</div>
					</div>
				</div>

				<div class="col-lg-6 col-md-12 col-12">
					<div class="row">
						@foreach($holidays->all() as $nextHoliday)
						<div class="col-lg-6 col-md-6 col-12">
							<div class="grid">
								<figure class="effect-julia other_thumb">
									<img src="{{asset('images/listing/'.$nextHoliday->image)}}" alt="Best Paragliding in Pokhara">
									<figcaption>
										<h2>{{$nextHoliday->package_title}}</h2>
										<span>{{$nextHoliday->destination_name}}</span>
										<div class="hover_text">
											<p>{{str_limit($nextHoliday->short_description, 100)}}</p>
										</div>
										<a href="{{route('packageDetails', $nextHoliday->slug)}}">View more</a>
									</figcaption>
								</figure>
							</div>
						</div>
          @endforeach
					</div>
				</div>
			</div>

		</div>
	</section>
  @endif

  @if(@$featuredtrips->count() > 0)
	<section class="p_t45 p_b130 overflow_hidden">
		<div class="container">
			<div class="text-center text-uppercase font_weight600 p_b30">
				<h1 class="font_weight900 font_35 section_title"><span class="title_first">Featured</span> Trips</h1>
			</div>
		</div>
		<div class="styled_background">
			<div class="featured_background">
				<img src="{{asset('images/main/'.$dashboard_composer->featured_trips_image)}}" alt="">
			</div>
			<div class="container feature_container">
				<div class="row no-gutters">
					@foreach($featuredtrips as $featured)
	                <div class="col-lg-3 col-md-6 col-sm-12">
	                    <div class="packege_cover">
	                        <div class="ribbon popular">
	                            <span>Featured</span>
	                        </div>
	                        <div class="cost">
	                            <span class="price">$ {{$featured->price}}
	                                <span class="back_ribon"></span>
	                            </span>
	                        </div>
	                        <div class="packege_image">
	                            <a href="{{route('packageDetails', $featured->slug)}}">
	                                <img src="{{asset('images/listing/'.$featured->image)}}" alt="">
	                            </a>
	                        </div>
	                        <div class="packege_body">
	                            <div class="packege_name">
	                                <a href="{{route('packageDetails', $featured->slug)}}">
	                                   {{$featured->package_title}}
	                                </a>
	                            </div>
	                            <div class="packege_duration">
	                                <i class="fa fa-moon"></i>{{$featured->days_and_nights}}
	                            </div>

	                            <div class="packege_short">
	                                {{str_limit($featured->short_description, 200)}}
	                            </div>

	                            <div class="grab_now ">
	                                <a href="{{route('bookPackage', $featured->slug)}}" class="btn ">grab now</a>
	                                <a href="{{route('packageDetails', $featured->slug)}}" class="btn btn-primary">view more</a>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	        @endforeach
				</div>
			</div>
		</div>
	</section>
@endif

	<section class="p_b65">
		<div class="row no-gutters">
			<div class="col-lg-6 col-sm-12 box_back_image" style="background-image: url('{{asset('images/main/'.$dashboard_composer->slogan_imagefirst)}}');">
				<div class="height_manage">
					<div class="box_cover">
						<div class="pull-right p_r45 p_tb45">
							<div class="box_title text-right">
								{{$dashboard_composer->sloganfirst}}
							</div>
							<div class="short_text text-right max_540">

									{{$dashboard_composer->sfdescription}}

							</div>

						</div>
					</div>

				</div>
			</div>
			<div class="col-lg-6 col-sm-12 box_back_image" style="background-image: url('{{asset('images/main/'.$dashboard_composer->slogan_imagesecond)}}');">
				<div class="height_manage back_image">
					<div class="box_cover1">
						<div class="pull-left p_l45 p_tb45">
							<div class="box_title">
								{{$dashboard_composer->slogansecond}}
							</div>
							<div class="short_text text-left max_540">

							{{$dashboard_composer->ssdescription}}

							</div>

						</div>
					</div>

				</div>
			</div>
		</div>

	</section>
@if($outboundtrips->count() > 2)
	<section class="p_tb45">
		<div class="container">
			<div class="text-center text-uppercase font_weight600">
				<h1 class="font_weight900 font_35 section_title"><span class="title_first">OUTBOUND</span>TRIPS</h1>
			</div>
			<div class="row">
				<div class="col-lg-9 col-sm-12">
					<div class="row">
          @php $outbounds = $outboundtrips->splice(2,2); @endphp
					@foreach($outbounds as $outbound)
						<div class="col-lg-6 col-sm-12">
							<div class="out_bound_image">
								<a href="{{route('packageDetails', $outbound->slug)}}">
									<img src="{{asset('images/listing/'.$outbound->image)}}" alt="">
								</a>
								<div class="trip_length">
									{{$outbound->days_and_nights}}
								</div>
							</div>
							<div class="outbound_title">
								{{$outbound->package_title}}
							</div>
							<div class="out_bound_text">
								{{str_limit($outbound->short_description, 200)}}
							</div>
							<div class="grab_now text-right">
	               <a href="{{route('packageDetails', $outbound->slug)}}" class="btn btn_outbound">more</a>
	            </div>
						</div>
				@endforeach
					</div>
				</div>
				<div class="col-lg-3 col-md-12 col-sm-12">
					<div class="row">
						@foreach($outboundtrips->all() as $outtrips)
						<div class="col-lg-12 col-md-6 col-sm-12 res_p_lr5 m_b25">
							<div class="row">
								<div class="col-lg-5  col-md-5 col-sm-12 out_bound_side">
									<div class="side_image">
										<a href="{{route('packageDetails', $outtrips->slug)}}">
											<img src="{{asset('images/thumbnail/'.$outtrips->image)}}" alt="">
											<div class="trip_length">
												{{$outtrips->days_and_nights}}
											</div>
										</a>
									</div>


								</div>
								<div class="col-lg-7 col-md-7 col-sm-12 res_p_lr5">
									<a href="{{route('packageDetails', $outtrips->slug)}}" class="outbound_side_title">
										{{str_limit($outtrips->short_description,50)}}
									</a>
								</div>
							</div>
						</div>
					@endforeach
						<!-- <div class="col-lg-12 col-sm-12">
							<div class="grab_now text-right">
	                            <a href="outbound.php" class="btn btn_outbound">all outbound</a>
	                        </div>
						</div> -->
					</div>
				</div>

			</div>
		</div>
	</section>
@endif


@if(@$homepagevideo)
	<section class="testimonials p_tb45" style="background-image: url('{{asset('images/main/'.$dashboard_composer->latest_video_backgroundimage)}}')">
		<div class="container">

            <div class="row">
            	<div class="col-lg-6 col-md-12 col-sm-12">
            		<h1 class="white font_35 ourClientSaying">Latest Video  </h1>
            		<div class="row latest_video p_t25">
            			<iframe src="https://www.youtube.com/embed/{{$homepagevideo->youtubeVideo($homepagevideo->link)}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen ></iframe>
            		</div>
            	</div>
                <div class="col-lg-6   col-12 testominial_slide height_manage">
                	<h1 class="white font_35 ourClientSaying">Client's Reviews  </h1>
                    <div class="owl-carousel testimonial_slider">
                    	<!-- first testimonial -->

									@foreach($testimonials as $testimonial)
                        <div class="testimonial_block">
                        	<div class="row">
                        		<div class="col-lg-12 col-md-12 col-12">
		                            <div class="client_image">
		                                <img src="{{asset('images/main/'. $testimonial->image)}}" alt="">
		                            </div>
                        		</div>
                        		<div class="col-lg-12 col-md-12 col-12">
                        			<div class="testimonial_box">
	                        			<div class="client_name">
			                                <span class="testi_name">
				                                {{$testimonial->name}}
				                            </span>
			                            	<p>{{$testimonial->post}}</p>
			                            	<div class="testiBack">
	                                		<span class="breakline"></span>
	                                		<span class="breakline"></span>
	                                		<span class="breakline"></span>
	                                		<span class="breakline"></span>
	                                	</div>

			                            </div>

			                            <div class="testimonial_body">

			                                <div class="testi_text">
                         									{{$testimonial->words}}
			                                </div>
			                            </div>

                        			</div>
                        		</div>
                        	</div>
                        </div>
										@endforeach

                        <!-- third testimonial -->

                    </div>
                </div>
            </div>
        </div>
	</section>
@endif

</div>

@endsection

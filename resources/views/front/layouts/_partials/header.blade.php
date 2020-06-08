
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 <title>Highvision Adventure trek - Home</title>
 
   <meta name="description" content="Nepal Adventure Tours & Travels  is the leading travel agency in nepal since 2010"/>
   <meta property="og:locale" content="en_GB" />
   <meta property="og:type" content="website" />
   <meta property="og:title" content="Nepal Adventure Tours & Travels travelling " />
   <meta property="og:description" content="Nepal Adventure Tours & Travels  is the leading travel agency in nepal since 2010" />
   <meta property="og:url" content="https://www.Nepal Adventure Tours & Travelstravel.com/" />
   <meta property="og:site_name" content="Nepal Adventure Tours & Travelstravel" />
   <meta name="twitter:card" content="summary" />
   <meta name="twitter:description" content="Nepal Adventure Tours & Travels  is the leading travel agency in nepal since 2010" />
   <meta name="twitter:title" content="Nepal Adventure Tours & Travels travelling" />
   <meta name="keywords" content="best traveling agency in nepal ">
   <meta name="keyphrase" content="traveling acency in nepal, tours and travel  in nepal, traveling company in nepal "/>
   <meta name="allow-search" content="yes"/>
   <meta name="auther" content="https://Nepal Adventure Tours & Travelstravel.com"/>
   <meta name="visit-after" content="30 days"/>
   <meta name="copyright" content="2019 Nepal Adventure Tours & Travels travel"/>
   <meta name="coverage" content="Worldwide"/>
   <meta name="identifier" content="https://Nepal Adventure Tours & Travelstravel.com"/>
   <meta name="language" content="en"/>
   <meta name="Robots" content="noodp, noydir, index, follow, archive"/>
   <meta name="Googlebot" content="index, follow"/>
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">




   <link rel="canonical" href="https://www.Nepal Adventure Tours & Travelstravel.com/" />
   <link rel="stylesheet" href="{{asset('assets/front/css/flaticon.css')}}">
   <link rel="next" href="https://Nepal Adventure Tours & Travelstravel.com/">
 <link rel="shortcut icon" rel="icon" href="images/logo.jpg" type="image/gif" />
 <link rel="stylesheet" href="{{asset('assets/front/css/bootstrap.min.css')}}">
 <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/animate.css')}}">
 <link rel="stylesheet" href="{{asset('assets/front/css/font-awesome.min.css')}}">
   <link rel="stylesheet" href="{{asset('assets/front/css/lightbox.css')}}">
 <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/owl.carousel.css')}}">
 <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
 <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,700,700i,900,900i" rel="stylesheet">
 <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/style.css')}}">
 <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/responsive.css')}}">
 @stack('styles')
</head>
<body>
 <div class="top_back p_tb5">
   <div class="container">

     <div class="row">
       <div class="col-lg-6 col-md-6 col-3 top_logo ">
         <ul class="Nepal Adventure Tours & Travels_full_name">
           <li>
             <a class="main_logo" href="/">
                 <img src="{{asset('images/main/'.$dashboard_composer->logo)}}" alt="">
               </a>
           </li>

         </ul>
       </div>
       <div class="col-lg-6 col-md-6 col-9 header_option">
         <ul class="header_list"> Find us on:

           <li>
             <a href="{{$dashboard_composer->facebook}}"> <span class="fa fa-facebook"></span></a>
           </li>
           <li>
             <a href="{{$dashboard_composer->twitter}}"><span class="fa fa-twitter"></span></a>
           </li>
           <li>
             <a href="{{$dashboard_composer->youtube}}"><span class="fa fa-youtube"></span></a>
           </li>
           <li>
             <a href="{{$dashboard_composer->linkedin}}"><span class="fa fa-linkedin"></span></a>
           </li>
           <li>
             <a href="{{$dashboard_composer->pinterest}}"><span class="fa fa-pinterest"></span></a>
           </li>
         </ul>
         <ul class="header_list">
           <li>
             <a href="mailto:{{$dashboard_composer->email}}"> <i class="fa fa-envelope"></i>{{$dashboard_composer->email}}</a>
           </li>
           <li>
             <a href="tel:+{{$dashboard_composer->mobile}}"> <i class=" fa fa-phone"></i> {{$dashboard_composer->mobile}}</a>
           </li>
         </ul>
       </div>

     </div>
   </div>

 </div>
 <div class="header_section">
   <div class="  header_all text-capitalize">
     <div class="top_header">
       <div class="container">

         <div class="row ">
           <div class="col-lg-1 col-md-4 col-4 d-none small_logo">
             <div class="d-none scroll_live_tv scrolling">
               <a  href="/">
                   <img src="{{asset('images/main/'.$dashboard_composer->logo)}}" alt="">
                 </a>
             </div>
           </div>
           <div class="col-lg-9 col-md-8 col-8 scrolled_header">

             <header id="header" class="">
               <div class="p_a19 search_header res_992 res_d_none" id="mobile_scroll_show">
                 <span class="">Search</span> <i class="fa fa-search"></i>
               </div>
               <nav class="navbar navbar-expand-md">
                   <div class="menu-btn">
                      <button type="button" class="btn-open"></button>
                    </div>
                      <pdiv class="full-menu scrollbar">
                        <button type="button" class="full-menu-close"></button>
                        <div class="vertical-content-wrap">
                          <div class="vertical-centered">
                         <ul class="nav navbar-nav m_l0">

                          <li class="nav-item active"><a class="nav-link" href="/">Home <span class="sr-only"></span></a></li>
                          <li class="nav-item"><a class="nav-link" href="{{route('getPages', 'about-us')}}">about us</a></li>
                          @foreach($dashboard_destination_types as $type)
                          <li class="drop_menu"><a class="nav-link"href="#">{{$type->title}}</a>
                              <ul>
                                    @foreach($type->groups()->where('publish',1)->get() as $group)
                                    
                                    <li class="drop_menu drop-menu2"><a class="nav-link" href="#">{{$group->title}}</a>
                                      @if($group)
                                      
                                      <ul class="drop-sub-menu">
                                        @foreach($group->destinations('published',1)->get() as $destination)
                                          <li class="nav-item"><a href="{{route('packageDetails',$destination->slug)}}" class="nav-link">{{$destination->package_title}}</a></li>
                                        @endforeach
                                          
                                      </ul>

                                      @endif
                                    </li>
                                    @endforeach
                                  
                              </ul>
                          </li>
                          @endforeach
                          @foreach($dashboard_groups as $group)
                          <li class="drop_menu"><a class="nav-link"href="{{route('packageList', [$group->slug])}}">{{$group->title}}</a>
                              <ul>
                                  @foreach($group->destinations('published',1)->get() as $destination)
                                  <li><a href="{{route('packageDetails',$destination->slug)}}">{{$destination->package_title}}</a></li>
                                  @endforeach
                              </ul>
                          </li>
                          @endforeach

                          
                          
                          <li class="nav-item"><a class="nav-link" href="{{route('blogList')}}">Blogs</a></li>
                          <li class="nav-item"><a class="nav-link" href="{{route('galleryList')}}">Gallery</a></li>
                          <li class="nav-item"><a class="nav-link" href="{{route('getTestimonial')}}">testimonials</a></li>
                          <li class="nav-item"><a class="nav-link" href="{{route('getTeam')}}"> team </a></li>
                          <li class="nav-item"><a class="nav-link" href="{{route('getPages', 'contact-us')}}">contact us</a></li>
                         </ul>
                        </div>
                      </div>
                  </pdiv>
               </nav>
             </header>
           </div>
           <div class="col-lg-3 col-md-4 col-4" id="mobile_scroll_hide">

             <div class="p_a19 search_header">
               <span class="res_d_none">Search</span> <i class="fa fa-search"></i>
             </div>
           </div>
       </div>
     </div>
     <div class="search_form hide_idv">
       <div class="container">
         <form action="{{route('searchDestination')}}" method="get" class="form form-horizontal form-respnosive">
           <div class="form-group row">
             <div class="col-lg-8 col-md-9 col-sm-9 search_tool">

               <input type="text" id="search" name="keywords" class="form form-control all_search" placeholder="Enter Keywords ">
               </div>
             <div class="col-lg-2 col-md-3 col-sm-3">
               <button class="btn search_submit" type="submit"><i class="fa fa-search search_form_search_icon"></i></button>
             </div>
           </div>
         </form>
       </div>
     </div>
   </div>


 </div>
 <!-- <div class="query_button">
   <button class="btn btn_query">Query</button>
 </div> -->

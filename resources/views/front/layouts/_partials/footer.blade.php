

 <div class="footer_section" style="background-image: url('images/slider/7.jpg');">
   <div class="container p_tb20 footer">
     <div class="all_footer">
       <div class="row">
         <div class="col-lg-8 offset-lg-2 col-md-12 col-12 m_b25">
           <div class="text-center subscribe_form">
             <h2 class="font_28 white subs_title">subscribe us</h2>
             @if(session('message1'))
                 <div class="alert alert-info alert-dismissible" id="successMessage">
                     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                     {{session('message1')}}
                 </div>
             @endif
             <form action="{{route('saveSubscribers')}}" method="post" class="form form-horizontal">
               @csrf
             <div class="row form-group">
               <div class="col-lg-5 col-md-5 col-sm-12 p_tb5">
                 <input type="text" placeholder="Full Name" name="name" required class="form-control form-control-sm rounded-0">
               </div>
               <div class="col-lg-5 col-md-5 col-sm-12 p_tb5">
                 <input type="email" placeholder="Email Address" name="email" required class="form-control form-control-sm rounded-0 required">
               </div>
               <div class="col-lg-2 col-md-2 col-sm-12 p_tb5 float-right text-right">
                 <button type="submit" class="btn subscribe_us rounded-0 btn-sm">submit</button>
               </div>

             </div>
           </form>
           </div>
         </div>
       </div>


       <div class="row">
         <div class="col-lg-3 col-md-6 col-sm-12 text-capitalize">

           <ul class="font_14 footer_menu ">
             <h2 class="font_28 font_weight600">DESTINATIONS </h2>
            
             <li><a href="">asdf </a></li>
            
           </ul>
           <!-- <form action="" method="post" class="form form-horizontal">
             <div class="row form-group">
               <div class="col-lg-6 col-md-6 col-sm-12 p_tb5">
                 <input type="text" placeholder="Full Name" required class="form-control form-control-sm rounded-0">
               </div>
               <div class="col-lg-6 col-md-6 col-sm-12 p_tb5">
                 <input type="text" placeholder="Phone" required class="form-control form-control-sm rounded-0">
               </div>
               <div class="col-lg-12 col-md-12 col-sm-12 p_tb5">
                 <input type="email" placeholder="Email Address" required class="form-control form-control-sm rounded-0">
               </div>
               <div class="col-lg-12 col-md-12 col-sm-12 p_tb5">
                 <textarea name="message" id="message" rows="3" required class="form-control form-control-sm rounded-0 no-resize" placeholder="Your message Here"></textarea>
               </div>
               <div class="col-lg-12 col-md-12 col-sm-12 p_tb5 float-right text-right">
                 <button class="btn feedbackUs  rounded-0">send feedback</button>
               </div>

             </div>
           </form> -->
         </div>

         <div class="col-lg-3 col-md-6 col-sm-12 text-capitalize">
           <ul class="font_14 footer_menu ">
             <h2 class="font_28 font_weight600">QUICK LINKS</h2>

             <li><a href="{{route('getPages', 'about-us')}}">About Us </a></li>
             <li><a href="{{route('getPages', 'terms-and-conditions')}}">Terms And Conditions</a></li>
             <li><a href="{{route('galleryList')}}">Gallery</a></li>
             <li><a href="{{route('getPages', 'contact-us')}}">contact us</a></li>
             <li><a href="{{route('getTeam')}}">Teams</a></li>
           </ul>
         </div>
         <div class="col-lg-3 col-md-6 col-sm-12 text-capitalize">
           <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FKINGofTROLL2017%2F&tabs=timeline&width=250&height=300&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=692183977832781" width="250" height="300" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
         </div>

         <div class="col-lg-3 col-md-6 col-sm-12 text-capitalize">
           <h2 class="font_28 white font_weight600">CONTACT INFO</h2>
           <h3 class="font_weight600 font_18 white">
             {{$dashboard_composer->site_name}}
           </h3>
           <ul class="font_14">

             <li >
               <a href="#" class="white">
                 <span class="fa fa-map-marker"></span>
                 {{$dashboard_composer->address}}
               </a>
             </li>
             <li >
               <a href="index.php" class="white">
                 <span class="fa fa-phone"></span>
                 {{$dashboard_composer->telephone}}
               </a>
             </li>
             <li >
               <a href="index.php" class="white">
                 <span class="fa fa-mobile"></span>
                 {{$dashboard_composer->mobile}}
               </a>
             </li>
             <li >
               <a href="index.php" class="white">
                 <span class="fa fa-envelope"></span>
                 {{$dashboard_composer->email}}
               </a>
             </li>

           </ul>
           <h3 class="font_16 font_weight600 white m_t15">follow us on: </h3>
           <ul class="display_inline footer-last-social-link">
             <li class="m_r10">
               <a href="{{$dashboard_composer->facebook}}">
                 <span class="facebook m_r5 font_28 fa fa-facebook"></span>
               </a>
             </li>
             <li class="m_r10">
               <a href="{{$dashboard_composer->twitter}}">
                 <span class="twitter m_r5 font_28 fa fa-twitter"></span>
               </a>
             </li>
             <li class="m_r10">
               <a href="{{$dashboard_composer->youtube}}">
                 <span class="youtube m_r5 font_28 fa fa-youtube"></span>
               </a>
             </li>
             <li class="m_r10">
               <a href="{{$dashboard_composer->linkedin}}">
                 <span class="linkedin m_r5 font_28 fa fa-linkedin"></span>
               </a>
             </li>
           </ul>
         </div>
       </div>
       <div class="row border_top_footer">
         <div class="col-lg-6 col-md-6 col-sm-6">
           <p>
             <span class="copyrights-text font_13">© 2019 Copyrights Reserved at {{$dashboard_composer->site_name}}</span>
           </p>

         </div>
         <div class="col-lg-6 col-md-6 col-sm-6 webhouse_nepal">
           <p>
             <span class="copyrights-text font_13">
               Designed & Developed by: <a href="https://webhousenepal.com" title="https://webhousenepal.com" target="_blank">webhousenepal.com</a>
             </span>
           </p>
         </div>
       </div>
     </div>
   </div>

 </div>

    <!-- -----------------consult question with us----------------- -->

 <button class="scroltop"><span class="fa fa-angle-up" id="btn-vibrate"></span></button>


 <script src="{{asset('assets/front/js/jquery.min.js')}}"></script>
   <script src="{{asset('assets/front/js/bootstrap.min.js')}}"></script>
   <!-- <script src="js/isotope.min.js"></script> -->
   <script src="{{asset('assets/front/js/lightbox.js')}}"></script>
 <script src="{{asset('assets/front/js/owl.carousel.js')}}"   type="text/javascript"></script>
 <script src="{{asset('assets/front/js/main.js')}}" type="text/javascript"></script>

<!--Start of Tawk.to Script-->
    <script type="text/javascript">
    // var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    // (function(){
    // var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    // s1.async=true;
    // s1.src='https://embed.tawk.to/5dd6399e43be710e1d1e64c1/default';
    // s1.charset='UTF-8';
    // s1.setAttribute('crossorigin','*');
    // s0.parentNode.insertBefore(s1,s0);
    // })();
    </script>
<!--End of Tawk.to Script-->
</body>

</html>
<!-- <script>
 $(document).ready(function(){
   $('.main_menu').click(function(){
     $(this).has("ul").("display", "block");
   })
 })
</script> -->

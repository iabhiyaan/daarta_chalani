$("#myModal").on("shown.bs.modal", function() {
    $("#myInput").trigger("focus");
});

jQuery("button.scroltop").on("click", function() {
    jQuery("html, body").animate({
            scrollTop: 0
        },
        2000
    );
    return false;
});

jQuery(".menu-btn").on("click", function() {
    jQuery(".full-menu").addClass("width100");
    jQuery(".page-wraper, .nav_items").css("margin-left", "80px");
    jQuery(" .header_logos").css("margin-left", "40px");
    jQuery(" .vertical-content-wrap").addClass("width_custom");
});
jQuery(".full-menu-close").on("click", function() {
    // jQuery(".full-menu").fadeToggle(500);
    jQuery(".full-menu").removeClass("width100");
    // jQuery(".page-wraper, .nav_items").css("margin-left", "0px");
    jQuery(".header_logos").css("margin-left", "0");
    // jQuery(" .logo-header-inner img").css("max-width", "210px");
});

jQuery(window).on("scroll", function() {
    var scroll = jQuery(window).scrollTop();
    if (scroll > 50) {
        $(".top_header").addClass("header_fixed");
        $(".scrolling, .small_logo").removeClass("d-none");
        // $('.scrolled_header').addClass('col-lg-8').removeClass('col-lg-9');
        $("#mobile_scroll_hide")
            .addClass("col-lg-2")
            .removeClass("col-lg-3");
        $(".navbar-nav")
            .addClass("m_lr_auto")
            .removeClass("m_l0");
        $("#mobile_scroll_hide").addClass("res_d_none");
        $("#mobile_scroll_show").removeClass("res_d_none");
        // $('.inquiry_form').addClass('d-none');
    } else {
        $(".top_header").removeClass("header_fixed");
        $(".scrolling, .small_logo").addClass("d-none");
        // $('.scrolled_header').removeClass('col-lg-8').addClass('col-lg-9');
        $(".navbar-nav")
            .removeClass("m_lr_auto")
            .addClass("m_l0");
        $("#mobile_scroll_hide")
            .addClass("col-lg-3")
            .removeClass("col-lg-2");

        $("#mobile_scroll_hide").removeClass("res_d_none");
        $("#mobile_scroll_show").addClass("res_d_none");
        // $('.inquiry_form').removeClass('d-none');
    }

    if (scroll > 700) {
        jQuery("button.scroltop").fadeIn(1000);
    } else {
        jQuery("button.scroltop").fadeOut(1000);
    }
});

jQuery(window).on("scroll", function() {
    var scroll = jQuery(window).scrollTop();
    if (scroll > 10) {
        $(".requesting").addClass("hideMe");
    } else {
        $(".requesting").removeClass("hideMe");
        $(".requesting").addClass("request_call_back");
    }
});
// jQuery(document).ready(function(){
// 	jQuery('.btn_query').click(function(){
// 		jQuery('.inquiry_form').removeClass('res_d_none');
// 	});

// })

// jQuery(document).ready(function(){
//     if (window.matchMedia('(max-width: 575px)').matches) {
//        $('.top_logo').removeClass('col-8').addClass('col-12');
//        $('#searchTool').removeClass('col-4').addClass('col-8')
//     } else {
//        $('.top_logo').addClass('col-8').removeClass('col-12');
//        $('#searchTool').addClass('col-4').removeClass('col-8')
//     }

// })
jQuery(document).ready(function() {
    jQuery(".search_header").click(function() {
        $(".search_form").slideToggle(300);
        // $('.search_form').removeClass('d-none')
    });
});

$(document).ready(function() {
    $(".home_owl_slider").owlCarousel({
        // loop:true,
        rewind: true,
        autoplay: true,
        autoPlaySpeed: 10000,
        autoPlayTimeout: 1000,
        autoPlayHoverPause: true,
        margin: 20,
        nav: true,
        dots: true,
        animateIn: "fadeIn",

        animateOut: "fadeOut",
        smartSpeed: 450,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        navText: false,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1
            }
        }
    });
});

$(document).ready(function() {
    $(".team_slider").owlCarousel({
        loop: true,
        rewind: true,
        autoplay: true,
        autoplaySpeed: 4000,
        autoplayTimeout: 4000,
        animateIn: "linear",
        animateOut: "linear",
        autoplayHoverPause: true,
        margin: 20,
        nav: true,
        dots: true,
        slideTransition: "linear",
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        responsiveClass: true,
        responsive: {
            0: {
                items: 3
            },
            768: {
                items: 4
            },
            1024: {
                items: 6
            }
        }
    });
});
$(document).ready(function() {
    if ($.fn.owlCarousel) {
        var clientslide = $(".testimonial_slider");

        clientslide.owlCarousel({
            items: 2,
            margin: 10,
            loop: true,
            nav: true,
            navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
            dots: false,
            autoplay: true,
            autoplayTimeout: 7000,
            smartSpeed: 2000,
            responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 1
                },
                769: {
                    items: 1
                },

                900: {
                    items: 2
                }
            }
        });
    }
});
// $(document).ready(function(){
// 	$('.box_banner').isotope({
// 	  // options...
// 	  itemSelector: '.grid-item',
// 	  masonry: {
// 	    columnWidth: 200
// 	  }
// 	});
// })

setTimeout(function() {
    $(".message_1").fadeOut("slow");
}, 5000);
setTimeout(function() {
    $(".message_2").fadeOut("slow");
}, 10000);
setTimeout(function() {
    $(".message_3").fadeOut("slow");
}, 15000);

$(document).ready(function() {
    var mobileWidth = 992;
    var navcollapse = $(".navbar-nav li.drop_menu");

    $(window).on("resize", function() {
        navcollapse.children("ul").hide();
    });

    navcollapse.hover(function() {
        if ($(window).innerWidth() >= mobileWidth) {
            $(this)
                .children("ul")
                .stop(true, false, true)
                .slideToggle(300);
        }
    });
    $(".navbar-nav li.drop_menu").click(function() {
        $(".navbar-nav li.drop_menu").each(function() {
            $(this).removeClass("active_menu");
        });
        $(this).addClass("active_menu");
        if ($(window).innerWidth() <= mobileWidth) {
            $(this)
                .children("ul")
                .slideToggle(300);
        }
    });
});



// new js //



// $(document).ready(function() {
//     $('.main-menu-drop-down').click(function() {
//         $('li.main_menu_item').each(function(div, index) {
//             $(this).removeClass('make_main_menu_active');
//         });

//         $(this).parent('li.main_menu_item').addClass('make_main_menu_active');
//         var main_menu = $(this).parent('li.make_main_menu_active');

//         if ($(this).parent('li.main_menu_item').hasClass('make_main_menu_active')) {
//             if (main_menu.find('.dropdown-icon.fa.fa-plus')) {
//                 // main_menu.find('.dropdown-icon').removeClass('fa-plus').addClass('fa-minus');

//             } else {
//                 // main_menu.find('.dropdown-icon').addClass('fa-plus').removeClass('fa-minus');
//             }
//             main_menu.find('.sub-menu').slideToggle(500);

//             // $(this).next().parent('li.make_main_menu_active').find(".sub-menu").slideToggle(500);
//         } else {
//             // $(this).toggle('slow');
//         }
//         return false;
//     });

// })
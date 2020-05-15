$(document).ready(function () {      
            
    function init_template(){
        //Class is vital to run AJAX Pages 
        
        $('body').append('<div class="body-background"></div>');
        $('.footer-menu a').click(function(){
           $('.footer-menu a').removeClass('active-menu');
            $(this).addClass('active-menu');
        });
        
        $('.show-page-2').click(function(){
           $('.page-2').addClass('scale-page'); 
           $('.page-1').addClass('scale-down'); 
        });
        
        //Tabs
        $('tabs a').click(function(){
            preventDefault();
            return false;
        });
        
        //FastClick
        $(function() {FastClick.attach(document.body);});

        //Preload Image
        $(function() {
            $(".preload-image").lazyload({
                threshold : 500,
                effect : "fadeIn",
                container: $("html, body")
            });
        });
        
        $('.hide-notification').click(function(){
            $(this).parent().slideUp(); 
            return false;
        });        
        $('.tap-hide').click(function(){
            $(this).slideUp(); 
            return false;
        });
        
        $('.activate-toggle').click(function(){
            $(this).parent().find('.toggle-content').slideToggle(250);
            $(this).parent().find('input').each(function () { this.checked = !this.checked; });
            $(this).parent().find('.toggle-45').toggleClass('rotate-45 color-red-dark');
            $(this).parent().find('.toggle-180').toggleClass('rotate-180 color-red-dark');
            return false;
        });
        
        $('.accordion-item').click(function(){
            $(this).find('.accordion-content').slideToggle(250);
            $(this).find('i').toggleClass('rotate-135 color-red-dark');
            return false;
        });
        
        $('.dropdown-toggle').click(function(){
            $(this).parent().find('.dropdown-content').slideToggle(250); 
            $(this).find('i:last-child').toggleClass('rotate-135');
            return false;
        });
        
        //Portfolio Wide
        
        $('.portfolio-wide-caption a').click(function(){
           $(this).parent().parent().find('.portfolio-wide-content').slideToggle(250);
            return false;
        });
                
        //Detect if iOS WebApp Engaged and permit navigation without deploying Safari
        (function(a,b,c){if(c in b&&b[c]){var d,e=a.location,f=/^(a|html)$/i;a.addEventListener("click",function(a){d=a.target;while(!f.test(d.nodeName))d=d.parentNode;"href"in d&&(d.href.indexOf("http")||~d.href.indexOf(e.host))&&(a.preventDefault(),e.href=d.href)},!1)}})(document,window.navigator,"standalone")

        //Detecting Mobiles//
        var isMobile = {
            Android: function() {return navigator.userAgent.match(/Android/i);},
            BlackBerry: function() {return navigator.userAgent.match(/BlackBerry/i);},
            iOS: function() {return navigator.userAgent.match(/iPhone|iPad|iPod/i);},
            Opera: function() {return navigator.userAgent.match(/Opera Mini/i);},
            Windows: function() {return navigator.userAgent.match(/IEMobile/i);},
            any: function() {return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());}
        };

        if( !isMobile.any() ){
            $('.show-blackberry, .show-ios, .show-windows, .show-android').addClass('disabled');
            $('.show-no-detection').removeClass('disabled');
        }
        if(isMobile.Android()) {
            //Status Bar Color for Android
            $('head').append('<meta name="theme-color" content="#000000"> />');
            $('.show-android').removeClass('disabled');
            $('.show-blackberry, .show-ios, .show-windows, .show-download').addClass('disabled');
            $('.sidebar-scroll').css('right', '0px');
            $('.set-today').addClass('mobile-date-correction');
        }
        if(isMobile.BlackBerry()) {
            $('.show-blackberry').removeClass('disabled');
            $('.show-android, .show-ios, .show-windows, .show-download').addClass('disabled');
            $('.sidebar-scroll').css('right', '0px');
        }   
        if(isMobile.iOS()) {
            $('.show-ios').removeClass('disabled');
            $('.show-blackberry, .show-android, .show-windows, .show-download').addClass('disabled');
            $('.sidebar-scroll').css('right', '0px');
            $('.set-today').addClass('mobile-date-correction');
        }
        if(isMobile.Windows()) {
            $('.show-windows').removeClass('disabled');
            $('.show-blackberry, .show-ios, .show-android, .show-download').addClass('disabled');
            $('.sidebar-scroll').css('right', '0px');
        }
        
        //These are the splash images that show when adding to the homescreen, we're
        //delaying these to load only after the page loads to increase load speed and it's
        //also easier to generally edit them by only editing this area instead of each HTML file
        //This will also put a lower request rate on the page increasing it's load speed.
        $('head').prepend('<link rel="icon" type="image/png" href="images/splash/android-chrome-192x192.png" sizes="192x192">');
        $('head').prepend('<link rel="apple-touch-icon" sizes="180x180" href="images/splash/apple-touch-icon-180x180.png">');
        $('head').prepend('<link rel="apple-touch-icon" sizes="152x152" href="images/splash/apple-touch-icon-152x152.png">');
        $('head').prepend('<link rel="apple-touch-icon" sizes="144x144" href="images/splash/apple-touch-icon-144x144.png">');
        $('head').prepend('<link rel="apple-touch-icon" sizes="120x120" href="images/splash/apple-touch-icon-120x120.png">');
        $('head').prepend('<link rel="apple-touch-icon" sizes="114x114" href="images/splash/apple-touch-icon-114x114.png">');
        $('head').prepend('<link rel="apple-touch-icon" sizes="76x76" href="images/splash/apple-touch-icon-76x76.png">');
        $('head').prepend('<link rel="apple-touch-icon" sizes="72x72" href="images/splash/apple-touch-icon-72x72.png">');
        $('head').prepend('<link rel="apple-touch-icon" sizes="60x60" href="images/splash/apple-touch-icon-60x60.png">');
        $('head').prepend('<link rel="apple-touch-icon" sizes="57x57" href="images/splash/apple-touch-icon-57x57.png">');
        $('head').prepend('<link rel="icon" type="image/png" href="images/splash/favicon-96x96.png" sizes="96x96">');
        $('head').prepend('<link rel="icon" type="image/png" href="images/splash/favicon-32x32.png" sizes="32x32">');
        $('head').prepend('<link rel="icon" type="image/png" href="images/splash/favicon-16x16.png" sizes="16x16">');
        $('head').prepend('<link rel="shortcut icon" href="images/splash/favicon.ico" type="image/x-icon"/>');
        
        //Galleries
        $(".gallery a, .show-gallery").swipebox();

        //Adaptive Folios
        $('.adaptive-one').click(function(){
            $('.portfolio-switch').removeClass('active-adaptive');
            $(this).addClass('active-adaptive');
            $('.portfolio-adaptive').removeClass('portfolio-adaptive-two portfolio-adaptive-three');
            $('.portfolio-adaptive').addClass('portfolio-adaptive-one');
            return false;
        });    
        $('.adaptive-two').click(function(){
            $('.portfolio-switch').removeClass('active-adaptive');
            $(this).addClass('active-adaptive');
            $('.portfolio-adaptive').removeClass('portfolio-adaptive-one portfolio-adaptive-three');
            $('.portfolio-adaptive').addClass('portfolio-adaptive-two'); 
            return false;
        });    
        $('.adaptive-three').click(function(){
            $('.portfolio-switch').removeClass('active-adaptive');
            $(this).addClass('active-adaptive');
            $('.portfolio-adaptive').removeClass('portfolio-adaptive-two portfolio-adaptive-one');
            $('.portfolio-adaptive').addClass('portfolio-adaptive-three'); 
            return false;
        });

        //Show Back To Home When Scrolling
        $(window).on('scroll', function () {
            var total_scroll_height = $(window)[0].scrollHeight
            var inside_header = ($(this).scrollTop() <= 200);
            var passed_header = ($(this).scrollTop() >= 0); //250
            var passed_header2 = ($(this).scrollTop() >= 150); //250
            var footer_reached = ($(this).scrollTop() >= (total_scroll_height - ($(window).height() +100 )));

            if (inside_header == true) {
                $('.back-to-top-badge').removeClass('back-to-top-badge-visible');
                $('.footer-menu').addClass('footer-menu-scroll');
                
            } else if (passed_header == true)  {
                $('.back-to-top-badge').addClass('back-to-top-badge-visible');
                $('.footer-menu').removeClass('footer-menu-scroll');
            } 
            if (footer_reached == true){            
                //$('.back-to-top-badge').removeClass('back-to-top-badge-visible');
            }
        });
                
        //Back to top Badge
        $('.back-to-top-badge, .back-to-top').click(function (e) {
            e.preventDefault();
            $('html, body').animate({
                scrollTop: 0
            }, 1000);
        });
        
        //Back to top Badge
        $('.back-to-top-menu').click(function (e) {
            e.preventDefault();
            $('.landing-menu-scroll').animate({
                scrollTop: 0
            }, 250);
        });     
                
        //Bottom Share Fly-up    
        $('body').append('<div class="share-bottom-tap-close"></div>');
        $('.show-share-bottom, .show-share-box').click(function(){
            $('.share-bottom-tap-close').addClass('share-bottom-tap-close-active');
            $('.share-bottom').toggleClass('active-share-bottom'); 
            return false;
        });    
        $('.close-share-bottom, .share-bottom-tap-close').click(function(){
           $('.share-bottom-tap-close').removeClass('share-bottom-tap-close-active');
           $('.share-bottom').removeClass('active-share-bottom'); 
            return false;
        });

        //Set inputs to today's date by adding class set-day
        var set_input_now = new Date();
        var set_input_month = (set_input_now.getMonth() + 1);               
        var set_input_day = set_input_now.getDate();
        if(set_input_month < 10) 
            set_input_month = "0" + set_input_month;
        if(set_input_day < 10) 
            set_input_day = "0" + set_input_day;
        var set_input_today = set_input_now.getFullYear() + '-' + set_input_month + '-' + set_input_day;
        $('.set-today').val(set_input_today);

        //Countdown Timer
        $(function() {$('.countdown-class').countdown({ date: "June 7, 2087 15:03:26"});});

        //Copyright Year 
        var dteNow = new Date();
        var intYear = dteNow.getFullYear();
        $('#copyright-year, .copyright-year').html(intYear);
        
        //Contact Form
        var formSubmitted="false";jQuery(document).ready(function(e){function t(t,n){formSubmitted="true";var r=e("#"+t).serialize();e.post(e("#"+t).attr("action"),r,function(n){e("#"+t).hide();e("#formSuccessMessageWrap").fadeIn(500)})}function n(n,r){e(".formValidationError").hide();e(".fieldHasError").removeClass("fieldHasError");e("#"+n+" .requiredField").each(function(i){if(e(this).val()==""||e(this).val()==e(this).attr("data-dummy")){e(this).val(e(this).attr("data-dummy"));e(this).focus();e(this).addClass("fieldHasError");e("#"+e(this).attr("id")+"Error").fadeIn(300);return false}if(e(this).hasClass("requiredEmailField")){var s=/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;var o="#"+e(this).attr("id");if(!s.test(e(o).val())){e(o).focus();e(o).addClass("fieldHasError");e(o+"Error2").fadeIn(300);return false}}if(formSubmitted=="false"&&i==e("#"+n+" .requiredField").length-1){t(n,r)}})}e("#formSuccessMessageWrap").hide(0);e(".formValidationError").fadeOut(0);e('input[type="text"], input[type="password"], textarea').focus(function(){if(e(this).val()==e(this).attr("data-dummy")){e(this).val("")}});e("input, textarea").blur(function(){if(e(this).val()==""){e(this).val(e(this).attr("data-dummy"))}});e("#contactSubmitButton").click(function(){n(e(this).attr("data-formId"));return false})})

        // Image Sliders
        var pricing_table = new Swiper('.pricing-table-slider', {
            pagination: '.swiper-pagination',
            paginationClickable: true,
            slidesPerView: 3,
            nextButton: '.pricing-table-next',
            prevButton: '.pricing-table-prev',
            spaceBetween: 50,
            breakpoints: {
                1024: {
                    slidesPerView: 2,
                    spaceBetween: 40
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 30
                },
                640: {
                    slidesPerView: 1,
                    spaceBetween: 20
                },
                320: {
                    slidesPerView: 1,
                    spaceBetween: 10
                }
            }
        });
        
        var scrolling_menu = new Swiper('.scrolling-menu', {
            //scrollbar: '.swiper-scrollbar',
            scrollbarHide: true,
            freeMode:true,
            freeModeMomentum:true,
            freeModeMomentumRatio:1,
            slidesPerView: 11,
            spaceBetween: 0,
            grabCursor: true,
            breakpoints: {
                1280: {
                    slidesPerView: 8,
                    spaceBetween: 40
                },                
                1024: {
                    slidesPerView: 7,
                    spaceBetween: 40
                },
                768: {
                    slidesPerView: 5,
                    spaceBetween: 30
                },
                640: {
                    slidesPerView: 3,
                    spaceBetween: 20
                },
                350:{
                    slidesPerView:3,
                    spaceBetween:10
                },
                320: {
                    slidesPerView: 3,
                    spaceBetween: 10
                }
            }

        });
        
        if($('.scrolling-menu a').hasClass('active-menu-item')){
            var selectedIndex = $(".active-menu-item").index();
            scrolling_menu.slideTo(selectedIndex, 250);
        }

        
        var swiper = new Swiper('.coverpage-cube', {
            pagination: '.coverpage-slider .swiper-pagination',
            paginationClickable: true,
            loop:true,
            effect: 'cube',
            grabCursor: true,
            cube: {
                shadow: true,
                slideShadows: true,
                shadowOffset: 20,
                shadowScale: 0.94
            }
        });
        
        var swiper_coverpage = new Swiper('.coverpage-classic', {
            onSlideChangeStart:check_class,
            pagination: '.coverpage-slider .swiper-pagination',
            nextButton:'.flashing-arrows-1',
            prevButton:'.flashing-arrows-2',
            paginationClickable: true
        });
        
        function check_class(){
            if(swiper_coverpage.activeIndex > 0 > swiper_coverpage.isEnd){
                $('.mobileui-home-footer').addClass('show-mobileui-home-footer');
                $('.header-homescreen').addClass('show-mobileui-home-header');
            } else {
                $('.mobileui-home-footer').removeClass('show-mobileui-home-footer');
                $('.header-homescreen').removeClass('show-mobileui-home-header');
            } 

        }
        
        var swiper_category_slider = new Swiper('.category-slider', {
        pagination: '.swiper-pagination',
        paginationClickable: true,
        slidesPerView: 5,
        spaceBetween: 20,
        breakpoints: {
            1024: {
                slidesPerView: 6,
                spaceBetween: 20
            },
            768: {
                slidesPerView: 5,
                spaceBetween: 10
            },
            640: {
                slidesPerView: 3,
                spaceBetween: 5
            },
            320: {
                slidesPerView: 3,
                spaceBetween: 5
            }
        }
        });

        var swiper_store_thumbnail_slider = new Swiper('.store-thumbnails', {
            pagination: '.swiper-pagination',
            paginationClickable: true,
            slidesPerView: 5,
            spaceBetween: 20,
            breakpoints: {
                1024: {
                    slidesPerView: 6,
                    spaceBetween: 20
                },
                768: {
                    slidesPerView: 5,
                    spaceBetween: 10
                },
                640: {
                    slidesPerView: 2,
                    spaceBetween: 5
                },
                320: {
                    slidesPerView: 2,
                    spaceBetween: 5
                }
            }
        });       
        
        var swiper_store_thumbnail_slider = new Swiper('.home-round-slider', {
            pagination: '.swiper-pagination',
            paginationClickable: true,
            slidesPerView: 3,
            spaceBetween: 20,
            breakpoints: {
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 20
                },                
                1024: {
                    slidesPerView: 2,
                    spaceBetween: 20
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 10
                },
                660: {
                    slidesPerView: 1,
                    spaceBetween: 5
                },
                320: {
                    slidesPerView: 1,
                    spaceBetween: 5
                }
            }
        });
   
        setTimeout(function(){
        var swiper_coverflow_thumbnails = new Swiper('.coverflow-thumbnails', {
            pagination: '.swiper-pagination',
            effect: 'coverflow',
            autoplay:3000,
            autoplayDisableOnInteraction: false,
            spaceBetween:-30,
            loop:true,
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: 'auto',
            coverflow: {
                rotate: 35,
                stretch: -50,
                depth: -190,
                modifier:1,
                slideShadows : true
            }
        });      
        },300);
            
        
        var swiper_coverflow_slider = new Swiper('.coverflow-slider', {
            pagination: '.swiper-pagination',
            effect: 'coverflow',
            autoplay:3000,
            autoplayDisableOnInteraction: false,
            loop:true,
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: 'auto',
            coverflow: {
                rotate: 60,
                stretch: -60,
                depth: 400,
                modifier: 1,
                slideShadows : false
            }
        });
        
        var swiper_staff_slider = new Swiper('.staff-slider', {
            nextButton: '.next-staff-slider',
            prevButton: '.prev-staff-slider',
            autoplay:5000,
            loop:true,
            autoplayDisableOnInteraction: false,
            slidesPerView: 3,
            spaceBetween: 20,
            breakpoints: {
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 20
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 10
                },
                640: {
                    slidesPerView: 1,
                    spaceBetween: 5
                }
            }
        });        
        
        var expanding_slider = new Swiper('.expanding-slider', {
            autoplay:3000,
            autoplayDisableOnInteraction: false,
            slidesPerView: 4,
            spaceBetween: 20,
            breakpoints: {
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 20
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 10
                },
                640: {
                    slidesPerView: 1,
                    spaceBetween: 5
                },               
                0: {
                    slidesPerView: 1,
                    spaceBetween: 5
                }
            }
        });
        
        var swiper = new Swiper('.home-slider',{autoplay:4000, loop:true});
        var swiper_news_slider = new Swiper('.news-slider',{autoplay:4000, loop:true});
        var swiper_single_item = new Swiper('.single-item',{autoplay:4000, loop:true});
        var swiper_quote_slider = new Swiper('.quote-slider',{autoplay:4000, loop:true});
        var swiper_store_slider = new Swiper('.store-slider', {autoplay:3000, loop:true});
        var swiper_store_slider2 = new Swiper('.store-slider-2', {autoplay:3000, loop:true});
        var swiper_text_slider = new Swiper('.text-slider',{autoplay:2000, loop:true});
        var swiper_call_to_action = new Swiper('.call-to-action-slider',{autoplay:4000, slidesPerView:1, loop:true});
        
        //Aligning Elements & Resize Handlers//
        
        function center_content(){
            var screen_width = $(window).width();
            var screen_height = $(window).height();
            var content_width = $('.content-center').width();
            var content_height = $('.content-center').height();            
            var content_full_width = $('.page-fullscreen-content').outerWidth();
            var content_full_height = $('.page-fullscreen-content').outerHeight();
            
            var cover_center_height = $('.coverpage-center').outerHeight();
            var cover_center_width = $('.coverpage-center').outerWidth();
            
            $('.content-center').css({
                "left":"50%",
                "top":"50%",
                "margin-left": (content_width/2)*(-1),
                "margin-top": (content_height/2)*(-1) - ($('.footer').height() - 100 )
            });
            
            $('.page-fullscreen').css({
                "width":screen_width,
                "height":screen_height 
            });
                        
            $('.page-fullscreen-content').css({
                "left":"50%",
                "top":"50%",
                "margin-left": (content_full_width/2)*(-1),
                "margin-top": (content_full_height/2)*(-1) -60
            });                       
            
            $('.coverpage-classic').css({
                "height": screen_height
            });
            
            $('.coverpage-clear').css({
                "height": screen_height
            });
            
            $('.coverpage-center').css({
                "left":"50%",
                "top":"50%",
                "margin-left": (cover_center_width/2)*(-1),
                "margin-top": (cover_center_height/2)*(-1)
            });       
            
            $('.map-fullscreen iframe').css('width', screen_width);
            $('.map-fullscreen iframe').css('height', screen_height);
                        
        
            var mobileui_home = (screen_height - 100); 

        
            $('.mobileui-home').css('height', mobileui_home);
            $('.mobileui-home-5 a').css('height', mobileui_home/5);
            $('.mobileui-home-4 a').css('height', mobileui_home/4);
            $('.mobileui-home-3 a').css('height', mobileui_home/3);
        };

        center_content();
        $(window).resize(function() {
            center_content(); 
            calculate_lockscreen();
        });
            
        //Fullscreen Map
        $('.map-text, .overlay').click(function(){
            $('.map-text, .map-fullscreen .overlay').addClass('hide-map'); 
            $('.deactivate-map').removeClass('hide-map'); 
            return false;
        });   
        $('.deactivate-map').click(function(){
            $('.map-text, .map-fullscreen .overlay').removeClass('hide-map'); 
            $('.deactivate-map').addClass('hide-map'); 
            return false;
        });
        
        //Classic Toggles
        $('.toggle-title').click(function(){
            $(this).parent().find('.toggle-content').slideToggle(250); 
            $(this).find('i').toggleClass('rotate-toggle');
            return false;
        });
        
        //Checklist Item
        $('.checklist-item').click(function(){
           $(this).find('.ion-ios-circle-outline').toggle(250); 
           $(this).find('strong').toggleClass('completed-checklist');
           $(this).find('.ion-checkmark, .ion-android-close, .ion-ios-checkmark-outline, .ion-checkmark-circled, .ion-close-circled, .ion-ios-close-outline').toggle(250); 
        });
        
        if($('.checklist-item').hasClass('checklist-item-complete')){
           $('.checklist-item-complete').find('.ion-ios-circle-outline').toggle(250); 
           $('.checklist-item-complete').find('strong').toggleClass('completed-checklist');
           $('.checklist-item-complete').find('.ion-checkmark, .ion-android-close, .ion-ios-checkmark-outline, .ion-checkmark-circled, .ion-close-circled, .ion-ios-close-outline').toggle(250); 
        }
        
        //Tasklist Item
        $('.tasklist-incomplete').click(function(){
           $(this).removeClass('tasklist-incomplete'); 
           $(this).addClass('tasklist-completed'); 
            return false;
        });    
        $('.tasklist-item').click(function(){
           $(this).toggleClass('tasklist-completed'); 
            return false;
        });
        
        //Interests
        $('.interest-box').click(function(){
            $(this).toggleClass('transparent-background'); 
            $(this).find('.interest-first-icon, .interest-second-icon').toggleClass('hide-interest-icon');
            return false;
        });
        
        //Loading Thumb Layout for News, 10 articles at a time
        $(function(){
            $(".thumb-layout-page a").slice(0, 5).show(); // select the first ten
            $(".load-more-thumbs").click(function(e){ // click event for load more
                e.preventDefault();
                $(".thumb-layout-page a:hidden").slice(0, 5).show(0); // select next 10 hidden divs and show them
                if($(".thumb-layout-page a:hidden").length == 0){ // check if any hidden divs still exist
                    $(this).hide();
                }
            });
        });

        $(function(){
            $(".card-large-layout-page .card-large-layout").slice(0, 2).show(); // select the first ten
            $(".load-more-large-cards").click(function(e){ // click event for load more
                e.preventDefault();
                $(".card-large-layout-page .card-large-layout:hidden").slice(0, 2).show(0); // select next 10 hidden divs and show them
                if($(".card-large-layout-page div:hidden").length == 0){ // check if any hidden divs still exist
                    $(this).hide();
                }
            });
        });    

        $(function(){
            $(".card-small-layout-page .card-small-layout").slice(0, 3).show(); // select the first ten
            $(".load-more-small-cards").click(function(e){ // click event for load more
                e.preventDefault();
                $(".card-small-layout-page .card-small-layout:hidden").slice(0, 3).show(0); // select next 10 hidden divs and show them
                if($(".card-small-layout-page a:hidden").length == 0){ // check if any hidden divs still exist
                    $(this).hide();
                }
            });
        });

        //News Tabs
        $('.activate-tab-1').click(function(){
            $('#tab-2, #tab-3').slideUp(250); $('#tab-1').slideDown(250);
            $('.home-tabs a').removeClass('active-home-tab');
            $('.activate-tab-1').addClass('active-home-tab');
            return false;
        });    
        $('.activate-tab-2').click(function(){
            $('#tab-1, #tab-3').slideUp(250); $('#tab-2').slideDown(250);
            $('.home-tabs a').removeClass('active-home-tab');
            $('.activate-tab-2').addClass('active-home-tab');
            return false;
        });    
        $('.activate-tab-3').click(function(){
            $('#tab-1, #tab-2').slideUp(250); $('#tab-3').slideDown(250);
            $('.home-tabs a').removeClass('active-home-tab');
            $('.activate-tab-3').addClass('active-home-tab');
            return false;
        });  
        
        //Tabs
    	$('ul.tabs li').click(function(){
            var tab_id = $(this).attr('data-tab');
            
            $(this).parent().parent().find('ul.tabs li').removeClass('current');
            $(this).parent().parent().find('.tab-content').removeClass('current');

            $(this).addClass('current');
            $("#"+tab_id).addClass('current');
        })
        
        //Store Cart Add / Substract Numbers
        $(function () {
            $('.add-qty').on('click',function(){
                var $qty=$(this).closest('div').find('.qty');
                var currentVal = parseInt($qty.val());
                if (!isNaN(currentVal)) {
                    $qty.val(currentVal + 1);
                }
                return false;
            });
            $('.substract-qty').on('click',function(){
                var $qty=$(this).closest('div').find('.qty');
                var currentVal = parseInt($qty.val());
                if (!isNaN(currentVal) && currentVal > 0) {
                    $qty.val(currentVal - 1);
                }
                return false;
            });
        });
    
        $('.remove-cart-item').click(function(){
            $(this).parent().parent().slideUp(250); 
            return false;
        });
        
        //Mobile UI Controls//
        
        //Dial Screen
        $('.phone-pad-1').click(function(){var this_value = $('.mobileui-dialpad input').val(); $('.mobileui-dialpad input').val(this_value + '1');});
        $('.phone-pad-2').click(function(){var this_value = $('.mobileui-dialpad input').val(); $('.mobileui-dialpad input').val(this_value + '2');});
        $('.phone-pad-3').click(function(){var this_value = $('.mobileui-dialpad input').val(); $('.mobileui-dialpad input').val(this_value + '3');});
        $('.phone-pad-4').click(function(){var this_value = $('.mobileui-dialpad input').val(); $('.mobileui-dialpad input').val(this_value + '4');});
        $('.phone-pad-5').click(function(){var this_value = $('.mobileui-dialpad input').val(); $('.mobileui-dialpad input').val(this_value + '5');});
        $('.phone-pad-6').click(function(){var this_value = $('.mobileui-dialpad input').val(); $('.mobileui-dialpad input').val(this_value + '6');});
        $('.phone-pad-7').click(function(){var this_value = $('.mobileui-dialpad input').val(); $('.mobileui-dialpad input').val(this_value + '7');});
        $('.phone-pad-8').click(function(){var this_value = $('.mobileui-dialpad input').val(); $('.mobileui-dialpad input').val(this_value + '8');});
        $('.phone-pad-9').click(function(){var this_value = $('.mobileui-dialpad input').val(); $('.mobileui-dialpad input').val(this_value + '9');});
        $('.phone-pad-0').click(function(){var this_value = $('.mobileui-dialpad input').val(); $('.mobileui-dialpad input').val(this_value + '0');});
        $('.phone-pad-star').click(function(){var this_value = $('.mobileui-dialpad input').val(); $('.mobileui-dialpad input').val(this_value + '*');});
        $('.phone-pad-hash').click(function(){var this_value = $('.mobileui-dialpad input').val(); $('.mobileui-dialpad input').val(this_value + '#');});
        
        $('.call-dial').click(function(){
           $(this).toggleClass('bg-red-dark');
            $(this).find('i').toggleClass('rotate-135');
            $('.mobileui-dialpad-numbers').slideToggle(250);
            $('.mobileui-dialpad-controls').slideToggle(250);
        });
        
        
        //Lockscreen
        new Date($.now());
        var dt = new Date();
        var time = dt.getHours() + ":" + ("0" + dt.getMinutes()).substr(-2);;
        $(".mobileui-lockscreen-header h3").html(time);
        var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        var d = new Date();
        var today_day = d.getDate();
        var today_year = d.getFullYear();
        var dateString = today_day;
        var daysOfWeek = new Array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
        var today_weekday = daysOfWeek[new Date(dateString).getDay()];    
        
        $(".mobileui-lockscreen-header p").html(today_weekday + ", " + today_day + "  " + monthNames[d.getMonth()] + "  " + today_year);
        
        function calculate_lockscreen(){
            var lock_height = $('.mobileui-lockscreen-header').height();
            var lock_button = $('.mobileui-lockscreen-home').height();
            var lock_window = $(window).height() -0;
            var lock_total  = lock_window - (lock_button + lock_height);
            $('.mobileui-lockscreen-notifications').css('height', lock_total -180);   
        };
        calculate_lockscreen();
        
    }//Init Template Function

    
    setTimeout(init_template, 0);//Activating all the plugins
    $(function(){
      'use strict';
      var options = {
        prefetch: false,
        cacheLength: 0,
        blacklist: '.default-link',
        forms: 'contactForm',
        onStart: {
          duration:500, // Duration of our animation
          render: function ($container) {
            // Add your CSS animation reversing class
            $container.addClass('is-exiting');

            // Restart your animation
            smoothState.restartCSSAnimations();
            $('.page-preloader').addClass('show-preloader');
            $('.medium-overlay').addClass('transparent-bg');
            $('#page-content, .navigation').css({
                "opacity":"0",
                "transition":"all 500ms ease"
            });

          }
        },
        onReady: {
          duration: 0,
          render: function ($container, $newContent) {
            // Remove your CSS animation reversing class
            $container.removeClass('is-exiting');

            // Inject the new content
            $container.html($newContent);
            $('.page-preloader').addClass('show-preloader');
            $('.footer-menu').addClass('footer-menu-fixed');
            $('#page-content').css({
                "opacity":"0",
                "transition":"all 500ms ease"
            }); 
            $('html, body').animate({ scrollTop: 0 }, 0);
          }
        },

        onAfter: function($container, $newContent) {
            setTimeout(init_template, 0)//Timeout required to properly initiate all JS Functions. 
            $('.page-preloader').removeClass('show-preloader');
            $('#page-content').css({
                "opacity":"1",
                "transition":"all 500ms ease"
            });   
        }
      };
      var smoothState = $('#page-transitions').smoothState(options).data('smoothState');
    });
    
});
(function($) {

    'use strict';
    //var base = '/dpdc.org.bd/career/';
    var base = '/career/';
    var isMobile = {
        Android: function() {
            return navigator.userAgent.match(/Android/i);
        },
        BlackBerry: function() {
            return navigator.userAgent.match(/BlackBerry/i);
        },
        iOS: function() {
            return navigator.userAgent.match(/iPhone|iPad|iPod/i);
        },
        Opera: function() {
            return navigator.userAgent.match(/Opera Mini/i);
        },
        Windows: function() {
            return navigator.userAgent.match(/IEMobile/i);
        },
        any: function() {
            return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
        }
    };

    var JOBSEEKER = {};
    JOBSEEKER.UTIL =
        {
            initSignIn:function(){
                /*$("#cb-jobseeker-signin").validate({

                    rules: {
                        userid: {
                            required: true
                        },
                        password: {
                            required: true
                        }
                    },
                    messages: {
                        userid: "Please enter userid",

                        password: {
                            required: "Please provide password"
                        }
                    },
                    submitHandler: function(form) {
                        $.ajax({
                            type:'post',
                            url:base+'jobseeker/signin',
                            //url:'jobseeker/signin',
                            data:$("#cb-jobseeker-signin").serialize(),
                            beforeSend:function(){
                                $("#login-loader").show();
                            },
                            complete:function(){
                                $("#login-loader").hide();
                            },
                            success:function(result){
                                //alert(result);
                                var obj = jQuery.parseJSON(result);
                                if(obj.isSuccess)
                                {
                                    //location.href = obj.base;
                                    location.href = obj.baseApplicant;
                                }
                                else
                                {
                                    $(".callback-response").html('<div class="alert alert-danger">' +'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">Ã—</button>' +obj.msg +'</div>');
                                }
                            }
                        });
                    }
                });*/
            }
        }
    $(document).ready(function(e) {

        JOBSEEKER.UTIL.initSignIn();

        // initialize date picker
        $('.cb-datepicker').each(function(){
            $(this).datepicker({
                changeMonth:true,
                changeYear:true,
                numberOfMonths: 1,
                showButtonPanel: true,
                //yearRange: "-100:+50",
                dateFormat: 'dd-mm-yy'
            });
        });



        // global
        var Modernizr = window.Modernizr;

        // support for CSS Transitions & transforms
        var support = Modernizr.csstransitions && Modernizr.csstransforms;
        var support3d = Modernizr.csstransforms3d;
        // transition end event name and transform name
        // transition end event name
        var transEndEventNames = {
                'WebkitTransition' : 'webkitTransitionEnd',
                'MozTransition' : 'transitionend',
                'OTransition' : 'oTransitionEnd',
                'msTransition' : 'MSTransitionEnd',
                'transition' : 'transitionend'
            },
            transformNames = {
                'WebkitTransform' : '-webkit-transform',
                'MozTransform' : '-moz-transform',
                'OTransform' : '-o-transform',
                'msTransform' : '-ms-transform',
                'transform' : 'transform'
            };

        if( support ) {
            this.transEndEventName = transEndEventNames[ Modernizr.prefixed( 'transition' ) ] + '.PMMain';
            this.transformName = transformNames[ Modernizr.prefixed( 'transform' ) ];
            //console.log('this.transformName = ' + this.transformName);
        }




        /* ==========================================================================
           Detect page scrolls on buttons
           ========================================================================== */
        if( $('.pm-page-scroll').length > 0 ){

            $('.pm-page-scroll').click(function(e){

                e.preventDefault();
                var $this = $(e.target);
                var sectionID = $this.attr('href');


                $('html, body').animate({
                    scrollTop: $(sectionID).offset().top - 80
                }, 1000);

            });

        }

        /* ==========================================================================
           Mobile Menu trigger
           ========================================================================== */

        var menuOpen = false,
            $icon = null;

        $('#pm-mobile-menu-trigger').click(function(e) {

            $icon = $(this).find('i').removeClass('fa fa-bars').addClass('fa fa-close');

            if( !menuOpen ){
                menuOpen = true;
                $('body').removeClass('menu-collapsed').addClass('menu-opened');
            }

            e.preventDefault();

        });

        $('#pm-mobile-menu-overlay').click(function(e) {

            if( menuOpen ){
                menuOpen = false;
                $('body').removeClass('menu-opened').addClass('menu-collapsed');
                $icon.removeClass('fa fa-close').addClass('fa fa-bars');
            }

            e.preventDefault();

        });

        $('.pm-mobile-global-menu').css({
            'height' : 	$('#pm_layout_wrapper').height()
        });




        /* ==========================================================================
           Isotope menu expander (mobile only)
           ========================================================================== */
        if($('.pm-isotope-filter-system-expand').length > 0){

            var totalHeight = 0;

            $('.pm-isotope-filter-system-expand').click(function(e) {

                var $this = $(this),
                    $parentUL = $this.parent('ul');



                //get the height of the total li elements
                $parentUL.children('li').each(function(index, element) {
                    totalHeight += $(this).height();
                });

                if( !$parentUL.hasClass('expanded') ){

                    //expand the menu
                    $parentUL.addClass('expanded');

                    $parentUL.css({
                        "height" : totalHeight
                    });

                    $this.find('i').removeClass('fa-angle-down').addClass('fa-close');

                } else {

                    //close the menu
                    $parentUL.removeClass('expanded');

                    $parentUL.css({
                        "height" : 80
                    });

                    $this.find('i').removeClass('fa-close').addClass('fa-angle-down');

                }

                //reset totalheight
                totalHeight = 0;

            });

        }




        /* ==========================================================================
           Main menu interaction
           ========================================================================== */
        if( $('.pm-nav').length > 0 ){

        };

        /* ==========================================================================
           Checkout expandable forms
           ========================================================================== */
        if ($('#pm-returning-customer-form-trigger').length > 0){

            var $returningFormExpanded = false;

            $('#pm-returning-customer-form-trigger').on('click', function(e) {

                e.preventDefault();

                if( !$returningFormExpanded ) {
                    $returningFormExpanded = true;
                    $('#pm-returning-customer-form').fadeIn(700);

                } else {
                    $returningFormExpanded = false;
                    $('#pm-returning-customer-form').fadeOut(300);
                }

            });

        }

        if ($('#pm-promotional-code-form-trigger').length > 0){

            var $promotionFormExpanded = false;

            $('#pm-promotional-code-form-trigger').on('click', function(e) {

                e.preventDefault();

                if( !$promotionFormExpanded ) {
                    $promotionFormExpanded = true;
                    $('#pm-promotional-code-form').fadeIn(700);

                } else {
                    $promotionFormExpanded = false;
                    $('#pm-promotional-code-form').fadeOut(300);
                }

            });

        }


        /* ==========================================================================
           isTouchDevice - return true if it is a touch device
           ========================================================================== */

        function isTouchDevice() {
            return !!('ontouchstart' in window) || ( !! ('onmsgesturechange' in window) && !! window.navigator.maxTouchPoints);
        }











        /* ==========================================================================
           When the window is scrolled, do
           ========================================================================== */
        $(window).scroll(function () {

            //toggle back to top btn
            if ($(this).scrollTop() > 50) {
                if( support ) {
                    $('#back-top').css({ right : 0 });
                } else {
                    $('#back-top').animate({ right : 0 });
                }
            } else {
                if( support ) {
                    $('#back-top').css({ right : -70 });
                } else {
                    $('#back-top').animate({ right : -70 });
                }
            }

            //toggle fixed nav
            if( $(window).width() > 991 ){

                if ($(this).scrollTop() > 47) {

                    $('header').addClass('fixed');

                } else {

                    $('header').removeClass('fixed');

                }

            }



        });

        /* ==========================================================================
           Detect page scrolls on buttons
           ========================================================================== */
        if( $('.pm-page-scroll').length > 0 ){

            $('.pm-page-scroll').click(function(e){

                e.preventDefault();
                var $this = $(e.target);
                var sectionID = $this.attr('href');


                $('html, body').animate({
                    scrollTop: $(sectionID).offset().top - 80
                }, 1000);

            });

        }


        /* ==========================================================================
           Mobile menu button toggle
           ========================================================================== */
        if( $('#pm-mobile-menu-btn').length > 0 ){

            var menuCollapsed = false;

            $('#pm-mobile-menu-btn').on('click', function(e) {

                var $icon = $(this).find('i');

                if( !menuCollapsed ){

                    menuCollapsed = true;

                    $icon.removeClass('fa-bars').addClass('fa-minus');

                } else {

                    menuCollapsed = false;

                    $icon.removeClass('fa-minus').addClass('fa-bars');

                }

            });

        }

        /* ==========================================================================
           Back to top button
           ========================================================================== */
        $('#back-top').click(function () {
            $('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });




        /* ==========================================================================
           Window resize call
           ========================================================================== */
        $(window).resize(function(e) {
            methods.windowResize();
        });


    }); //end of document ready


    /* ==========================================================================
       Options
       ========================================================================== */
    var options = {
        dropDownSpeed : 100,
        slideUpSpeed : 200,
        slideDownTabSpeed: 50,
        changeTabSpeed: 200,
    }

    /* ==========================================================================
       Methods
       ========================================================================== */
    var methods = {

        displaySearch : function(e) {

            var searchContainer = $("#pm-search-container");

            searchContainer.css({
                'height' : $(window).height(),
                'opacity' : 1
            });

        },

        hideSearch : function(e) {

            var searchContainer = $("#pm-search-container");

            searchContainer.css({
                'opacity' : 0,
                'height' : 0
            });

        },


        dropDownMenu : function(e){

            var body = $(this).find('> :last-child');
            var head = $(this).find('> :first-child');

            if (e.type == 'mouseover'){
                body.fadeIn(options.dropDownSpeed);
            } else {
                body.fadeOut(options.dropDownSpeed);
            }

        },


        windowResize : function() {
            //resize calls
        },

    };



})(jQuery);

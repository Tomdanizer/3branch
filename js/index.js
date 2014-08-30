var threebranch = (function (){
    var init = function(){
        setupEvents();
    },

    setupEvents = function(){
        attachOwl();
       // attachScroll();
        
    },

    attachScroll = function(){
        scrolljack.init();
    },

    attachOwl = function(){
        $('#slides').fullpage({
        paddingTop: '71px',
        verticalCentered: false,
            navigation: true,
            scrollingSpeed: 400,
            resize: false,
            scrollOverflow: true,
            navigationPosition: 'right'
        });

        $('#beers').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            responsiveClass:true,
            responsive:{
                0:{
                    items:1,
                    nav:true
                },
                600:{
                    items:3,
                    nav:false
                },
                1000:{
                    items:5,
                    nav:true,
                    loop:false
                }
            }
        })
/*
        $('#people').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            responsiveClass:true,
            responsive:{
                0:{
                    items:1,
                    nav:true
                },
                600:{
                    items:3,
                    nav:false
                },
                1000:{
                    items:5,
                    nav:true,
                    loop:false
                }
            }
        })
    
*/
        $('#store_items').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            responsiveClass:true,
            responsive:{
                0:{
                    items:1,
                    nav:true
                },
                600:{
                    items:3,
                    nav:false
                },
                1000:{
                    items:5,
                    nav:true,
                    loop:false
                }
            }
        })






/*
        var slides = $('#slides');
        slides.owlCarousel({
            //animateOut: 'zoomOut',
            //animateIn: 'zoomIn',
            animateOut: 'fadeOutUpBig',
            animateIn: 'fadeInUpBig',
            mouseDrag: false,
            touchDrag: false,
            pullDrag: false,
            dots: false,
            items:1,
            nav:false
        });
        slides.on('mousewheel', '.owl-stage', function (e) {
            if (e.deltaY>0) {
                slides.trigger('next.owl');
            } else {
                slides.trigger('prev.owl');
            }
            e.preventDefault();
        });
*/
    };

       // public API
    return {
        init: init
    };

})();

$(document).ready(function() {
    threebranch.init();
});
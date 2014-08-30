var scrolljack = (function(){
    //Variables
    var screenHeight;
    var delta = 0;
    var currentSlideIndex = 0;
    var offset;
    var currentOffset = 0;
    var scrolling = false;
    var slides;
    var numSlides;
    var scrollThreshold = 2;

    //Functions
    var init = function(){
        setupEvents();
        slides = $(".homeSlide");
        numSlides = slides.length;
        offset = $("nav").height();
    },

    setupEvents = function(){
        $(window).on({'DOMMouseScroll mousewheel': scrollJack});
        $( window ).resize(setScreenHeight);
    }, 

    getScreenHeight = function(){


    },

    setScreenHeight = function(e){
        console.log("Resize:");
        console.log(e);
    },


    showSlide = function() {
     
        // reset
        delta = 0;
     
        slides.each(function(i, slide) {
            //var $target = $("#" + $(this).data('target'));
            if(i === currentSlideIndex){
                slide = $(slide);
                var slideOffset = slide.offset();
                if(slideOffset && slideOffset.top && (slideOffset.top-offset !== currentOffset) && scrolling !==true){
                    currentOffset = slide.offset().top - offset;
                    console.log(slide.offset());
                    console.log(slide.offset().top);
                    scrolling=true;
                    $('html body').animate({
                        scrollTop: currentOffset
                    }, 500).promise().done(function() {
                            console.log("scrolling done");
                            scrolling = false;
                        // Animation complete.
                        });
                 
                }
            }
            

        });
            //$(slide).toggleClass('active', (i >= currentSlideIndex));
     
    },
     
     
    prevSlide = function() {
     
        currentSlideIndex--;
     
        if (currentSlideIndex < 0) {
            currentSlideIndex = 0;
        }
     
        if(!scrolling){
            showSlide();
        }
    },
     
    nextSlide = function() {
     
        currentSlideIndex++;
     
        if (currentSlideIndex > numSlides) { 
            currentSlideIndex = numSlides;
        }
     
        if(!scrolling){
            showSlide();
        }
    },


    //I'm terribly sorry.
    scrollJack = function(e){
        // --- Scrolling up ---
        if (e.originalEvent.detail < 0 || e.originalEvent.wheelDelta > 0) { 
     
            delta--;
     
            if ( Math.abs(delta) >= scrollThreshold) {
                prevSlide();
            }
        }
     
        // --- Scrolling down ---
        else {
     
            delta++;
     
            if (delta >= scrollThreshold) {
                nextSlide();
            }
        }
     
        // Prevent page from scrolling
        return false;
    };

       // public API
    return {
        init: init
    };
})();
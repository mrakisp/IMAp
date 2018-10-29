jQuery(document).ready(function () {

    jQuery('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        dots:true,
        lazyLoad:true,
        autoplay:true,
        autoplayTimeout:4000,
        autoplayHoverPause:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:4
            }
        }
    });

})
jQuery(document).ready(function () {

    jQuery('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        dots:true,
        lazyLoad:true,
        autoplay:true,
        autoplayTimeout:7000,
        autoplayHoverPause:true,
        responsive:{
            0:{
                items:1
            },
            460:{
                items:2
            },
            1000:{
                items:3
            },
            1400:{
                items:5
            }
        }
    });

})
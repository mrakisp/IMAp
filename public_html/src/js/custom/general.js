jQuery(document).ready(function () {

    jQuery(".article_infobox__item__seen").click(function () {
        jQuery(this).children('.far').toggleClass('fa-eye-slash').toggleClass('fa-eye');
        jQuery(this).parent().parent().parent().toggleClass('disabled');
    });

    jQuery(".article_infobox__item__fav").click(function () {
        jQuery(this).children('.fa-heart').toggleClass('fas').toggleClass('far');
    });

});

function goToByScroll(id,className) {
    if (className === 'topage'){
        
    }
    // Scroll
    jQuery('html,body').animate({
        scrollTop: jQuery(id).offset().top
    }, 'slow');
}

jQuery(".top-area__main-menu > ul > li > a:not(.to-page)").click(function (e) {
    e.preventDefault();
    var id = jQuery(this).attr('href');
    var className = $(this).attr('class');
    // Call the scroll function
    goToByScroll(id,className);
});
jQuery(document).ready(function () {

    jQuery( ".article_infobox__item__seen" ).click(function() {
        jQuery(this).children('.far').toggleClass('fa-eye-slash').toggleClass('fa-eye');
        jQuery(this).parent().parent().parent().toggleClass('disabled');
    });

    jQuery( ".article_infobox__item__fav" ).click(function() {
        jQuery(this).children('.fa-heart').toggleClass('fas').toggleClass('far');
    });

})
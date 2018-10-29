jQuery(document).ready(function () {

    jQuery( ".article_infobox__item__seen" ).click(function() {
        jQuery(this).children('.far').addClass('fa-eye-slash').removeClass('fa-eye');
    });

    jQuery( ".article_infobox__item__fav" ).click(function() {
        jQuery(this).children('.far').addClass('fas').removeClass('far');
    });

})
jQuery(document).ready(function () {

    var tabs = jQuery('.tabs');
    var items = jQuery('.tabs').find('a').length;
    var selector = jQuery(".tabs").find(".selector");
    var activeItem = tabs.find('.active');
    var activeWidth = activeItem.innerWidth();
    jQuery(".selector").css({
        "left": activeItem.position.left + "px", 
        "width": activeWidth + "px"
    });

    jQuery(".tabs").on("click","a",function(){
        event.preventDefault();
        jQuery('.tabs a').removeClass("active");
        jQuery('.tab-container').removeClass('active-tab');
        jQuery('.tab-container').hide();
        jQuery(this).addClass('active');
        var selectedTab = jQuery(this).attr('href').replace('/','');
        jQuery(selectedTab).addClass('active-tab');
        jQuery(selectedTab).fadeIn(200);
        var activeWidth = jQuery(this).innerWidth();
        var itemPos = jQuery(this).position();
            jQuery(".selector").css({
                "left":itemPos.left + "px", 
                "width": activeWidth + "px"
            });
    });

})
$(function() {

    //change the classes
    var btn = $(".scroll__hide");
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();

        if (scroll > 1500) {
            btn.removeClass('scroll__hide').addClass("show");
        } else {

            if(scroll < 1500){
                btn.removeClass("show").addClass('scroll__hide');
            }
            
        }

    });

//scroll to top
    $("#scrollToTop").click(function() {
        $('html,body').animate({
            scrollTop: $(".post-container").offset().top},
            'slow');
    });

});
//end of scroll function
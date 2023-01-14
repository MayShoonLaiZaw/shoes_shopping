$(function() {
    $("#nav").hide();
    $(".header-bars i").click(function() {
        $("#nav").slideToggle();
    })
    // $(window).scroll(function() {
    //     $(window).scrollTop();
    // })
    
    $("#category-").click(function() {
        $("html,body").animate({
            scrollTop: $("#product-").offset().top
        },1200);
    })
})

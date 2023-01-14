let confirm_btn = document.querySelector("#confirm");
let cancel_confirm = document.querySelector("#cancel-confirm");
let cancel=document.querySelector("#cancel");
let confirmbtn = document.querySelector("#confirmbtn");
confirm_btn.addEventListener("click",function() {
    cancel_confirm.style.display = "block";
    confirm_btn.style.display = "none";
})
cancel.addEventListener("click",function() {
    cancel_confirm.style.display = "none";
    confirm_btn.style.display = "block";
})
confirmbtn.addEventListener("click",function() {
    cancel_confirm.style.display = "none";
    confirm_btn.style.display = "block";
})

$(function() {
    $("#nav").hide();
    $(".header-bars i").click(function() {
        $("#nav").slideToggle();
    })
    $(".products-button i").click(function() {
        $(".products-button i").css("color","#FCFF43");
    })
    $("#readless").hide();
    $("#readmore").click(function() {
        $(".comments-fetch").css("overflow","unset");
        $("#readless").show();
        $("#readmore").hide();
    })
    $("#readless").click(function() {
        $(".comments-fetch").css("overflow","hidden");
        $("#readmore").show();
        $("#readless").hide();
    })
    
})
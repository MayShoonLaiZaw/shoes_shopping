$(function() {
    $("#nav").hide();
    $(".header-bars i").click(function() {
        $("#nav").slideToggle();
    })

    $(".check").change(function(){
        $(".check").not(this).prop("checked",false);
    })
    $(".bg-color").hide();
    $("#place-order").click(function() {
        $(".bg-color").slideToggle();
    })
    
    $("#select").click(function() {
        location.href="index.php";
    })
    
    
})
var plus = document.querySelectorAll(".plus");
var minus = document.querySelectorAll(".minus");
var product_price = document.querySelectorAll(".product-price");
var product_quantity = document.querySelector("#product-quantity");
var product_alltotal = document.querySelector("#product-alltotal");
var total_product_price = document.querySelector("#total-product-price");

product_price.forEach(price=> {
    plus.forEach(items=> {
        items.addEventListener("click",function() {
            var price_origin = +price.innerText;
            var quantity_add = +product_quantity.innerText;
            var added_qty = quantity_add + 1;
            var added_price = added_qty * price_origin;
            total_product_price.innerText = added_price;
            product_quantity.innerText = added_qty;
            product_alltotal.innerText = added_price;
        })
    })
    minus.forEach(items=> {
        items.addEventListener("click",function() {
            if(product_quantity.innerText > 1 ) {
                var price_origin = +price.innerText;
                var quantity_add = +product_quantity.innerText;
                var added_qty = quantity_add - 1;
                var added_price = added_qty * price_origin;
                total_product_price.innerText = added_price;
                product_quantity.innerText = added_qty;
                product_alltotal.innerText = added_price;
            }
        })
    })
    
})

var cash_checkbox = document.querySelectorAll(".cash-icon input");
var select = document.querySelector("#select");
cash_checkbox.forEach(checkbox => {
    checkbox.addEventListener("click",function() {
        select.disabled = false;
    })
});

let product_id = document.querySelector(".product-id");
let remove_all = document.querySelector("#remove-all");
let place_order = document.querySelector("#place-order");
if(product_id) {
    remove_all.disabled = false;
    place_order.disabled= false;
} else {
    remove_all.disabled = true;
    place_order.disabled= true;
}

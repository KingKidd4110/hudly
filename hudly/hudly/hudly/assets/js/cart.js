$(document).ready(function() {


$("#cart").click(function() {
    $("#navbar").trigger("click");
    $(".cart").trigger("click");
})


$(".cart").click(function() {
    $(".cart-container").toggle();
})


$(".close").click(function() {
    $(".cart-container").hide();
})
    

$(document).mouseup(function(e) {
    var container = $(".cart-container");


    if (!container.is(e.target) && container.has(e.target).length === 0) {
        container.hide();
    }
})


})
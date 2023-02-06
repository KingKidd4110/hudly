$(document).ready(function() {



    function openSide() {
        $("#navbar").hide()
        $("#navbar1").show()
        $(".sidebar").show();
    }

    function closeSide() {
        $("#navbar").show()
        $("#navbar1").hide()
        $(".sidebar").hide();
    }

$("#navbar").click(function(event) {
    event.preventDefault();
   openSide(); 
})

$("#navbar1").click(function(event) {
    event.preventDefault()
    closeSide();
 })




$(document).mouseup(function(e) {
    var container = $(".sidebar");

    if(container.css("display") == "none") {
        return;
    } else {
        closeSide();
    }


})

})
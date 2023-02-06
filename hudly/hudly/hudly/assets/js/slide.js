$(document).ready(function() {
var imageIndex = 0;
function slider() {
    if (imageIndex == images.length) {
        imageIndex = 0;
    }
    $("#slide_image").attr("src", "./images/ads/" + images[imageIndex]);
    imageIndex++;
}

setInterval(slider, 1500 + 1000);
})
$(".saveit111").click(function(){
    $("#tsc").trigger("click");
    $.ajax({
        type: 'POST',
        url: 'scripts/saved_item.php',
        success: function(data){
            $("#savebody").html(data);
        }
    })
});

$("#qqqq").click(function() {
    $.ajax({
        type: 'POST',
        url: 'scripts/clear-cart.php',
        success: function(data){
            $("#mainOutput").html(data);
        }
    })
});

$("#csi").click(function() {
    $.ajax({
        type: 'POST',
        url: 'scripts/clear-save.php',
        data: {
            clear_save: ''
        },
        success: function(data){
            //$("#mainOutput").html(data);
            $("#savebody").html("")
        }
    })
});


$("#cart").click(function() {
    $("#cartbody").html("<i class='fa fa-spinner fa-spin'></i>");
    $.ajax({
        type: 'POST',
        url: 'scripts/cart_script.php',
        success: function(data){
            $("#cartbody").html(data);
        }
    })
});

$(".logoutbtn11").click(function() {
    $.ajax({
        type: 'POST',
        url: 'scripts/user_logout.php',
        data:{
            e: "logout"
        },
        success: function(){
            window.location.href = "index.php";
        }
    })
});



$("#search").keyup(function() {

    if($("#search").val() == "") {
        $.ajax({
            type: 'POST',
            url: 'scripts/main.php',
            success: function(data){
                $(".gallery").html(data);
            }
        })
    }
    $.ajax({
        type: 'POST',
        url: 'scripts/search_script.php',
        data:{
            name:$("#search").val()
        },
        success: function(data){
            $(".gallery").html(data);
        }
    })
});



function addToCart(uid, pid){
        $.ajax({
        type: 'POST',
        url: 'scripts/add_to_cart.php',
        data: {
            add_to_cart: '',
            uid:uid,
            pid:pid
        },
        success: function(data){
        $('#loadingclose').trigger('click');
            alert(data);
        }
        });
}


function rateProduct(star_no, pid) {
    $.ajax({
        type: 'POST',
        url: 'scripts/rating_script.php',
        data: {
            rate_product: '',
            rate: star_no,
            pid: pid
        },
        success: function(data) {
            $('#alert').html(data);
            for (let i = 0; i < star_no; i++) {
                $("#star"+ i).css("color", "gold");
                
            }
        }
    })
}


function saveProduct(pid) {
    $.ajax({
        type: 'POST',
        url: 'scripts/add_to_save.php',
        data: {
            save_product: '',
            pid: pid
        },
        success: function(data) {
            $('#alert').html(data)
        }
    })
}


function removeCartSaved(id) {
    $.ajax({
        type: 'POST',
        url: 'scripts/remove_cart_item.php',
        data: {
            remove: '',
            id: id
        },
        success: function(data){
            $("#cartId" + id).remove();
        }
})
}

function searchq(category) {
    $.ajax({
      type: 'POST',
      url: 'scripts/search_category.php',
      data:{
        name:category
      },
      success: function(data){
        $(".gallery").html(data);
      }
    })
}
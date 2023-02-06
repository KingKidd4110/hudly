$("#search").keyup(function() {
    $.ajax({
        type: 'POST',
        url: '../scripts/search_script.php',
        data:{
            name:$("#search").val()
        },
        success: function(data){
            $("#output").html(data);
        }
    })
});

$("#logoutbtn").click(function() {
    $.ajax({
        type: 'POST',
        url: '../scripts/user_logout.php',
        data:{
            e:"logout"
        },
        success: function(data){
            $("#alert").html(data);
        }
    })
});

$("#cart").click(function() {
    $.ajax({
        type: 'POST',
        url: '../scripts/store_cart_script.php',
        success: function(data){
            $("#cartbody").html(data);
        }
    })
});


$("#registerSignup").click(function() {
    $.ajax({
        type: 'POST',
        url: '../account/register.html',
        success: function(data){
            $("#mainOutput").html(data);
        }
    })
});

$("#storeLogin").click(function(){
    $("#userl").css("display", "none");
    $("#storel").css("display", "block");
});

$("#accLogin").click(function(){
    $("#userl").css("display", "block");
    $("#storel").css("display", "none");
});

$("#saveit").click(function(){
    $("#tsc").trigger("click");
    $.ajax({
        type: 'POST',
        url: '../scripts/saved_item.php',
        success: function(data){
            $("#savebody").html(data);
        }
    })
});

$("#qqqq").click(function() {
    $.ajax({
        type: 'POST',
        url: '../scripts/clear-cart.php',
        success: function(data){
            $("#mainOutput").html(data);
        }
    })
});

$("#csi").click(function() {
    $.ajax({
        type: 'POST',
        data: {
            clear_save: ''
        },
        url: '../scripts/clear-save.php',
        success: function(data){
            $("#mainOutput").html(data);
        }
    })
});


function removeItemSaved(id) {
    $.ajax({
        type: 'POST',
        url: '../scripts/remove_save_item.php',
        data: {
            remove: '',
            id: id
        },
        success: function(data){
            alert('Item Removed From Saved Items');
        }
    })
}


function removeCartSaved(id) {
    $.ajax({
        type: 'POST',
        url: '../scripts/remove_cart_item.php',
        data: {
            remove: '',
            id: id
        },
        success: function(data){
            alert('Item Removed From Cart');
        }
})
}


function rateProduct(star_no, pid) {
    $.ajax({
        type: 'POST',
        url: '../scripts/rating_script.php',
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


function addToCart(uid, pid){
    $.ajax({
    type: 'POST',
    url: '../scripts/add_to_cart.php',
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


function saveProduct(pid) {
    $.ajax({
        type: 'POST',
        url: '../scripts/add_to_save.php',
        data: {
            save_product: '',
            pid: pid
        },
        success: function(data) {
            $('#alert').html(data)
        }
    })
}

function updateTotal(total) { 
    $('#total').text('Total: $' + total);
 }

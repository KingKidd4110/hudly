    $("#search").keyup(function() {
        $.ajax({
            type: 'POST',
            url: 'scripts/search_script.php',
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
            url: 'scripts/user_logout.php',
            data:{
                e: "logout"
            },
            success: function(){
                window.location.href = "index.php";
            }
        })
    });
    
    $("#loginbtn").click(function() {
       $(".btn-close").trigger("click")
    })
    
    
    $("#cart").click(function() {
        $("#cartbody").html("<i class='fa fa-spinner fa-spin'></i>");
        $.ajax({
            type: 'POST',
            url: 'scripts/cart_script.php',
            success: function(data){
                $("#cartbody").html(data);
                //updateTotal(100);
            }
        })
    });
    
    
    $("#registerSignup").click(function() {
        $.ajax({
            type: 'POST',
            url: 'account/register.html',
            success: function(data){
                $("#mainOutput").html(data);
            }
        })
    });

    $("#saveit").click(function(){
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
                $("#mainOutput").html(data);
            }
        })
    });

   $(document).ready(function(){
            $('body').find('img[src$="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png"]').parent().closest('a').closest('div').remove();
        });
        
            

    function searchq(category) {
        $.ajax({
          type: 'POST',
          url: 'scripts/search_category.php',
          data:{
            name:category
          },
          success: function(data){
            $("#output").html(data);
          }
        })
    }


    function removeItemSaved(id) {
            $.ajax({
                type: 'POST',
                url: 'scripts/remove_save_item.php',
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
            url: 'scripts/remove_cart_item.php',
            data: {
                remove: '',
                id: id
            },
            success: function(data){
                alert('Item Removed From Cart');
            }
    })
}
   
    
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

    function updateTotal(total) { 
        $('#total').text('Total: $' + total);
     }

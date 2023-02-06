    function addQ(id) {
        var q = $("#cartId" + id + " .quantity").text();
        var max = $("#pMax" + id).text();
        var max = +max;
        var q = +q;
        var q = q + 1 ;
        if(q <= max) {
            $("#cartId" + id + " .quantity").text(q);
        } else {
            return;
        }
        
    }


    function minusQ(id) {
        var q = $("#cartId" + id + " .quantity").text();
        var q = +q;
        if(q == 1 || q == 0) {
            return
        } else {
            var q = q - 1 ;
            $("#cartId" + id + " .quantity").text(q);
        }
        
    }
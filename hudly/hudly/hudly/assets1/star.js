     $("#star1").mouseover(function(){
        $("#star1").css("color", "gold")
    })

    $("#star1").mouseleave(function(){
        if ($("#star1").hasClass("selected")) {
            $("#star1").css("color", "gold")
        } else {
            $("#star1").css("color", "black");
        }
    })

    $("#star1").click(function(){
        $("#star1").css("color", "gold");
        $("#star1").addClass("selected");
    })





    $("#star2").mouseover(function(){
        $("#star1").css("color", "gold");
        $("#star2").css("color", "gold");
    })

    $("#star2").mouseleave(function(){
        if ($("#star2").hasClass("selected")) {
            $("#star1").css("color", "gold");
            $("#star2").css("color", "gold");
        } else {
            $("#star2").css("color", "black");
        }
        
    })

    $("#star2").click(function(){
        $("#star1").css("color", "gold");
        $("#star2").css("color", "gold");
        $("#star1").addClass("selected");
        $("#star2").addClass("selected");
    })





    $("#star3").mouseover(function(){
        $("#star1").css("color", "gold");
        $("#star2").css("color", "gold");
        $("#star3").css("color", "gold");
    })

    $("#star3").mouseleave(function(){
        if ($("#star3").hasClass("selected")) {
            $("#star1").css("color", "gold");
            $("#star2").css("color", "gold");
            $("#star3").css("color", "gold");
        } else {
            $("#star3").css("color", "black");
        }
    })

    $("#star3").click(function(){
        $("#star1").css("color", "gold");
        $("#star2").css("color", "gold");
        $("#star3").css("color", "gold");
        $("#star1").addClass("selected");
        $("#star2").addClass("selected");
        $("#star3").addClass("selected");
    })






    $("#star4").mouseover(function(){
        $("#star1").css("color", "gold");
        $("#star2").css("color", "gold");
        $("#star3").css("color", "gold");
        $("#star4").css("color", "gold");
    })

    $("#star4").click(function(){
        $("#star1").css("color", "gold");
        $("#star2").css("color", "gold");
        $("#star3").css("color", "gold");
        $("#star4").css("color", "gold");
        $("#star1").addClass("selected");
        $("#star2").addClass("selected");
        $("#star3").addClass("selected");
        $("#star4").addClass("selected");
    })

    $("#star4").mouseleave(function(){
        if ($("#star4").hasClass("selected")) {
            $("#star1").css("color", "gold");
            $("#star2").css("color", "gold");
            $("#star3").css("color", "gold");
            $("#star4").css("color", "gold");
        } else {
            $("#star4").css("color", "black");
        }
    })






    $("#star5").mouseover(function(){
        $("#star1").css("color", "gold");
        $("#star2").css("color", "gold");
        $("#star3").css("color", "gold");
        $("#star4").css("color", "gold");
        $("#star5").css("color", "gold");
    })

    $("#star5").click(function(){
        $("#star1").css("color", "gold");
        $("#star2").css("color", "gold");
        $("#star3").css("color", "gold");
        $("#star4").css("color", "gold");
        $("#star5").css("color", "gold");
        $("#star1").addClass("selected");
        $("#star2").addClass("selected");
        $("#star3").addClass("selected");
        $("#star4").addClass("selected");
        $("#star5").addClass("selected");
    })

    $("#star5").mouseleave(function(){
        if ($("#star5").hasClass("selected")) {
            $("#star1").css("color", "gold");
            $("#star2").css("color", "gold");
            $("#star3").css("color", "gold");
            $("#star4").css("color", "gold");
            $("#star5").css("color", "gold");
        } else {
            $("#star5").css("color", "black");
        }
    })
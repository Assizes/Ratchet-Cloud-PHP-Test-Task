$( document ).ready(function(){
    $("#signIn").on("click", function(){
       $("#loginModal").fadeIn(400);
       $(".overlay").fadeIn(400);
    });
    $("#signUp").on("click", function(){
        $("#loginWrap").hide();
        $("#signWrap").show();
    });
    $("#logIn").on("click",function(){
        $("#signWrap").hide();
        $("#loginWrap").show();
    });
    $(".overlay").on("click",function(){
       $("#loginModal").fadeOut(400);
       $(".overlay").fadeOut(400);
    });
    $( "#registerForm" ).submit(function( event ) {
        event.preventDefault();
        var form = $(this);
        var userName = form.find("#regUserName").val();
        var pass = form.find("#regPass").val();
        var passConf = form.find("#passConf").val();
        var url = form.attr("action");
        if(userName && pass && (pass === passConf)){
            var register = $.post(url, {userName: userName, pass: pass});
            register.done(function(data) {
               var response = JSON.parse(data);
               if(response["errors"]){
                   for(var prop in response){
                       $("#loginModal").prepend("<div class='alert alert-danger'>"+ JSON.stringify(response[prop]) +"</div>");
                   }
               }
               else{
                    $(".alert").remove();
                    $("#loginModal").prepend("<div class='alert alert-success'>You registered successfully</div>");
                    $("#signWrap").hide();
                    $(".userName").text(userName);
                    $("#signIn").hide();
               }
            });
        }
        else{
            alert("Entered passwords do not match!");
        }
    });
    $( "#loginForm" ).submit(function( event ) {
        event.preventDefault();
        var form = $(this);
        var userName = form.find("#logUserName").val();
        var pass = form.find("#logPass").val();
        var url = form.attr("action");
        var login = $.post(url, {userName: userName, pass: pass});
        login.done(function(data) {
            var response = JSON.parse(data);
            if(response["errors"]){
                for(var prop in response){
                    $("#loginModal").prepend("<div class='alert alert-danger'>"+ JSON.stringify(response[prop]) +"</div>");
                }
            }
            else{
                $(".alert").remove();
                location.reload();
            }
        });
    });
});

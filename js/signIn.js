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
        var userName = form.find("#regUserName").val()
        var pass = form.find("#regPass").val();
        var passConf = form.find("#passConf").val();
        var url = form.attr("action");
        if(userName && pass && (pass === passConf)){
            var register = $.post(url, {userName: userName, pass: pass});
            register.done(function(data) {
               if(data.length === 0){
                   console.log(data);
                   $("#loginModal").prepend("<div class='succes'>You registered successfully</div>");
               }
               else{
                   console.log(data);
               }
            });
        }
        else{
            alert("your comment is empty!");
        }
    });
});

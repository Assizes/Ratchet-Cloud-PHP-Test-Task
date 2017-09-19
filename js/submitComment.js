$( document ).ready(function(){
    $( "#commentForm" ).submit(function( event ) {
        event.preventDefault();
        var form = $(this);
        var commentText = form.find("textarea").val()
        var topicId = form.find("input#topicId").val();
        var url = form.attr("action");
        if(commentText){
            var posting = $.post(url, {topicId: topicId, textRaw: commentText});
            posting.done(function(data) {
               $(".commentsWrap").append(data);
               var repiesCount = parseInt($("#repliesCount").text());
               $("#repliesCount").text(repiesCount+1);
               form.find("textarea").val("");
            });
        }
        else{
            alert("your comment is empty!");
        }
    });
});
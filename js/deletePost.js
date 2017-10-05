$( document ).ready(function(){
    $(".deletePost").on("click", deletePost);
});

function deletePost(){
    var node = $(this).closest(".comment");
    var postId = node.find("input").val();
    console.log(postId);
    var deletePost = $.post(sitePath+"post/delete/", {postId: postId});
        deletePost.done(function(data) {
            var response = JSON.parse(data);
            if(response['status'] === 'success'){
                node.prepend("<div class='alert alert-success'>Comment deleted successfully</div>");
                node.delay(2000).slideUp(1000,function(){
                    $(this).remove();
                });
                var repiesCount = parseInt($("#repliesCount").text());
                $("#repliesCount").text(repiesCount-1);
            }else{
                node.prepend("<div class='alert alert-danger'>"+response['status']+"</div>");
                $(".alert").delay(2000).hide(1000,function(){
                    $(this).remove();
                });
            }
        });
}
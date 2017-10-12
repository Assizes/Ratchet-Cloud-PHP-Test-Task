$( document ).ready(function(){
    $(".editPost").on("click", edit);
});
function edit(event){
    var post = $(event.target).closest(".comment");
    var nodeId = post.find("input[name='nodeid']").val();
    var nodeText = post.find(".nodeText").html().replace(/<br\s*[\/]?>/gi, "\r");
    var form = buildEditForm(nodeText,nodeId);

    post.find(".replaceWrap").replaceWith(form);

    var textarea = form.find("textarea").get(0);
    resizeTextArea(textarea);      
    $(textarea).on( "keyup paste", function(){
        resizeTextArea(textarea);
    });
    $(form).on("submit",function( event ) {
        event.preventDefault();
        submitChanges(form, nodeText);
    });
    $(event).off();
}

function resizeTextArea(textArea){
    var $el = $(textArea), offset = $el.innerHeight() - $el.height();
    if ($el.innerHeight < textArea.scrollHeight) {
        $el.height(textArea.scrollHeight - offset);
    } else {
        $el.height(1);
        $el.height(textArea.scrollHeight - offset);
    }
}

function buildEditForm(nodeText,id){
    var form = $("<form class='editComment' action=''></form>");
    var nodeId = $("<input class='nodeId' type='hidden' value='"+id+"'>");
    var textArea = $("<textarea class='editPostText'></textarea>");
    var submitButton = $("<button class='submitChanges'>Submit</button>");
    textArea.html(nodeText);
    form.append(nodeId);
    form.append(textArea);
    form.append(submitButton);

    return form;
}

function submitChanges(f, originalText){
    
    $(".alert").remove();
    var form = $(f);
    var commentText = form.find("textarea").val();
    var postId = form.find("input").val();
    
    if(commentText === ""){
        alert("your comment is empty!");
    }
    else{
        var posting = $.post(sitePath+"post/edit/", {postId: postId, textRaw: commentText});
        posting.done(function(data) {
            var response = JSON.parse(data);
            if(response['status'] === 'success'){
                var node = buildComment(commentText);
                form.replaceWith(node);
                $(node).closest(".comment").prepend("<div class='alert alert-success'>Comment changed successfully</div>");
                $(".alert").delay(2000).hide(1000);
                $(form).off();
                $(form).find("textarea").off();
                //var editbutton = node.find(".editPost");
                //editbutton.on("click",edit);
            }else{
                node.closest(".comment").prepend("<div class='alert alert-danger'>"+response['status']+"</div>");
                $(".alert").delay(2000).hide(1000);
            }
        });
    }
}

function buildComment(text){
    var wrap = $("<div class='replaceWrap'></div>");
    var nodeText = $("<div class='nodeText'></div>");
    var buttonsWrap = $("<div class='commentButtonsWrap'></div>");
    var editButton = $("<span class='editPost'>Edit</span>");
    var deleteButton = $("<span class='deletePost'>Delete</span>");
    nodeText.html(text.replace(/\r?\n/g,'<br>'));
    wrap.append(nodeText);
    buttonsWrap.append(deleteButton);
    buttonsWrap.append(editButton);
    wrap.append(buttonsWrap);
    editButton.on("click",edit);
    deleteButton.on("click",deletePost);
    return wrap;
}
$( document ).ready(function(){
    $(".editPost").on("click", function(event){
        var post = $(this).parent("div");
        var nodeId = post.find("input[name='nodeid']").val();
        var nodeText = post.find(".nodeText").text();
        var textArea = $("<textarea class='editPostText' />");
        textArea.text(nodeText);
        post.find(".nodeText").replaceWith(textArea);
        
        resizeTextArea(textArea.get(0));
        
        textArea.bind( "keyup paste", function(){
            resizeTextArea(this);
        });
    });
});

function resizeTextArea(textArea){
    console.log(textArea);
    var $el = $(textArea), offset = $el.innerHeight() - $el.height();
    console.log($el);
    console.log(offset);
    if ($el.innerHeight < textArea.scrollHeight) {
        $el.height(textArea.scrollHeight - offset);
    } else {
        $el.height(1);
        $el.height(textArea.scrollHeight - offset);
    }
}
<form method="POST" id="postForm" action="http://192.168.0.12/Ratchet-Cloud-PHP-Test-Task/posts/submit/">
    <div class="form-group">
        <label for="postTitle">Post title</label><br>
        <input id="postTitle" type="text" name="postTitle" /><br>
        <label for="postTextArea">Post text</label><br>
        <textarea class="form-control" id="postTextArea" rows="5" name="postTextArea"></textarea>
        <input type="submit" value="Submit" class="btn btn-primary">
    </div>
</form>
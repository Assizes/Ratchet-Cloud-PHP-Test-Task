<form id="commentForm" action="">
    <div class="form-group">
        <input id="topicId" type="hidden" name="topicId" value="<?php echo $_GET["id"]; ?>">
        <label for="commentTextArea">Reply</label>
        <textarea class="form-control" id="commentTextArea" rows="5"></textarea>
        <input type="submit" value="Submit" class="btn btn-primary">
    </div>
</form>
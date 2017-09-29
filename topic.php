<?php
if(isset($_GET["id"])){
    $topicId = $_GET["id"];
    $selectPostAndComments = "SELECT node.title, node.publishdate, text.rawtext, users.username, "
            . "(SELECT count(nodeid) FROM node WHERE parentid = :id) AS postcount "
            . "FROM node INNER JOIN text ON node.nodeid = text.nodeid "
            . "INNER JOIN users ON node.userid = users.id "
            . "WHERE (node.nodeid = :id AND node.contenttypeid = 22) OR node.parentid = :id "
            . "ORDER BY node.publishdate ASC";
        $params = array(":id" => $topicId);
        $res = $db->prepare($selectPostAndComments);
        $quary = $res->execute($params);
        $post = $res->fetch(PDO::FETCH_ASSOC);
        if($post){
?>
<div class="post">
    <h1><?php echo $post["title"] ?></h1>
    <div>
        <?php renderPost($post);?>
    </div>
</div>

<h6>Replies:&nbsp;<span id="repliesCount"><?php echo $post["postcount"] ?></span></h6>

<div class="commentsWrap">

    <?php while($comment = $res->fetch(PDO::FETCH_ASSOC)){?>
    
    <div class="comment">
        <?php renderPost($comment);?>
    </div>
    
    <?php } ?>
</div>
<?php
            if(isset($_SESSION["siteUsername"])){
?>
                <form id="commentForm" action="submitForm.php">
                    <div class="form-group">
                        <input id="topicId" type="hidden" name="topicId" value="<?php echo $topicId; ?>">
                        <label for="commentTextArea">Reply</label>
                        <textarea class="form-control" id="commentTextArea" rows="5"></textarea>
                        <input type="submit" value="Submit" class="btn btn-primary">
                    </div>
                </form>

<?php
            }
        }else{
            echo "<div class='alert alert-danger' role='alert'>Post with this id does not exist</div>";
        }
            
}

function renderPost($raw){
    echo "<h6>Posted on ".Date("F jS, Y, g:ia",$raw["publishdate"])." by: ".$raw["username"]."</h6>";
    echo "<div>".$raw["rawtext"]."</div>";
    if(isset($_SESSION['siteUsername']) && $_SESSION['siteUsername'] === $raw["username"]){
        echo "<span class='editPost'>Edit</span>";
    }
}
?>
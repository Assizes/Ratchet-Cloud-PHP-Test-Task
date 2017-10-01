<?php global $user; $post = $posts->fetch(PDO::FETCH_ASSOC); ?>

<div class="post">
    <h1><?php echo $post["title"] ?></h1>
    <div>
        <?php renderPost($post);?>
    </div>
</div>

<h6>Replies:&nbsp;<span id="repliesCount"><?php echo $post["postcount"] ?></span></h6>

<div class="commentsWrap">
<?php while($comment = $posts->fetch(PDO::FETCH_ASSOC)){?>
    
    <div class="comment">
        <?php renderPost($comment);?>
    </div>
    
<?php } ?>
</div>

<?php
if($user->getId() !== ""){
    include_once("./views/commentForm.php");
}

function renderPost($raw){
    
    global $user;
    
    echo "<input name='nodeid' type='hidden' value='".$raw["nodeid"]."'>";
    echo "<h6>Posted on ".Date("F jS, Y, g:ia",$raw["publishdate"])." by: ".$raw["username"]."</h6>";
    echo "<div class='nodeText'>".$raw["rawtext"]."</div>";
    if($user->getId() === $raw["userid"]){
        echo "<span class='editPost'>Edit</span>";
    }
}
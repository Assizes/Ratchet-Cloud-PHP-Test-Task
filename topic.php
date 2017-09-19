<?php
if(isset($_GET["id"])){
    $selectPostAndComments = "SELECT node.title, node.publishdate, text.rawtext, "
            . "(SELECT count(nodeid) FROM node WHERE parentid = :id) AS postcount "
            . "FROM node INNER JOIN text ON node.nodeid = text.nodeid "
            . "WHERE node.nodeid = :id OR node.parentid = :id "
            . "ORDER BY node.publishdate ASC";
        $params = array(":id" => $_GET['id']);
        $res = $db->prepare($selectPostAndComments);
        $quary = $res->execute($params);
        $post = $res->fetch(PDO::FETCH_ASSOC);
?>
<div>
    <h1><?php echo $post["title"] ?></h1>
    <div>
        <?php renderPost($post);?>
    </div>
</div>
<h6>Replies:&nbsp;<?php echo $post["postcount"] ?></h6>

<?php
    while($comment = $res->fetch(PDO::FETCH_ASSOC)){
?>
<div>
    <?php renderPost($comment);?>
</div>
<?php
    }
?>

<h6>Reply</h6>
<form>
    <textarea></textarea>
    <button>Submit</button>
</form>
<?php
}

function renderPost($raw){
    echo "<h5>Posted on ".Date("F jS, Y, g:ia",$raw["publishdate"])."</h5>";
    echo "<div>".$raw["rawtext"]."</div>";
}
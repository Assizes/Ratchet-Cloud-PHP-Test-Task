<?php

$selectPosts = "SELECT nodeid AS post_node, publishdate, title, lastcontent, "
                . "(SELECT count(nodeid) FROM node WHERE parentid = post_node) AS postcount "
                . "FROM node WHERE `contenttypeid` = 22 GROUP BY nodeid";
        $quary = $db->query($selectPosts);
        $posts = $quary->fetchall(PDO::FETCH_ASSOC);
?>
<div class="topics-header">
    <h1>TOPIC LIST</h1>
</div>
<div class="topics">
    <table class="table table-striped">
        <tbody>
            <tr>
                <th>Topic</th>
                <th>Date</th>
                <th>Replies</th>
                <th>Last Reply</th>
            </tr>
            <?php
                foreach($posts as $row){
            ?>
            <tr>
                <td><h3><a href="?section=topic&id=<?php echo $row["post_node"]; ?>"><?php echo $row["title"]; ?></a></h3></td>
                <td><?php echo Date('F jS g:i:s', $row["publishdate"]); ?></td>
                <td><?php echo $row["postcount"]; ?></td>
                <td><?php echo Date('F jS g:i:s', $row["lastcontent"]); ?></td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</div>

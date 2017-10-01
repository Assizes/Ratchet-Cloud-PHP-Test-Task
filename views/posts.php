<?php global $sitePath; ?>
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
            <?php foreach($topics as $topic){ ?>
            <tr>
                <td><h3><a href="<?php echo $sitePath ?>/post/show/?id=<?php echo $topic["post_node"]; ?>"><?php echo $topic["title"]; ?></a></h3></td>
                <td><?php echo Date('F jS g:i:s', $topic["publishdate"]); ?></td>
                <td><?php echo $topic["postcount"]; ?></td>
                <td><?php echo Date('F jS g:i:s', $topic["lastcontent"]); ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
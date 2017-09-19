<?php
if(isset($_POST["topicId"])){
    include './connect.php';
    
    $topicId = $_POST["topicId"];
    $commentText = $_POST["textRaw"];
    $time = time();
    $commentTypeId = 23;
    
    try{
        $insertIntoNode = "INSERT INTO node (contenttypeid, publishdate, title, parentid, lastcontent) "
                . "VALUES(:typeId, :time, '', :parentId, :lastTime);";
        $updateNode = "UPDATE `node` SET lastcontentid = :lastNodeId "
                    . "WHERE nodeid = :nodeId;";
        $insertIntoText = "INSERT INTO `text` (nodeid, rawtext) VALUES(:nodeId, :commentText);";

        $db->begintransaction();
        
        $res = $db->prepare($insertIntoNode);
        $quary = $res->execute(array(
                                    ":typeId" => $commentTypeId,
                                    ":time" => $time,
                                    ":parentId" => $topicId,
                                    ":lastTime" => $time));
        $lastInsertedIndex = intval($db->lastInsertId());       
        $res = $db->prepare($updateNode);
        $quary = $res->execute(array(":lastNodeId" => $lastInsertedIndex,":nodeId" => $lastInsertedIndex));
        
        $res = $db->prepare($insertIntoText);
        $quary = $res->execute(array(":nodeId" => $lastInsertedIndex, ":commentText" => $commentText));
        
        $db->commit();
        
        if (!$quary){
            echo "\nPDO::errorInfo():\n";
            print_r($dbh->errorInfo());
        }else{
            echo "<div class='comment'>";
                echo "<h6>Posted on ".Date("F jS, Y, g:ia",$time)."</h6>";
                echo "<div>".$commentText."</div>";
            echo "</div>";
        }
    }catch (PDOException $e) {
            $db->rollBack();
            die($e->getMessage());
    }
}
?>
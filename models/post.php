<?php
class PostModel{

    public function __constructor(){
        
    }
        
    public static function showPost(){
        if(isset($_GET["id"])){
            
            $db = DB::getInstance();
            
            $topicId = $_GET["id"];
            $selectPostAndComments = "SELECT node.nodeid, node.title, node.publishdate, text.rawtext, users.username, node.userid, "
                . "(SELECT count(nodeid) FROM node WHERE parentid = :id) AS postcount "
                . "FROM node INNER JOIN text ON node.nodeid = text.nodeid "
                . "INNER JOIN users ON node.userid = users.id "
                . "WHERE (node.nodeid = :id AND node.contenttypeid = 22) OR node.parentid = :id "
                . "ORDER BY node.publishdate ASC";
            $params = array(":id" => $topicId);
            $res = $db->prepare($selectPostAndComments);
            $quary = $res->execute($params);
           
            return $res;
        }
    }
    
    public static function submitPost(){
        $topicId = $_POST["topicId"];
        $commentText = $_POST["textRaw"];
        $time = time();
        $commentTypeId = 23;
    
        try{
            $insertIntoNode = "INSERT INTO node (contenttypeid, publishdate, title, parentid, lastcontent, userid) "
                . "VALUES(:typeId, :time, '', :parentId, :lastTime, :userid);";
            $updateNode = "UPDATE `node` SET lastcontentid = :lastNodeId "
                    . "WHERE nodeid = :nodeId;";
            $insertIntoText = "INSERT INTO `text` (nodeid, rawtext) VALUES(:nodeId, :commentText);";

            $db = DB::getInstance();
            
            $db->begintransaction();
        
            $res = $db->prepare($insertIntoNode);
            $quary = $res->execute(array(
                                    ":typeId" => $commentTypeId,
                                    ":time" => $time,
                                    ":parentId" => $topicId,
                                    ":lastTime" => $time,
                                    ":userid" => $_SESSION["userId"]));
            $lastInsertedIndex = intval($db->lastInsertId());       
            $res = $db->prepare($updateNode);
            $quary = $res->execute(array(":lastNodeId" => $lastInsertedIndex,":nodeId" => $lastInsertedIndex));
        
            $res = $db->prepare($insertIntoText);
            $quary = $res->execute(array(":nodeId" => $lastInsertedIndex, ":commentText" => $commentText));
        
            $db->commit();
        
            if (!$quary){
                echo "\nPDO::errorInfo():\n";
                print_r($db->errorInfo());
            }else{
                echo "<div class='comment'>";
                    echo "<h6>Posted on ".Date("F jS, Y, g:ia",$time)." by: ".$_SESSION["siteUsername"]."</h6>";
                    echo "<div>".$commentText."</div>";
                    echo "<span class='editPost'>Edit</span>";
                echo "</div>";
                exit;
            }
        }catch (PDOException $e) {
            $db->rollBack();
            die($e->getMessage());
        }
    }
}
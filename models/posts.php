<?php

class PostsModel{
    public function __constructor(){
        
    }
        
    public static function getAllPosts(){
        
        $db = DB::getInstance();
        $selectPosts = "SELECT nodeid AS post_node, publishdate, title, lastcontent, "
                . "(SELECT count(nodeid) FROM node WHERE parentid = post_node) AS postcount "
                . "FROM node WHERE `contenttypeid` = 22 GROUP BY nodeid";
        $quary = $db->query($selectPosts);
        $posts = $quary->fetchall(PDO::FETCH_ASSOC);
        
        return $posts;
    }
    public static function submitTopic(){
        $postTitle = $_POST["postTitle"];
        $postText = $_POST["postTextArea"];
        $time = time();
        $typeId = 22;
        $parentId = 81;
        $db = DB::getInstance();
    
        try{
            $insertIntoNode = "INSERT INTO node (contenttypeid, publishdate, title, parentid, lastcontent, userid) "
                . "VALUES(:typeId, :time, :title, :parentId, :lastTime, :userid);";
            $updateNode = "UPDATE `node` SET lastcontentid = :lastNodeId "
                    . "WHERE nodeid = :nodeId;";
            $insertIntoText = "INSERT INTO `text` (nodeid, rawtext) VALUES(:nodeId, :postText);";

            $db->begintransaction();

            $res = $db->prepare($insertIntoNode);
            $quary = $res->execute(array(
                                    ":typeId" => $typeId,
                                    ":time" => $time,
                                    ":title" => $postTitle,
                                    ":parentId" => $parentId,
                                    ":lastTime" => $time,
                                    ":userid" => $_SESSION["userId"]));
            $lastInsertedIndex = intval($db->lastInsertId());
            $res = $db->prepare($updateNode);
            $quary = $res->execute(array(":lastNodeId" => $lastInsertedIndex,":nodeId" => $lastInsertedIndex));

            $res = $db->prepare($insertIntoText);
            $quary = $res->execute(array(":nodeId" => $lastInsertedIndex, ":postText" => $postText));

            $db->commit();

            if (!$quary){
                echo "\nPDO::errorInfo():\n";
                print_r($db->errorInfo());
            }else{
                $response["id"] = $lastInsertedIndex;
                $response["title"] = $postTitle;
                echo json_encode($response);
                exit;
            }
        }catch (PDOException $e) {
            $db->rollBack();
            die($e->getMessage());
        }
    }
}
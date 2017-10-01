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
}
<?php

class PostsController{
    public function all(){
        $topics = PostsModel::getAllPosts();
        require_once('views/posts.php');
    }
}
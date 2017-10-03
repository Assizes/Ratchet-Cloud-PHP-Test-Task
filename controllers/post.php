<?php
class PostController{
    public function show(){
        $posts = PostModel::showPost();
        require_once('views/post.php');
    }
    public function submit(){
        PostModel::submitPost();
    }
    public function edit(){
        PostModel::editPost();
    }
}
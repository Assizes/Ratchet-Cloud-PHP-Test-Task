<?php
    include './Header.html';
    include './connect.php';
    if(isset($_GET["section"])){
        include './'.$_GET["section"].'.php';
    }
    include './Footer.html';
?>
<?php
    include './Header.html';
    include './connect.php';
?>
    <div class="pageWrap">
<?php
    if(isset($_GET["section"])){
        include './'.$_GET["section"].'.php';
    }else{
        include './topics.php';
    }
?>
    </div>
<?php
    include './Footer.html';
?>

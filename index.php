<?php
    include './Header.html';
    include './connect.php';
?>
    <div class="pageWrap">
<?php
    if(isset($_GET["section"])){
        include './'.$_GET["section"].'.php';
    }
?>
    </div>
<?php
    include './Footer.html';
?>
<?php

    session_start();

    $sitePath = "http://192.168.0.12/Ratchet-Cloud-PHP-Test-Task";
    $siteName = "/Ratchet-Cloud-PHP-Test-Task/";
    
    require_once('connect.php');
    
    require_once('models/user.php');
    $user = new UserModel();
    $user->Auth();
    
    ob_start ();
    require_once('routes.php');
    $html = ob_get_clean ();
    
?>

<DOCTYPE html>
<html lang="en">
    <head>
        <title>test task</title>
        <meta charset="windows-1251">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="<?php echo $sitePath ?>/css/site.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo $sitePath ?>/js/site.js"></script>
    </head>
  <body>
    <?php require_once('navbar.php'); ?>
    <?php require_once('loginModal.php'); ?>
    <div class="pageWrap">
      <?php echo $html; ?>
    </div>
  <body>
<html>
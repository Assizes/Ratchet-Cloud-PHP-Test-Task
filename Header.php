<?php session_start(); ?>
<html>
    <head>
        <title>test task</title>
        <meta charset="windows-1251">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/site.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript" src="js/site.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                 </ul>
                <?php if(isset($_SESSION['siteUsername']) && !empty($_SESSION['siteUsername'])){ ?>
                    <span class="userName"><?php echo $_SESSION['siteUsername']; ?></span>
                    <button id="signOut" class="btn btn-outline-success my-2 my-sm-0">Sigh Out</button>
                <?php } else { ?>
                    <?php echo $_SESSION['siteUsername']; ?>
                    <button id="signIn" class="btn btn-outline-success my-2 my-sm-0">Sigh In</button>
                <?php } ?>
            </div>
        </nav>
        <div id="loginModal" class="hidden">
            <div id="loginWrap">
            <h2>Login</h2>
            <p>Please fill in your credentials to login.</p>
            <form id="loginForm" action="loginUser.php">
                <div class="">
                    <label>Username:<sup>*</sup></label>
                    <input type="text" name="username"class="form-control" value="">
                    <span class="help-block"></span>
                </div>    
                <div class="">
                    <label>Password:<sup>*</sup></label>
                    <input type="password" name="password" class="form-control">
                    <span class="help-block"></span>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Submit">
                </div>
                <p>Don't have an account? <span id="signUp" class="link">Sign up now</span>.</p>
            </form>
            </div>
            <div id="signWrap" class="hidden">
                <h2>Sign In</h2>
                <p>Please fill in your credentials to sign in.</p>
                <form id="registerForm" action="createUser.php">
                <div class="">
                    <label>Username:<sup>*</sup></label>
                    <input id="regUserName" type="text" name="username" class="form-control" value="">
                    <span class="help-block"></span>
                </div>    
                <div class="">
                    <label>Password:<sup>*</sup></label>
                    <input id="regPass" type="password" name="password" class="form-control">
                    <span class="help-block"></span>
                </div>
                <div class="">
                    <label>Password Confirmation:<sup>*</sup></label>
                    <input id="passConf" type="password" name="password" class="form-control">
                    <span class="help-block"></span>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Register">
                </div>
                <p>Already have an account? <span id="logIn" class="link">Log In</span>.</p>
                </form>
            </div>
        </div>
        <div class="overlay hidden"></div>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo $sitePath ?>">Home <span class="sr-only">(current)</span></a>
            </li>
        </ul>
        <?php if(isset($_SESSION['siteUsername']) && !empty($_SESSION['siteUsername'])){ ?>
            <span class="userName"> <?php echo $_SESSION['siteUsername']; ?></span>
            <a href="<?php echo $sitePath ?>?logOff=logOff"><button id="logOut" class="btn btn-outline-success my-2 my-sm-0">Log Out</button></a>
        <?php } else { ?>
                <span class="userName"></span>
                <button id="signIn" class="btn btn-outline-success my-2 my-sm-0">Sigh In</button>
                <a href="<?php echo $sitePath ?>?logOff=logOff"><button id="logOut" class="btn btn-outline-success my-2 my-sm-0 hidden">Log Out</button></a>
        <?php } ?>
    </div>
</nav>
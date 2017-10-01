<div id="loginModal" class="hidden">
    <div id="loginWrap">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>
        <form id="loginForm" action="">
            <div class="">
                <label>Username:<sup>*</sup></label>
                <input id="logUserName" type="text" name="username"class="form-control" value="">
                <span class="help-block"></span>
            </div>    
            <div class="">
                <label>Password:<sup>*</sup></label>
                <input id="logPass" type="password" name="password" class="form-control">
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
        <form id="registerForm" action="">
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
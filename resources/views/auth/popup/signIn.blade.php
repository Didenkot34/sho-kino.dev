<div id="signinbox" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title">Sign In</div>
            <div id="forgot-password"><a href="#">Forgot password?</a>
            </div>
        </div>

        <div class="panel-body">

            <div id="signin-alert" class="alert alert-danger col-sm-12"></div>

            <form id="loginform" class="form-horizontal" role="form">

                <div class="input-group margin-bottom-25px">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input id="login-username" type="text" class="form-control" name="username" value=""
                           placeholder="username or email">
                </div>

                <div class="input-group margin-bottom-25px">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input id="login-password" type="password" class="form-control" name="password"
                           placeholder="password">
                </div>

                <div class="input-group">
                    <div class="checkbox">
                        <label>
                            <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
                        </label>
                    </div>
                </div>

                <div class="form-group margin-top-10px">
                    <!-- Button -->
                    <div class="col-sm-12 controls">
                        <a id="btn-login" href="#" class="btn btn-success">Login </a>
                        <a id="btn-fblogin" href="#" class="btn btn-primary">Login with Facebook</a>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12 control">
                        <div>
                            Don't have an account!
                            <a id="signuplink" href="#">
                                Sign Up Here
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
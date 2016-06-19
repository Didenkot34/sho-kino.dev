<div id="signupbox"
     class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title">Sign Up</div>
            <div>
                <a id="signinlink" href="#">Sign In</a>
            </div>
        </div>
        <div class="panel-body">
            <form id="signupform" class="form-horizontal" action="/signUp" role="form" method="post">
                {!! csrf_field() !!}
                <div id="error-signup" class="alert alert-danger hidden"></div>
                <div id="error-email-signup" class="alert alert-danger hidden"> </div>
                <div id="error-password-signup" class="alert alert-danger hidden"> </div>
                <div id="error-name-signup" class="alert alert-danger  hidden"> </div>
                <div id="success-signup" class="alert alert-success  hidden"> </div>

                <div class="form-group">
                    <label for="email" class="col-md-3 control-label">Email</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="email" placeholder="Email Address">
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" class="col-md-3 control-label">Name</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="name" placeholder="Name">
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="col-md-3 control-label">Password</label>
                    <div class="col-md-9">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                </div>

                <div class="form-group">
                    <label for="confirm_password" class="col-md-3 control-label">Confirm Password</label>
                    <div class="col-md-9">
                        <input type="password" class="form-control" name="password_confirmation" placeholder="">
                    </div>
                </div>

                <div class="form-group">
                    <!-- Button -->
                    <div class="col-md-offset-3 col-md-9">
                        <button id="btn-signup" type="submit" class="btn btn-info"><i class="icon-hand-right"></i> &nbsp
                            Sign Up
                        </button>
                        <span class="margin-left-8px"> </span>
                        <button type="button" class="btn btn-default" data-dismiss="modal"> Close</button>
                    </div>
                </div>

                <div id="social-sign-up-box" class="form-group">
                    <div class="col-md-offset-3 col-md-9">
                        <button id="btn-fbsignup" type="button" class="btn btn-primary"><i
                                    class="fa fa-facebook-official"></i>  
                            Sign Up with Facebook
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

    
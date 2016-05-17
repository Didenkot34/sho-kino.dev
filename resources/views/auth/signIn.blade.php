<button data-toggle="modal" data-target="#signIn" class="button btn btn-info">Оставить комментарий</button>

<!-- Modal -->
<div id="signIn" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <form id="form-signIn" class="form-horizontal" role="form" method="POST" action="{{ url('/signIn') }}">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text-center">Sign In </h4>
                </div>
                <div class="modal-body">
                    {!! csrf_field() !!}
                    <span class="help-block">
                                    <strong id="error-signIn"> </strong>
                                </span>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">E-Mail Address</label>

                        <div class="col-md-6">
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                <span class="help-block">
                                    <strong id="error-email"> </strong>
                                </span>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Password</label>

                        <div class="col-md-6">
                            <input type="password" class="form-control" name="password">
                                <span class="help-block">
                                    <strong id="error-password"> </strong>
                                </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember"> Remember Me
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info"><i class="fa fa-btn fa-user"></i> Войти</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>

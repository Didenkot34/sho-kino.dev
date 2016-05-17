<button data-toggle="modal" data-target="#signUp" class="button btn btn-info">Оставить комментарий</button>

<!-- Modal -->
<div id="signUp" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <form id="form-signUp" class="form-horizontal" role="form" method="POST" action="{{ url('/signUp') }}">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text-center">Sign Up </h4>
                    <span class="help-block">
                        <strong id="error-signUp"> </strong>
                    </span>
                </div>
                <div class="modal-body">
                    {!! csrf_field() !!}
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Name</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                            <span class="help-block">
                        <strong id="error-name"> </strong>
                    </span>
                        </div>
                    </div>

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

                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Confirm Password</label>

                        <div class="col-md-6">
                            <input type="password" class="form-control" name="password_confirmation">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info"><i class="fa fa-btn fa-user"></i> Зарегестрироваться
                        </button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

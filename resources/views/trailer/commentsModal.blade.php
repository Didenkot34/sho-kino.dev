<button data-toggle="modal" data-target="#comment" class="button btn btn-info">Оставить комментарий</button>

<!-- Modal -->
<div id="comment" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">
        <!-- Modal content-->
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/add-comment') }}">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text-center">Оставить комментарий </h4>
                </div>
                <div class="modal-body">
                    {!! csrf_field() !!}

                    {{--<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">--}}
                    @if (Auth::guest())
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Имя">

                        @if ($errors->has('name'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                        @endif
                        <br>
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                               placeholder="E-mail">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                        <br>
                    @endif
                    <textarea class="form-control textarea" name="comment" cols="30" rows="10"
                              placeholder="Введите Ваш комменарий"></textarea>

                    @if ($errors->has('comment'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('comment') }}</strong>
                                    </span>
                    @endif
                    {{--</div>--}}

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info"><i class="fa fa-btn fa-user"></i> Оставить отзыв</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>
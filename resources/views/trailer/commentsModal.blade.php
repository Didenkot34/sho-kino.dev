<button data-toggle="modal" data-target="#comment" class="button btn btn-info">Оставить комментарий</button>

<!-- Modal -->
<div id="comment" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">
        <!-- Modal content-->
        <form id="form-comment" class="form-horizontal" role="form" method="POST" action="{{ url('/add-comment') }}">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text-center">Оставить комментарий </h4>
                </div>
                <div class="modal-body">
                    <div class="alert alert-success">
                        <strong>{{ Auth::user()->name }}</strong>, Ваш отзыв успешно отправлен и будет опубликован в
                        ближайшее время!
                    </div>
                    {!! csrf_field() !!}

                    {{--<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">--}}
                    {{--@if (Auth::guest())--}}
                    <input type="text" class="form-control" name="user_id" value="{{ Auth::user()->id }}"
                           placeholder="Имя">

                    @if ($errors->has('name'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                    <br>
                    <input type="text" class="form-control" name="trailer_id" value="{{ $trailerId }}"
                           placeholder="Имя">
                    <br>
                    {{--@endif--}}
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
                    <button id="reset" type="button" class="btn btn-info hidden"><i class="fa fa-btn fa-user"></i> Еще
                        оставить отзыв
                    </button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="col-md-4">
    <img class="img img-responsive img-thumbnail trailer-img-max-height"
         src="/uploads/trailers/poster/{!! $trailer->poster !!}"
         data-toggle="modal" data-target="#trailer_id{{$trailer->id}}">
    <table class="table table-responsive table-no-border">
        <tr>
            <td><h4>Рейтинг : </h4></td>
            <td>
                <h4> {{$trailer->rating_kinopoisk}}
                    <small> КиноПоиск</small>
                </h4>
            </td>
            <td>
                <h4> {{$trailer->rating_iMDb}}
                    <small> IMDb</small>
                </h4>
            </td>
        </tr>
    </table>
    <table class="table table-responsive table-no-border">
        <tr>
            <td><h4>Год: </h4></td>
            <td>
                <h4>
                    <a href="{{route('filters', ['genre_all', 'year_' . $trailer->year,'country_all'])}}"
                       class="premiere text-capitalize"> {{$trailer->year}}</a>
                </h4>
            </td>
        </tr>
        <tr>
            <td><h4>Страна: </h4></td>
            <td>
                <h4>
                    <?php $count = count($trailer->countries()->get())?>
                    @foreach($trailer->countries()->get() as $countries )
                        <?php $count-- ?>
                        <a href="{{route('filters', ['genre_all','year_all','country_'.$countries->slug])}}"
                           class="premiere text-capitalize">{{$countries->name}}</a>@if($count)
                            , @endif
                    @endforeach
                </h4>
            </td>
        </tr>
        <tr>
            <td><h4>Жанр: </h4></td>
            <td>
                <h4>
                    <?php $count = count($trailer->genres()->get())?>
                    @foreach($trailer->genres()->get() as $genres )
                        <?php $count-- ?>
                        <a href="{{route('filters', ['genre_'.$genres->slug,'year_all','country_all'])}}"
                           class="premiere text-capitalize">{{$genres->name}}</a>@if($count)
                            , @endif
                    @endforeach
                </h4>
            </td>
        </tr>
        <tr>
            <td><h4>Возраст: </h4></td>
            <td>
                <h4>
                    {{$trailer->age_limit}}
                </h4>
            </td>
        </tr>
    </table>
</div>
<div class="col-md-8">
    <div class="row">
        <div class="col-md-12 container-padding">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="{{$trailer->video_link}}"
                        allowfullscreen></iframe>
            </div>
        </div>
        <div class="col-mb-12">
            <h3>Сюжет</h3>
        </div>
        <div class="col-mb-12">
            {!!$trailer->description!!}
        </div>
        <div class="col-md-12">
            <ul class="nav nav-tabs" id="trailer-description">
                <li class="active"><a data-target="#actors" data-toggle="tab">В главных ролях</a></li>
                <li><a data-target="#comments" data-toggle="tab">Отзывы</a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="actors">
                    <div class="container-fluid">
                        <div class="row">
                            @foreach($trailer->actors()->get() as $actor)
                                <div class="col-xs-3 ">
                                    <table class="table">
                                        <tr>
                                            <td>
                                                <a href="/actor/{{$actor->slug}}">
                                                    <img class="img img-circle img-responsive"
                                                         src="/uploads/actors/avatarks/medium/{{$actor->avatarka}}"/>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="/actor/{{$actor->slug}}">
                                                    <h4 class="text-center">{{$actor->name}}</h4>
                                                </a>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="comments">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="span4 well" style="padding-bottom:0">
                                    <form accept-charset="UTF-8" action="" method="POST" class="form-group">
                <textarea class="span4" id="new_message" name="new_message" style="width: 99%"
                          placeholder="Type in your message" rows="5"></textarea>
                                        <h6 class="pull-right">320 characters remaining</h6>
                                        <button class="btn btn-info" data-toggle="modal" data-target="#signUp" type="button">Post New Message</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                {{--@include('trailer.commentsModal', ['trailerId' => $trailer->id])--}}
                                @include('auth.popup.authorization')
                                @foreach($comments as $comment)
                                    <blockquote>
                                        {!! $comment->comment !!}
                                    </blockquote>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
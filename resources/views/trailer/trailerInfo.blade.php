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
            <div class="card-tabs">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#actors" aria-controls="actors" role="tab"
                                                              data-toggle="tab">В главных ролях</a></li>
                    <li role="presentation"><a href="#comments" aria-controls="comments" role="tab" data-toggle="tab">Комментарии</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="actors">
                       @include('trailer.actors', ['actors' => $trailer->actors()->get()])
                    </div>
                    <div class="tab-pane" id="comments">
                        @include('trailer.comments' , ['comments' => $comments, 'trailerId' => $trailer->id])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
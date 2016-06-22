@foreach($trailers as $trailer)
    <div class="col-md-2">
        <div class="panel panel-default">
            <div class="panel-body">
                <a href="/view/{{$trailer->slug}}">
                    <img class="img img-responsive img-thumbnail"
                         src="/uploads/trailers/poster/{!! $trailer->poster !!}"
                         data-toggle="modal" data-target="#trailer_id{{$trailer->id}}">
                </a>
            </div>
            <div class="panel-footer">{!!$trailer->title!!}</div>
        </div>
        {{--<a href="/view/{{$trailer->slug}}">--}}
            {{--<img class="img img-responsive img-thumbnail"--}}
                 {{--src="/uploads/trailers/poster/{!! $trailer->poster !!}"--}}
                 {{--data-toggle="modal" data-target="#trailer_id{{$trailer->id}}">--}}
        {{--</a>--}}

        {{--<p>{!!$trailer->title!!}</p>--}}
    </div>
@endforeach

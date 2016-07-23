{{--@foreach($editorsChoice as $trailer)--}}
    <div class="col-md-2">
        <a href="/view/{{$trailer->slug}}">
            <img class="img img-responsive img-thumbnail"
                 src="/uploads/trailers/poster/{!! $trailer->poster !!}"
                 data-toggle="modal" data-target="#trailer_id{{$trailer->id}}
                    ">
        </a>

        <p>{!!$trailer->title!!}</p>
    </div>
{{--@endforeach--}}

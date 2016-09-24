<div class="row">
    @foreach($trailers as $trailer)
        <div class="
        @if(count($trailers) === 1)col-md-12
        @elseif(count($trailers) === 2) col-md-6
        @elseif(count($trailers) > 2) col-md-4
        @endif  portfolio-item
        ">
            <div class="box-shadow-jumbotron">
                <h3>
                    <p data-toggle="modal"
                       data-target="#trailer_id{{$trailer->id}}">{!!$trailer->title!!}</p>
                </h3>
                <img class="img img-responsive img-thumbnail"
                     src="/uploads/trailers/originals/carousel/{!! $trailer->carousel_image !!}"
                     data-toggle="modal" data-target="#trailer_id{{$trailer->id}}">
            </div>
        </div>
    @endforeach
</div>
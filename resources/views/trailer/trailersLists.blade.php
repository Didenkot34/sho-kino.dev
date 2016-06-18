<div class="row">
    @foreach($trailers as $trailer)
        <div class="col-md-4 portfolio-item">
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
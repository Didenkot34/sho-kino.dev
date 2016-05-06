<div class="fade-slider">
    @foreach($trailers as $trailer)
        <div>
            <a href="{{url('view/' . $trailer->slug)}}">
                <img class="img img-responsive "
                     src="/uploads/trailers/originals/carousel/{!! $trailer->carousel_image !!}">
            </a>
        </div>
    @endforeach
</div>
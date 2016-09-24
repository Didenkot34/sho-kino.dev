<div class="col-md-3">

    <div class="box-shadow-jumbotron ribbon-container">
        <div class="card hovercard ">
            <a href="/actor/{{$actor->slug}}">
                <img class="cardheader" src="/uploads/actors/avatarks/originals/{!! $actor->avatarka !!}"/>

            </a>
            <div class="avatar">
                <a href="/actor/{{$actor->slug}}">
                    <img alt="" src="/uploads/actors/avatarks/originals/{!! $actor->avatarka !!}">
                </a>
            </div>
            <div class="info">
            </div>
        </div>
        <a href="/actor/{{$actor->slug}}">
            <span class="ribbon">{!! $actor->name !!}</span>
        </a>
    </div>
</div>

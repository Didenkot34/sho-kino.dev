<!-- Trailers with this actors-->
<!-- Page Header -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="premiere">
            @if($actorSex == 'м'){!!Lang::get('actor.trailers',['sex' =>'','actorName' => $actorName]) !!} @else
                {!! Lang::get('actor.trailers',['sex' =>'а','actorName' => $actorName]) !!}  @endif
        </h1>
    </div>
</div>
<!-- /.row -->

<!-- Projects Row -->
@include('trailer.trailersLists', ['trailers' => $trailers])

<!-- Trailers with this actors-->
@include('trailer.trailersListsModal', ['trailers' => $trailers])

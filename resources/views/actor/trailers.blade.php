<!-- Trailers with this actors-->
<!-- Page Header -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="premiere">Трейлеры с его участием
            <small>Secondary Text</small>
        </h1>
    </div>
</div>
<!-- /.row -->

<!-- Projects Row -->
@include('trailer.trailersLists', ['trailers' => $trailers])

<!-- Trailers with this actors-->
@include('trailer.trailersListsModal', ['trailers' => $trailers])

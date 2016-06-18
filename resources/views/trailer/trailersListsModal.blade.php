@foreach($trailers as $trailer)
    <!-- Modal -->
    <div id="trailer_id{{$trailer->id}}" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text-center">{!! $trailer->title !!}</h4>
                </div>
                <div class="modal-body">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="{{$trailer->video_link}}" allowfullscreen
                                draggable="true"></iframe>
                    </div>
                    <p>{!!$trailer->description!!}</p>
                </div>
                <div class="modal-footer">
                    <a href="{{url('/view/' . $trailer->slug)}}">
                        <button type="button" class="btn btn-info">На страницу трейлера</button>
                    </a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
@endforeach
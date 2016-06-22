@foreach($trailers as $trailer)
    <div class="col-md-2">
        {{--<div class="panel panel-default">--}}
            {{--<div class="panel-body">--}}
                {{--<a href="/view/{{$trailer->slug}}">--}}
                    {{--<img class="img img-responsive img-thumbnail"--}}
                         {{--src="/uploads/trailers/poster/{!! $trailer->poster !!}"--}}
                         {{--data-toggle="modal" data-target="#trailer_id{{$trailer->id}}">--}}
                {{--</a>--}}
            {{--</div>--}}
            {{--<div class="panel-footer">{!!$trailer->title!!}</div>--}}
        {{--</div>--}}
        <div class="thumbnail col-md-12">
            <div class="caption col-md-12">
                <div>
                    {{--<h4 class="text-nowrap">{!!$trailer->title!!}</h4>--}}
                    <a  class="btn btn-info" href="/view/{{$trailer->slug}}" class="label label-danger" rel="tooltip" title="{!!$trailer->title!!}">
                            <i class="fa fa-chevron-circle-right fa-2x "></i>
                        </a>
                </div>
            </div>
            <img class="img img-responsive img-thumbnail"
                 src="/uploads/trailers/poster/{!! $trailer->poster !!}"
                 data-toggle="modal" data-target="#trailer_id{{$trailer->id}}">
        </div>
        {{--<a href="/view/{{$trailer->slug}}" rel="tooltip" title="{!!$trailer->title!!}" data-placement="bottom">--}}
            {{--<img class="img img-responsive img-thumbnail"--}}
                 {{--src="/uploads/trailers/poster/{!! $trailer->poster !!}"--}}
                 {{--data-toggle="modal" data-target="#trailer_id{{$trailer->id}}">--}}
        {{--</a>--}}

        {{--<div style="margin-top: 30%"></div>--}}
    </div>
@endforeach

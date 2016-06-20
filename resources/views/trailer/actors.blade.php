<!-- Tab panes -->
<div class="container-fluid">
    <div class="row">
        @foreach($actors as $actor)
            <div class="col-xs-3 ">
                <table class="table">
                    <tr>
                        <td>
                            <a href="/actor/{{$actor->slug}}">
                                <img class="img img-circle img-responsive"
                                     src="/uploads/actors/avatarks/medium/{{$actor->avatarka}}"/>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="/actor/{{$actor->slug}}">
                                <h4 class="text-center">{{$actor->name}}</h4>
                            </a>
                        </td>
                    </tr>
                </table>
            </div>
        @endforeach
    </div>
</div>


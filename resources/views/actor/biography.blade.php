<!-- Biography-->

<div class="row">
    <div class="col-md-12">
        <div class="col-md-4">
            <img class="img img-responsive img-thumbnail trailer-img-max-height"
                 src="/uploads/actors/avatarks/originals/{!! $actor->avatarka !!}">
        </div>
        <div class="col-md-8">
            <table class="table table-responsive table-no-border">
                <tr>
                    <td><h4>{{Lang::get('actor.birthday')}} : </h4></td>
                    <td>
                        <h4 class="premiere"> {{$actor->birthday}}
                        </h4>
                    </td>
                </tr>
                <tr>
                    <td><h4>{{Lang::get('actor.age')}}: </h4></td>
                    <td>
                        <h4 class="premiere">
                            {{date('Y-m-d') - $actor->birthday }}
                        </h4>
                    </td>
                </tr>
                <tr>
                    <td><h4>{{Lang::get('actor.zodiacTitle')}}: </h4></td>
                    <td>
                        {{--<h4>--}}
                        {{--<a href="#" class="premiere text-capitalize"> </a>--}}
                        {{--</h4>--}}
                        <h4 class="premiere">
                            {{$zodiac}}
                        </h4>
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="col-mb-12">
                    <h3 class="premiere text-center ">{{Lang::get('actor.biography')}}</h3>
                </div>
                <div class="col-mb-12">
                    {!!$actor->biography!!}
                </div>
            </div>
        </div>
    </div>
</div>
<!--END Biography-->


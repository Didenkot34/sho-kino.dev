<div id="search">
    <button type="button" class="close">×</button>
    <form role="form" method="POST" action="{{ url('/search') }}">
        {!! csrf_field() !!}
        <input type="search" name="search" placeholder="Поиск" />
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
</div>
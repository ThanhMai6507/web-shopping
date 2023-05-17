<form class="form-inline">
    {{$slot}}
    <input class="form-control mr-sm-2 input-search" type="text" placeholder="Search" name='search' value="{{ request()->search }}">
    <button class="btn btn-success button-search" type="submit">Search</button>
</form>


<form class="form-inline" style="margin-left: 20%; margin-top: 10px; gap:5px">
    {{$slot}}
    <input class="form-control mr-sm-2" type="text" placeholder="Search" name='search' value="{{ request()->search }}">
    <button class="btn btn-success" type="submit">Search</button>
</form>


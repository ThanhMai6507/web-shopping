<div class="top-nav-search">
    <form style="display: flex; gap:30px;">
        {{$slot}}
        <input style="width: 10%" type="text" class="form-control" placeholder="Search here" name='search' value="{{ request()->search }}">
    </form>
</div>

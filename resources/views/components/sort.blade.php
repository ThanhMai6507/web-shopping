@if (!empty(request()->search))

    @if (request()->sort_type == null)
        <a href="?sort_name={{ $sortName }}&sort_type=asc&search={{request()->search}}"><i class="fa-solid fa-sort"></a>
    @elseif(request()->sort_type == 'asc')
        <a href="?sort_name={{ $sortName }}&sort_type=desc&search={{request()->search}}"><i class="fa-solid fa-sort-up"></a>
    @else
        <a href="?sort_name={{ $sortName }}&sort_type=asc&search={{request()->search}}"><i class="fa-solid fa-sort-down"></a>
    @endif

    @else
    @if (request()->sort_type == null)
        <a href="?sort_name={{ $sortName }}&sort_type=asc"><i class="fa-solid fa-sort"></a>
    @elseif(request()->sort_type == 'asc')
        <a href="?sort_name={{ $sortName }}&sort_type=desc"><i class="fa-solid fa-sort-up"></a>
    @else
        <a href="?sort_name={{ $sortName }}&sort_type=asc"><i class="fa-solid fa-sort-down"></a>
    @endif

@endif

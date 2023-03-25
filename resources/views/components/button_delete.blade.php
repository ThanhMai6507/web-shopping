<form class="delete" action="{{ $route }}" method="post">
    @csrf
    @method('DELETE')
    <input class="btn btn-primary" type="submit" name="button_delete" value="Delete" onclick="return confirm('Are you sure to delete this item?')">
</form>
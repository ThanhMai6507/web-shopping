<form class="delete" action="{{ $route }}" method="post">
    @csrf
    @method('DELETE')
    <input class="btn btn-primary" type="submit" style="background: #E0F6F6;border:none;color:#1DB9AA" name="button_delete" value="Xóa" onclick="return confirm('Are you sure to delete this item?')">
</form>
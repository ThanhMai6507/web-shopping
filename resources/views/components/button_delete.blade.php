<form class="delete" action="{{ $route }}" method="post">
    @csrf
    @method('DELETE')
    <a href="{{ route('users.show', ['user' => $user->id]) }}" style="background: #F0D5DA;"
        class="btn btn-sm bg-success-light me-2" name="button_delete" value="Delete" onclick="return confirm('Are you sure to delete this item?')">
        <i data-feather="trash-2" width="16" color="#E63C3C"></i>
    </a>
</form>
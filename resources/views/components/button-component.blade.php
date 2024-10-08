<form action="{{$href}}" id="deleteForm-{{$id}}"method="post" class="d-inline">
    @csrf
    @method('DELETE')
    <button class="btn btn-sm btn-danger" onClick="confirmDelete({{$id}})">
        <i class="fe fe-trash-2 fa-2x"></i>
    </button>

</form>
<div class="d-flex gap-2">
    <a type="button" class="btn btn-success" href="{{ route('submission.show', $data->uuid) }}"><i
            class="bi bi-eye"></i></a>
    {{-- @can('director')
        <a type="button" class="btn btn-info" href="{{ route('user.create', $data->nip) }}"><i class="bi bi-pen"></i></a>
        <button type="button" class="btn btn-danger"><i class="bi bi-trash"></i></button>
    @endcan --}}

</div>

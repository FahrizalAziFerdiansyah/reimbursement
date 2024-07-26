<div class="d-flex gap-2">
    <a type="button" class="btn btn-success" href="{{ route('user.show', $data->nip) }}"><i class="bi bi-eye"></i></a>
    @can('director')
        <a type="button" class="btn btn-info" href="{{ route('user.create', $data->nip) }}"><i class="bi bi-pen"></i></a>
        @if (auth()->user()->id !== $data->id)
            <a type="button" class="btn btn-danger" href="{{ route('user.delete', $data->nip) }}"><i
                    class="bi bi-trash"></i></a>
        @endif
    @endcan

</div>

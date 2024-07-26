<form class="needs-validation" novalidate method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
    @csrf
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row mb-3 has-validation">
        <label for="inputText" class="col-sm-2 col-form-label">NIP</label>
        <div class="col-sm-10">
            <input hidden name="id" value="{{ $user?->id }}">
            <input type="number" name="nip" class="form-control" value="{{ $user?->nip }}" required>
            <div class="invalid-feedback">Masukkan NIP user.</div>

        </div>
    </div>
    <div class="row mb-3 has-validation">
        <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
            <input type="text" value="{{ $user?->name }}" name="name" class="form-control" required>
            <div class="invalid-feedback">Masukkan nama user.</div>
        </div>
    </div>
    <div class="row mb-3 has-validation">
        <label for="inputText" class="col-sm-2 col-form-label">Jabatan</label>
        <div class="col-sm-10">
            <select class="form-control" name="position" required>
                <option value="">-- Pilih Posisi --</option>
                @foreach ($positions as $item)
                    <option {{ $user?->position == $item ? 'selected' : '' }} value="{{ $item }}">
                        {{ $item }}</option>
                @endforeach
            </select>
            <div class="invalid-feedback">Masukkan posisi user.</div>

        </div>
    </div>
    <div class="row mb-3 has-validation">
        <label for="inputText" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
            <input type="password" name="password" class="form-control" required>
            <div class="invalid-feedback">Masukkan password user.</div>
        </div>
    </div>
    <div class="row mb-3 has-validation">
        <label for="inputText" class="col-sm-2 col-form-label">Konfirm Password</label>
        <div class="col-sm-10">
            <input type="password" name="password_confirmation" class="form-control" required>
            <div class="invalid-feedback">Masukkan konfirmasi password user.</div>
        </div>
    </div>
    <div class="d-flex justify-content-end mt-5">
        <button class="btn btn-success"> Submit</button>
    </div>

</form>

<form class="needs-validation" novalidate method="POST" action="{{ route('submission.store') }}"
    enctype="multipart/form-data">
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
        <label for="inputText" class="col-sm-2 col-form-label">Nama Pengajuan</label>
        <div class="col-sm-10">
            <input type="text" name="name" class="form-control" required>
            <div class="invalid-feedback">Masukkan nama pengajuan.</div>

        </div>
    </div>
    <div class="row mb-3 has-validation">
        <label for="inputEmail" class="col-sm-2 col-form-label">Deskripsi</label>
        <div class="col-sm-10">
            <textarea class="form-control" name="description" required></textarea>
            <div class="invalid-feedback">Masukkan deskripsi pengajuan.</div>
        </div>
    </div>
    <div class="row mb-3 has-validation">
        <label for="inputNumber" class="col-sm-2 col-form-label">File Upload</label>
        <div class="col-sm-10">
            <input class="form-control" type="file" name="file" id="formFile" required>
            <div class="invalid-feedback">Masukkan file pengajuan.</div>
        </div>
    </div>
    <div class="row mb-3 has-validation">
        <label for="inputDate" class="col-sm-2 col-form-label">Date</label>
        <div class="col-sm-10">
            <input value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" name="date" type="date"
                class="form-control" required>
            <div class="invalid-feedback">Masukkan data pengajuan.</div>
        </div>
    </div>
    <div class="d-flex justify-content-end mt-5">
        <button class="btn btn-success"> Submit</button>
    </div>

</form>

@extends('layouts.base')
@section('content')
    <div class="pagetitle">
        <h1>Pengajuan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">User</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="card">
            <div class="card-body" id="profile-overview">
                <h5 class="card-title">User Details</h5>

                <div class="row">
                    <div class="col-lg-3 col-md-4 label fw-bold mb-1 ">NIP</div>
                    <div class="col-lg-9 col-md-8">{{ $submission?->user?->nip }}</div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-md-4 label fw-bold mb-1">Nama</div>
                    <div class="col-lg-9 col-md-8">{{ $submission?->user?->name }}</div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-md-4 label fw-bold mb-1">Posisi</div>
                    <div class="col-lg-9 col-md-8">{{ $submission?->user?->position }}</div>
                </div>
                <hr />
                <h5 class="card-title">Pengajuan Details</h5>
                <div class="row">
                    <div class="col-lg-3 col-md-4 label fw-bold mb-1 ">Tanggal</div>
                    <div class="col-lg-9 col-md-8">{{ $submission?->date }}</div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-4 label fw-bold mb-1 ">Title</div>
                    <div class="col-lg-9 col-md-8">{{ $submission?->name }}</div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-md-4 label fw-bold mb-1">Deskripsi</div>
                    <div class="col-lg-9 col-md-8">{{ $submission?->decsription ?? '-' }}</div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-md-4 label fw-bold mb-1">Status</div>
                    <div class="col-lg-9 col-md-8">{!! $submission?->labelStatus !!}</div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-4 label fw-bold mb-1">Image</div>
                    <div class="col-lg-9 col-md-8">
                        <img style="width: 30%" src="{{ asset($submission?->file) }}" />
                    </div>
                </div>
            </div>
            @canany(['director', 'finance'])
                <div class="card-footer">
                    @if ($submission?->status == 1)
                        <div class="d-flex gap-2">
                            <button class="btn btn-danger btn-update" data-uuid="{{ $submission?->uuid }}"
                                data-status="0">Tolak</button>
                            @can('director')
                                <button class="btn btn-success btn-update" data-uuid="{{ $submission?->uuid }}"
                                    data-status="2">Setujui</button>
                            @endcan
                        </div>
                    @elseif ($submission?->status == 2)
                        @can('finance')
                            <button class="btn btn-success btn-update" data-uuid="{{ $submission?->uuid }}"
                                data-status="3">Dibayar</button>
                        @endcan
                    @endif
                </div>
            @endcanany
        </div>
    </section>
@endsection

@push('js')
    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
        $('.btn-update').click(function() {
            let status = $(this).data('status');
            let uuid = $(this).data('uuid');
            $.post("{{ route('submission.update_status') }}", {
                    'status': status,
                    'uuid': uuid,
                },
                function(data, status) {
                    let {
                        message
                    } = data;
                    swal("success", `${message}`);

                    setTimeout(() => {
                        console.log('here');
                        window.location.reload();
                    }, 1000);
                }, "json");
        })
    </script>
@endpush

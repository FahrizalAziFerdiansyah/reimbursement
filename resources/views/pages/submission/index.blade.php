@extends('layouts.base')
@section('content')
    <div class="pagetitle">
        <h1>Pengajuan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Pengajuan</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h5 class="card-title">Data Pengajuan</h5>
                                <p>Beberapa data pengajuan dari beberapa staf</p>
                            </div>
                            @can('employee')
                                <div class="d-flex align-items-center">
                                    <a type="button" href="{{ route('submission.create') }}" class="btn btn-success"><i
                                            class="bi bi-plus"></i>Pengajuan</a>
                                </div>
                            @endcan
                        </div>
                        <!-- Table with stripped rows -->
                        @include('pages.submission.partials.table')
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

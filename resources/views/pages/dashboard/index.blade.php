@extends('layouts.base')
@section('content')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="col-xxl-4 col-xl-12">

            <div class="card info-card customers-card">

                <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start">
                            <h6>Filter</h6>
                        </li>

                        <li><a class="dropdown-item" href="{{ route('submission.index') }}">Lihat</a></li>
                    </ul>
                </div>

                <div class="card-body">
                    <h5 class="card-title">Pengajuan <span>| Pending</span></h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-box"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{ $submission }}</h6>
                            <span class="text-muted small pt-2 ps-1">Pengajuan</span>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>
@endsection

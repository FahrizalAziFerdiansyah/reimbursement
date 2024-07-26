@extends('layouts.base')
@section('content')
    <div class="pagetitle">
        <h1>Submission</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Pengajuan</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Create Submission</h5>
                <!-- General Form Elements -->
                @include('pages.submission.partials.form')

            </div>
        </div>
    </section>
@endsection

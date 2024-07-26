@extends('layouts.base')
@section('content')
    <div class="pagetitle">
        <h1>User</h1>
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
                <h5 class="card-title">Profile Details</h5>

                <div class="row">
                    <div class="col-lg-3 col-md-4 label ">NIP</div>
                    <div class="col-lg-9 col-md-8">{{ $user->nip }}</div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-md-4 label">Nama</div>
                    <div class="col-lg-9 col-md-8">{{ $user->name }}</div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-md-4 label">Posisi</div>
                    <div class="col-lg-9 col-md-8">{{ $user->position }}</div>
                </div>


            </div>
        </div>
    </section>
@endsection

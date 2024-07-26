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
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h5 class="card-title">Data User</h5>
                                <p>Beberapa data user</p>
                            </div>
                            <div class="d-flex align-items-center">
                                <a type="button" href="{{ route('user.create') }}" class="btn btn-success"><i
                                        class="bi bi-plus"></i>User</a>
                            </div>
                        </div>
                        <!-- Table with stripped rows -->
                        @include('pages.user.partials.table')
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

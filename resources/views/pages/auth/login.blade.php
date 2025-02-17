<!DOCTYPE html>
<html lang="en">

@include('components.head')

<body>
    <!-- End Sidebar-->

    <div class="container">

        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                        <div class="d-flex justify-content-center py-4">
                            <a href="index.html" class="logo d-flex align-items-center w-auto">
                                <img src="assets/img/logo.png" alt="">
                                <span class="d-none d-lg-block">Kasir Pintar</span>
                            </a>
                        </div><!-- End Logo -->

                        <div class="card mb-3">

                            <div class="card-body">

                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                                    <p class="text-center small">Enter your username & password to login</p>
                                </div>
                                @error('nip')
                                    <div class="alert alert-danger">
                                        <p class="small m-0">{{ $message }}</p>
                                    </div>
                                @enderror
                                @include('pages.auth.partials.form')

                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </section>

    </div>

    <!-- Vendor JS Files -->
    @include('components.script')


</body>

</html>

<!DOCTYPE html>
<html lang="en">

@include('components.head')

<body>

    <!-- ======= Header ======= -->
    @include('components.header')
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    @include('components.navigation')
    <!-- End Sidebar-->

    <main id="main" class="main">
        @if (Session::has('message'))
            <div class="alert alert-dismissable {{ Session::get('alert-class', 'alert-info') }}">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                @if (Session::get('alert-class') == 'alert-success')
                    <span class="fa fa-check" aria-hidden="true"></span>
                @else
                    <span class="fa fa-exclamation-triangle" aria-hidden="true"></span>
                @endif
                {!! Session::get('message') !!}
            </div>
        @endif
        @yield('content')

    </main><!-- End #main -->

    <!-- Vendor JS Files -->
    @include('components.script')


</body>

</html>

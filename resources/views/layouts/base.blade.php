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
        @yield('content')

    </main><!-- End #main -->

    <!-- Vendor JS Files -->
    @include('components.script')


</body>

</html>

<script src={{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}></script>
<script src="{{ asset('vendor/jquery/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/datatables.min.js') }}"></script>
<script src={{ asset('vendor/quill/quill.js') }}></script>
<script src={{ asset('vendor/simple-datatables/simple-datatables.js') }}></script>
<script src={{ asset('vendor/tinymce/tinymce.min.js') }}></script>
<script src={{ asset('vendor/php-email-form/validate.js') }}></script>
<script src="{{ asset('vendor/sweetalert2/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('js/alert.js') }}"></script>

<!-- Template Main JS File -->
<script src={{ asset('js/main.js') }}></script>
@stack('js')
@yield('js')

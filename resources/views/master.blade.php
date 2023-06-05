<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                @include('partials.topnav')
            </nav>
            <div class="main-sidebar">
                @include('partials.sidebar')
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <div class="lds-ring">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                @yield('content')
            </div>
            <footer class="main-footer">
                @include('partials.footer')
            </footer>
        </div>
    </div>

    <script>
        $('.lds-ring').hide();
    </script>

    <!-- General JS Scripts -->
    <script src="{{ asset('admin/js/app.js') }}?{{ uniqid() }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

    <script src="{{ asset('admin/assets/js/stisla.js')}}"></script>
    <script src="{{ asset('admin/assets/js/scripts.js')}}"></script>

    <!-- JS Libraies -->
    <script src="{{ asset('admin/assets/modules/select2/dist/js/select2.full.min.js')}}"></script>
    <script src="{{ asset('admin/assets/modules/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{ asset('admin/assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>

    <script src="{{ asset('admin/assets/modules/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('admin/assets/modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('admin/assets/modules/datatables.net-select-bs4/js/select.bootstrap4.min.js')}}"></script>


    <!-- Template JS File -->
    <script src="{{ asset('admin/assets/js/scripts.js')}}"></script>
    <script src="{{ asset('admin/assets/js/custom.js')}}"></script>

    <script src="{{ asset('admin/assets/js/page/modules-datatables.js')}}"></script>
    <script src="{{ url('Scripts/sweetalert.min.js') }}"></script>

    @yield('scripts')
</body>

</html>
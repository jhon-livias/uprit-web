<!doctype html>
<html lang="en">

<head>
    <title>UPRIT</title>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{asset('web/imagenes/favicon.png')}}" type="image/x-icon">


    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/font-awesome/css/font-awesome.min.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('admin/assets/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('admin/assets/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/dropify/css/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/toastr/toastr.min.css') }}">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.css"
        integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    
    <!-- MAIN CSS -->
    <link rel="stylesheet"
        href="{{ asset('admin/assets/vendor/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/color_skins.css') }}">
    <link rel="stylesheet" href="{{asset('admin/admin/plugin/whatsapp-chat-support.css')}}">
    <link rel="stylesheet" href="{{asset('admin/admin/plugin/components/Font Awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css">
    @yield('styles')
    <style>
        td.details-control {
            background: url('admin/assets/images/details_open.png') no-repeat center center;
            cursor: pointer;
        }

        tr.shown td.details-control {
            background: url('admin/assets/images/details_close.png') no-repeat center center;
        }

        .modal-header {
            background: #A3002B;
            color: #fff;
        }

        span {
            font-size: 13px;
        }

        td {
            font-size: 13px;
        }

        .btn {
            font-size: 13px !important;
        }

        select {
            font-size: 13px !important;
        }

        .btn-success {
            background: #91001E !important;
            border-color: #91001E !important;
        }

        .btn-success:hover {
            background: #20272f !important;
            border-color: #20272f !important;
        }

        th {
            text-transform: uppercase;
            font-size: 13px;
        }

        .oculto {
            display: none;
        }
    </style>
</head>


<body>
    <div class="page-loader-wrapper" style="background-color:#91001E;">
        <div class="loader">
            <div class="m-t-30"><img src="{{ asset('admin/demo/logo_uprit_light.svg') }}"></div>


            {{-- <script src="{{ asset('admin/assets/bundles/libscripts.bundle.js')}}"></script> --}}
        </div>
    </div>
    <div id="wrapper">
        @include('admin.layouts._header')
        @include('admin.layouts._menu')


        <div id="main-content">
            <div class="container-fluid">
                <div class="block-header">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-12">
                            <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i
                                        class="fa fa-arrow-left"></i></i></a> <?php echo $dash; ?></h2>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i
                                            class="icon-home"></i></a></li>
                                <li class="breadcrumb-item"><?php echo $subt; ?></li>
                            </ul>
                        </div>

                    </div>
                </div>
                <div id="app">
                    @yield('content')
                </div>


            </div>
        </div>


    </div>

    <script src="{{ asset('admin/assets/bundles/libscripts.bundle.js') }}"></script>
    <script src="{{ asset('admin/assets/bundles/vendorscripts.bundle.js') }}"></script>
    <script src="{{ asset('admin/assets/bundles/datatablescripts.bundle.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/jquery-datatable/buttons/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/jquery-datatable/buttons/buttons.print.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/jquery-inputmask/jquery.inputmask.bundle.js') }}"></script> <!-- Input Mask Plugin Js -->
    <script src="{{ asset('admin/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <!-- SweetAlert Plugin Js -->
    <script src="{{ asset('admin/assets/bundles/mainscripts.bundle.js') }}"></script>
    <script src="{{ asset('admin/assets/js/pages/tables/jquery-datatable.js') }}"></script>


    <script src="{{ asset('admin/assets/vendor/dropify/js/dropify.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/pages/forms/dropify.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('admin/admin/toastr/toastr.js')}}"></script>
    <script src="{{asset('admin/admin/plugin/components/moment/moment.min.js')}}"></script>
    <script src="{{asset('admin/admin/plugin/components/moment/moment-timezone-with-data-10-year-range.min.js')}}"></script>
    <script src="{{asset('admin/admin/plugin/whatsapp-chat-support.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>
        $(function() {
            let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            $.ajaxSetup({
                headers: {
                    'x-csrf-token': token,
                }
            });
        });
        $('#example_3').whatsappChatSupport({
            defaultMsg: '',
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const btn = document.querySelector('.btn-toggle-offcanvas');
            const sidebar = document.getElementById('left-sidebar');
            const content = document.querySelector('.main-content');

            btn.addEventListener('click', function() {
                sidebar.classList.toggle('sidebar-hidden');
                content.classList.toggle('expanded');
            });
        });
    </script>

    @yield('scripts')
</body>

</html>
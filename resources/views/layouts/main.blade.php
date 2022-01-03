<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Sistem Ternak Ayam</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Sistem Informasi Pengelolaan Ternak Ayam Boiler" name="description" />
        <meta content="Rama" name="author" />
        <!-- App favicon -->
        {{-- <link rel="shortcut icon" href="{{url('theme/dist')}}/assets/images/favicon.ico"> --}}

        <!-- Bootstrap Css -->
        <link href="{{url('theme/dist')}}/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{url('theme/dist')}}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{url('theme/dist')}}/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body data-sidebar="dark">

        <!-- Begin page -->
        <div id="layout-wrapper">

            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="#" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{url('theme/dist')}}/assets/images/logo.svg" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{url('theme/dist')}}/assets/images/logo-dark.png" alt="" height="17">
                                </span>
                            </a>

                            <a href="#" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{url('theme/dist')}}/assets/images/logo-sm.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{url('theme/dist')}}/assets/images/logo-light.png" alt="" height="18">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                            <i class="mdi mdi-menu"></i>
                        </button>

                        <div class="d-none d-sm-block">
                            
                        </div>
                    </div>

                    <div class="d-flex">
                          <!-- App Search-->
                         
                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @if (auth()->guard('web')->check())
                                <i class="ti-user"></i> &nbsp;&nbsp;&nbsp;{{auth()->user()->name}}
                                @else  
                                <i class="ti-user"></i> &nbsp;&nbsp;&nbsp;{{auth()->guard('anak_kandang')->user()->nama}}
                                @endif
                                {{-- <img class="rounded-circle header-profile-user" src="{{url('theme/dist')}}/assets/images/users/user-4.jpg"
                                    alt="Header Avatar"> --}}
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <!-- item-->
                                <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle font-size-17 align-middle mr-1"></i> Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger"  href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"><i class="bx bx-power-off font-size-17 align-middle mr-1 text-danger"></i> Logout</a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </div>

            
                    </div>
                </div>
            </header>

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title">Main</li>

                            @if (auth()->guard('web')->check())

                            <li>
                                <a href="/" class="waves-effect">
                                    <i class="ti-home"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                            
                                <li>
                                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                                        <i class="ion ion-md-alarm"></i>
                                        <span>Penjadwalan</span>
                                    </a>
                                    <ul class="sub-menu" aria-expanded="false">
                                        <li><a href="/jadwal-doc">Jadwal DOC</a></li>
                                        <li><a href="/jadwal-penjaringan">Jadwal Penjaringan</a></li>
                                        <li><a href="/jadwal-panen">Jadwal Panen Besar</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="/pengeluaran" class="waves-effect">
                                        <i class="dripicons-document-new"></i>
                                        <span>Pengeluaran</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="/stok-pakan" class="waves-effect">
                                        <i class="ti-package"></i>
                                        <span>Stok Pakan</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="/keluhan" class="waves-effect">
                                        <i class="dripicons-warning"></i>
                                        <span>Keluhan</span>
                                    </a>
                                </li>
                                <li class="menu-title">Master Data</li>
                                    <li>
                                        <a href="/user" class="waves-effect">
                                            <i class="ti-user"></i>
                                            <span>User</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/anak-kandang" class="waves-effect">
                                            <i class="fas fa-user-friends"></i>
                                            <span>Anak Kandang</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/obat" class="waves-effect">
                                            <i class="ti-package"></i>
                                            <span>Obat dan Vitamin</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/bayaran" class="waves-effect">
                                            <i class="dripicons-document-new"></i>
                                            <span>Gaji</span>
                                        </a>
                                    </li>
                            @endif
                            
                            @if (auth()->guard('anak_kandang')->check())

                            <li>
                                <a href="/subadmin" class="waves-effect">
                                    <i class="ti-home"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                            
                            <li>
                                <a href="/subadmin/pengeluaran" class="waves-effect">
                                    <i class="dripicons-document-new"></i>
                                    <span>Pengeluaran</span>
                                </a>
                            </li>

                            <li>
                                <a href="/subadmin/keluhan" class="waves-effect">
                                    <i class="dripicons-warning"></i>
                                    <span>Keluhan</span>
                                </a>
                            </li>
                            

                            @endif
                            
                           

                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        @yield("content") 
                        <!-- end page title -->
                        

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                
                
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                © <script>document.write(new Date().getFullYear())</script> Rama Widana<span class="d-none d-sm-inline-block">.</span>
                            </div>
                        </div>
                    </div>
                </footer>

            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->
        <div class="right-bar">
            <div data-simplebar class="h-100">
                <div class="rightbar-title px-3 py-4">
                    <a href="javascript:void(0);" class="right-bar-toggle float-right">
                        <i class="mdi mdi-close noti-icon"></i>
                    </a>
                    <h5 class="m-0">Settings</h5>
                </div>

                <!-- Settings -->
                <hr class="mt-0" />
                <h6 class="text-center">Choose Layouts</h6>

                <div class="p-4">
                    <div class="mb-2">
                        <img src="{{url('theme/dist')}}/assets/images/layouts/layout-1.jpg" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="custom-control custom-switch mb-3">
                        <input type="checkbox" class="custom-control-input theme-choice" id="light-mode-switch" checked />
                        <label class="custom-control-label" for="light-mode-switch">Light Mode</label>
                    </div>
    
                    <div class="mb-2">
                        <img src="{{url('theme/dist')}}/assets/images/layouts/layout-2.jpg" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="custom-control custom-switch mb-3">
                        <input type="checkbox" class="custom-control-input theme-choice" id="dark-mode-switch" data-bsStyle="assets/css/bootstrap-dark.min.css" 
                            data-appStyle="assets/css/app-dark.min.css" />
                        <label class="custom-control-label" for="dark-mode-switch">Dark Mode</label>
                    </div>
    
                    <div class="mb-2">
                        <img src="{{url('theme/dist')}}/assets/images/layouts/layout-3.jpg" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="custom-control custom-switch mb-5">
                        <input type="checkbox" class="custom-control-input theme-choice" id="rtl-mode-switch" data-appStyle="assets/css/app-rtl.min.css" />
                        <label class="custom-control-label" for="rtl-mode-switch">RTL Mode</label>
                    </div>

                    <a href="https://1.envato.market/grNDB" class="btn btn-primary btn-block mt-3" target="_blank"><i class="mdi mdi-cart mr-1"></i> Purchase Now</a>

                </div>

            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="{{url('theme/dist')}}/assets/libs/jquery/jquery.min.js"></script>
        <script src="{{url('theme/dist')}}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="{{url('theme/dist')}}/assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="{{url('theme/dist')}}/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="{{url('theme/dist')}}/assets/libs/node-waves/waves.min.js"></script>
        <!-- Required datatable js -->
        <script src="{{url('theme/dist')}}/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="{{url('theme/dist')}}/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="{{url('theme/dist')}}/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="{{url('theme/dist')}}/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
        <script src="{{url('theme/dist')}}/assets/libs/jszip/jszip.min.js"></script>
        <script src="{{url('theme/dist')}}/assets/libs/pdfmake/build/pdfmake.min.js"></script>
        <script src="{{url('theme/dist')}}/assets/libs/pdfmake/build/vfs_fonts.js"></script>
        <script src="{{url('theme/dist')}}/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="{{url('theme/dist')}}/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="{{url('theme/dist')}}/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
        <!-- Responsive examples -->
        <script src="{{url('theme/dist')}}/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="{{url('theme/dist')}}/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

        <script src="{{url('theme/dist')}}/assets/js/app.js"></script>
        @stack('scripts')
        <script>
            $(document).on('click', '.delete-item', function (e) {
                e.preventDefault();
                var id = $(this).data('id');
                var url = $(this).data('url');
                var label = $(this).data('label');

                if (confirm('Apakah anda yakin ingin menghapus data?')) {
                    $.ajax({
                        type: "DELETE",
                        dataType: "JSON",
                        url: url,
                        data: {
                            "id": id,
                            "_method": 'DELETE',
                            "_token": "{{ csrf_token() }}",
                        }
                    }).then((data) => {
                        if (typeof data.message !== 'undefined') {
                            notie.alert({
                                text: data.message,
                                type: 'success'
                            })
                            $("#datatable").DataTable().ajax.reload();

                        }
                        $("#datatable").DataTable().ajax.reload();
                    })
                }
                $("#datatable").DataTable().ajax.reload();
            });
        </script>
    </body>
</html>

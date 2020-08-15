<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Final - 53</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ asset('assets') }}/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{ asset('assets') }}/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ asset('assets') }}/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="{{ asset('assets') }}/plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{ asset('assets') }}/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ asset('assets') }}/css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="/">FINAL - 53</a>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="{{ asset('assets') }}/images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</div>
                    <div class="email">{{ Auth::user()->email }}</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="active">
                        <a href="index.html">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">assignment</i>
                            <span>Forms</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="pages/forms/basic-form-elements.html">Basic Form Elements</a>
                            </li>
                            <li>
                                <a href="pages/forms/advanced-form-elements.html">Advanced Form Elements</a>
                            </li>
                            <li>
                                <a href="pages/forms/form-examples.html">Form Examples</a>
                            </li>
                            <li>
                                <a href="pages/forms/form-validation.html">Form Validation</a>
                            </li>
                            <li>
                                <a href="pages/forms/form-wizard.html">Form Wizard</a>
                            </li>
                            <li>
                                <a href="pages/forms/editors.html">Editors</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">view_list</i>
                            <span>Tables</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="pages/tables/normal-tables.html">Normal Tables</a>
                            </li>
                            <li>
                                <a href="pages/tables/jquery-datatable.html">Jquery Datatables</a>
                            </li>
                            <li>
                                <a href="pages/tables/editable-table.html">Editable Tables</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <!-- #END# Right Sidebar -->
    </section>

    <section class="content">
        @yield('content')
    </section>

    <!-- Jquery Core Js -->
    <script src="{{ asset('assets') }}/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{ asset('assets') }}/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="{{ asset('assets') }}/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="{{ asset('assets') }}/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset('assets') }}/plugins/node-waves/waves.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="{{ asset('assets') }}/plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Morris Plugin Js -->
    <script src="{{ asset('assets') }}/plugins/raphael/raphael.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/morrisjs/morris.js"></script>

    <!-- ChartJs -->
    <script src="{{ asset('assets') }}/plugins/chartjs/Chart.bundle.js"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="{{ asset('assets') }}/plugins/flot-charts/jquery.flot.js"></script>
    <script src="{{ asset('assets') }}/plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="{{ asset('assets') }}/plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="{{ asset('assets') }}/plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="{{ asset('assets') }}/plugins/flot-charts/jquery.flot.time.js"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="{{ asset('assets') }}/plugins/jquery-sparkline/jquery.sparkline.js"></script>

    <!-- Custom Js -->
    <script src="{{ asset('assets') }}/js/admin.js"></script>
    <script src="{{ asset('assets') }}/js/pages/index.js"></script>

    <!-- Demo Js -->
    <script src="{{ asset('assets') }}/js/demo.js"></script>
    <!-- Jquery DataTable Plugin Js -->
    <script src="{{ asset('assets') }}/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="{{ asset('assets') }}/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="{{ asset('assets') }}/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="{{ asset('assets') }}/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
</body>

</html>
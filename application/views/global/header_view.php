<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=gb18030">    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url()?>assets/img/logo.png">
    <title>ToDoListApp - Registra y gestiona tus actividades pendientes</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url()?>estilos/eliteadmin-university/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>estilos/plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="<?=base_url()?>estilos/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="<?=base_url()?>estilos/plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="<?=base_url()?>estilos/eliteadmin-university/css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?=base_url()?>estilos/eliteadmin-university/css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="<?=base_url()?>estilos/eliteadmin-university/css/colors/blue-dark.css" id="theme" rel="stylesheet">
    <!--alerts CSS -->
    <link href="<?=base_url()?>estilos/plugins/bower_components/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
    <!-- JAVASCRIPTS -->
    <!-- jQuery -->
    <script src="<?=base_url()?>estilos/plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url()?>estilos/eliteadmin-university/bootstrap/dist/js/tether.min.js"></script>
    <script src="<?=base_url()?>estilos/eliteadmin-university/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>estilos/plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="<?=base_url()?>estilos/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--Counter js -->
    <script src="<?=base_url()?>estilos/plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
    <script src="<?=base_url()?>estilos/plugins/bower_components/counterup/jquery.counterup.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="<?=base_url()?>estilos/eliteadmin-university/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="<?=base_url()?>estilos/eliteadmin-university/js/waves.js"></script>
    <!--Morris JavaScript -->
    <script src="<?=base_url()?>estilos/plugins/bower_components/raphael/raphael-min.js"></script>
    <script src="<?=base_url()?>estilos/plugins/bower_components/morrisjs/morris.js"></script>
    <script src="<?=base_url()?>estilos/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    
    <!-- Custom Theme JavaScript -->
    <script src="<?=base_url()?>estilos/eliteadmin-university/js/custom.min.js"></script>
    <!--Style Switcher -->
    <script src="<?=base_url()?>estilos/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
    <!-- Sweet-Alert  -->
    <script src="<?=base_url()?>estilos/plugins/bower_components/sweetalert/sweetalert.min.js"></script>
    <script src="<?=base_url()?>estilos/plugins/bower_components/sweetalert/jquery.sweet-alert.custom.js"></script>
    <script src="<?=base_url()?>assets/js/login/iniciar_sesion.js"></script>
</head>
<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
                <div class="top-left-part"><a class="logo" href="<?=base_url()?>"><b><img src="<?=base_url()?>assets/img/logo.png" alt="home" /></b><span class="hidden-xs"><img src="<?=base_url()?>assets/img/logo2.png" width="130px" alt="home" /></span></a></div>
                <ul class="nav navbar-top-links navbar-left hidden-xs">
                    <li><a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i class="fa fa-bars"></i></a></li>
                </ul>
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <!-- /.dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> 
                            <img src="<?=base_url()?>assets/img/usuario.png" alt="user-img" width="36" class="img-circle"><b class="hidden-xs"><?=$this->session->userdata("nombre_usuario_completo")?></b> 
                        </a>
                        <ul class="dropdown-menu dropdown-user animated flipInY">
                            <li><a href="javascript:cerrar_sesion('<?=base_url()?>')"><i class="fa fa-power-off"></i> Cerrar sesión</a></li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- Left navbar-header -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse slimscrollsidebar">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="<?=base_url()?>categorias/categoria" class="waves-effect">
                            <i class="fa fa-tasks"></i> 
                            <span class="hide-menu">Categorías</span></a>
                        </a>
                    </li>
                    <li>
                        <a href="<?=base_url()?>actividades/actividad" class="waves-effect">
                            <i class="fa fa-calendar"></i> 
                            <span class="hide-menu">Actividades</span></a>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Left navbar-header end -->
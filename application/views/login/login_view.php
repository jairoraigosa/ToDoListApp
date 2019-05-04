<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url()?>assets/img/logo.png">
    <title>Iniciar Sesión - ToDoListApp</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url()?>estilos/eliteadmin-university/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>estilos/plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="<?=base_url()?>estilos/eliteadmin-university/css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?=base_url()?>estilos/eliteadmin-university/css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="<?=base_url()?>estilos/eliteadmin-university/css/colors/blue.css" id="theme" rel="stylesheet">
    <!-- SweetAlert CSS -->
    <link href="<?=base_url()?>estilos/plugins/bower_components/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <section id="wrapper" class="login-register">
        <div class="login-box login-sidebar">
            <div class="white-box">
                <form class="form-horizontal form-material" id="loginform" action="javascript:iniciar_sesion('<?=base_url()?>');">
                    <a href="javascript:void(0)" class="text-center db"><img src="assets/img/logo.png" alt="Home" />
                    <div class="form-group m-t-40">
                        <div class="col-xs-12">
                            <input class="form-control" id="user" type="text" required="" placeholder="Nombre de usuario">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" id="pwd" type="password" required="" placeholder="Contraseña">
                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Iniciar Sesión</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- jQuery -->
    <script src="<?=base_url()?>estilos/plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url()?>estilos/eliteadmin-university/bootstrap/dist/js/tether.min.js"></script>
    <script src="<?=base_url()?>estilos/eliteadmin-university/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>estilos/plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="<?=base_url()?>estilos/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="<?=base_url()?>estilos/eliteadmin-university/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="<?=base_url()?>estilos/eliteadmin-university/js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?=base_url()?>estilos/eliteadmin-university/js/custom.min.js"></script>
    <!--Style Switcher -->
    <script src="<?=base_url()?>estilos/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
    <!-- SweetAlert -->
    <script src="<?=base_url()?>estilos/plugins/bower_components/sweetalert/jquery.sweet-alert.custom.js"></script>
    <script src="<?=base_url()?>estilos/plugins/bower_components/sweetalert/sweetalert.min.js"></script>
    <script src="<?=base_url()?>assets/js/login/iniciar_sesion.js"></script>
</body>

</html>

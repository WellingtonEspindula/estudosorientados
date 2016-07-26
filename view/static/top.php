<?php
  ini_set('display_errors', 1);

  session_start();
  if (($_SESSION["usuario"] != "logado") || (!isset($_SESSION["usuario"]))){
    header("Location: ../login.php");
  }

 ?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistema de envio de emails</title>


    <!-- Custom styling plus plugins -->
    <link href="../css/custom.css" rel="stylesheet">
    <link href="../css/icheck/flat/green.css" rel="stylesheet">
    <link href="../css/datatables/tools/css/dataTables.tableTools.css" rel="stylesheet">


    <!-- Bootstrap core CSS -->

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/global.css" rel="stylesheet">

    <link href="../fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="../css/custom.css" rel="stylesheet">
    <link href="../css/icheck/flat/green.css" rel="stylesheet">


    <script src="../js/jquery.min.js"></script>

    <!--[if lt IE 9]>
    <script src="../assets/js/ie8-responsive-file-warning.js"></script>
    <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>


<body class="nav-md pace-running">
<div class="pace pace-active">
    <div class="pace-progress" style="transform: translate3d(99.8065%, 0px, 0px);" data-progress-text="99%"
         data-progress="99">
        <div class="pace-progress-inner"></div>
    </div>
    <div class="pace-activity"></div>
</div>

<div class="container body">


    <div class="main_container">

        <div class="col-md-3 left_col">
            <div tabindex="5000" class="left_col scroll-view"
                 style="outline: invert; cursor: url(http://www.google.com/intl/en_ALL/mapfiles/openhand.cur), n-resize; overflow-x: hidden; overflow-y: hidden;">

                <div class="navbar nav_title" style="border: 0;">
                    <a class="site_title"><i class="fa fa-book"></i> <span>EOs</span></a>
                </div>
                <div class="clearfix"></div>

                <!-- sidebar menu -->
                <div class="main_menu_side hidden-print main_menu" id="sidebar-menu">

                    <div class="menu_section">

                        <ul class="nav side-menu">
                            <li><a><i class="fa fa-table"></i> Estudos Orientados <span
                                        class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="../estudosorientados/index.php">Listar</a>
                                    </li>
                                    <li><a href="../estudosorientados/inserir.php">Cadastrar</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-graduation-cap"></i> Professores <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu" style="display: none;">
                                  <li><a href="../professor/index.php">Listar</a>
                                  </li>
                                  <li><a href="../professor/inserir.php">Cadastrar</a>
                                  </li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-users"></i> Turma <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu" style="display: none;">
                                  <li><a href="../turma/index.php">Listar</a>
                                  </li>
                                  <li><a href="../turma/inserir.php">Cadastrar</a>
                                  </li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-institution"></i> Cursos <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu" style="display: none;">
                                  <li><a href="../cursos/index.php">Listar</a>
                                  </li>
                                  <li><a href="../cursos/inserir.php">Cadastrar</a>
                                  </li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-calendar-o"></i> Período <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu" style="display: none;">
                                  <li><a href="../periodo/index.php">Listar</a>
                                  </li>
                                  <li><a href="../periodo/inserir.php">Cadastrar</a>
                                  </li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-user"></i> Administradores <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu" style="display: none;">
                                  <li><a href="../admin/index.php">Listar</a>
                                  </li>
                                  <li><a href="../admin/inserir.php">Cadastrar</a>
                                  </li>
                                </ul>
                            </li>

                        </ul>
                    </div>

                </div>
                <!-- /sidebar menu -->

            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">

            <div class="nav_menu">
                <nav role="navigation">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <ul class="nav navbar-nav navbar-right">
                          <li><a href="../logout.php"><i style="font-size: 20px;" class="fa fa-sign-out pull-right"></i></a>
                          </li>
                    </ul>


                </nav>
            </div>

        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main" style="min-height: 691px;">
            <div class="conteudo">

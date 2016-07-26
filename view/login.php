<?php

  ini_set('display_errors', 1);

  require_once '../dao/AdminDAO.php';
  require_once '../model/Admin.php';

  if (isset($_POST["confirm"])){
    $login = $_POST["login"];
    $senha = $_POST["senha"];

    $admin = new Admin();
    $admin->setLogin($login);
    $admin->setSenha(md5($senha));

    $dao = AdminDAO::getInstance();
    $autenticado = $dao->autentica($admin);

    if ($autenticado){
      session_start();
      $_SESSION["usuario"] = "logado";
      header("Location: estudosorientados/index.php");

    } else{
      header("Location: login.php");
    }

  } else {

 ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Gentallela Alela! | </title>

  <!-- Bootstrap core CSS -->

  <link href="css/bootstrap.min.css" rel="stylesheet">

  <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="css/animate.min.css" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="css/custom.css" rel="stylesheet">
  <link href="css/icheck/flat/green.css" rel="stylesheet">


  <script src="js/jquery.min.js"></script>

  <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>

<body style="background:#F7F7F7;">

  <div class="">
    <a class="hiddenanchor" id="toregister"></a>
    <a class="hiddenanchor" id="tologin"></a>

    <div id="wrapper">
      <div id="login" class="animate form">
        <section class="login_content">
          <form action="" method="post">
            <h1>Login</h1>
            <div>
              <input type="text" class="form-control" name="login" placeholder="Username" required="" />
            </div>
            <div>
              <input type="password" class="form-control" name="senha" placeholder="Password" required="" />
            </div>
            <div>
              <button type="submitt" class="btn" name="confirm">Login
              </button>
            </div>
            <div class="clearfix"></div>
            <div class="separator">
              <div class="clearfix"></div>
              <br />
              <div>
                <h2><i class="fa fa-book" style="font-size: 26px;"></i> Desenvolvido por Wellington Espindula</h2>

                <p>Template HTML: Gentelella Alela!</p>
              </div>
            </div>
          </form>
          <!-- form -->
        </section>
        <!-- content -->
      </div>
    </div>
  </div>

</body>

</html>

<?php

    }

 ?>

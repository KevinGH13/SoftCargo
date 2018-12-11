<?php session_start(); ?>
<html lang="es-US">
  <head>
    <meta charset="utf-8">

    <title>Login</title>
    <link rel="icon" type="image/png" href="images/favicon.png" />
	<link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,700">

    <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
 <![endif]-->

	<?php require('ctrl_index.php'); ?>
    
  </head>

  <body>
 
    <div class="container" align="center">
      <div class="logo" align="center"><img src="images/ecp_abrev.png" style="width: 90%;" /></div>
      <div align="center" style="color:#FC0; margin-top:10px; "><?php echo $vrcMensaje; ?></div>
      <div id="login">
        <form action="index.php" method="post">
          
            <p><span class="fontawesome-user"></span>
              <input id="txtUsuario" name="txtUsuario" type="text" value="Usuario" onBlur="if(this.value == '') this.value = ''" onFocus="if(this.value == 'Usuario') this.value = ''" required>
            </p>
            <!-- JS because of IE support; better: placeholder="Username" -->
            <p><span class="fontawesome-lock"></span>
              <input id="txtPassword" name="txtPassword" type="password"  value="Password" onBlur="if(this.value == '') this.value = ''" onFocus="if(this.value == 'Password') this.value = ''" required>
            </p>
            <!-- JS because of IE support; better: placeholder="Password" -->
            <p>
              <input type="submit" value="Iniciar Sesión">
            </p>
          
        </form>
        <p><a href="#">Términos y Condiciones </a><span class="fontawesome-file"></span></p>
      </div>
      <!-- end login -->
    </div>

  </body>
</html>
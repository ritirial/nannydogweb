<?php

  require '../vendor/autoload.php';

  use Parse\ParseClient;
  use Parse\ParseUser;
  use Parse\ParseQuery;
  use Parse\ParseFile;

  session_start();

  ParseClient::initialize('5MUjnjMwd8whYbxWY2pWqAv0QMZ3MHGStiMqRt3y', 'bvdNyubNuQUFWRWZ3cfFSZpm0q6KvHk5gW2xf2D3', 'xoZNO6TOuIV4kLHvIwTam9tYa2xY9prURzhFyASL');
  ParseClient::setServerURL('https://parseapi.back4app.com', '/');

  $current_user = ParseUser::getCurrentUser();

  $photo =  $current_user->get("image_profile"); 
  $imageURL = $photo->getURL();


?>
<!DOCTYPE html>
<html>
<head>
  <title>NannyDog</title>
  
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" type="text/css" href="../assets/css/vendor.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/flat-admin.css">

  <!-- Theme -->
  <link rel="stylesheet" type="text/css" href="../assets/css/theme/blue-sky.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/theme/blue.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/theme/red.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/theme/yellow.css">

</head>
<body>
  <div class="app app-default">

<aside class="app-sidebar" id="sidebar">
  <div class="sidebar-header">
    <a class="sidebar-brand" href="#"><img class="img-responsive" src="../assets/images/logo.png"></a>
    <button type="button" class="sidebar-toggle">
      <i class="fa fa-times"></i>
    </button>
  </div>
  <div class="sidebar-menu">
    <ul class="sidebar-nav">
      <li class="active">
        <a href="../dashboard.php">
          <div class="icon">
            <i class="fa fa-tasks" aria-hidden="true"></i>
          </div>
          <div class="title">Dashboard</div>
        </a>
      </li>
      <li class="active">
        <a href="./mascotas.php">
          <div class="icon">
            <i class="fa fa-paw" aria-hidden="true"></i>
          </div>
          <div class="title">Mis mascotas</div>
        </a>
      </li>
      <li class="active">
        <a href="#">
          <div class="icon">
            <i class="fa fa-calendar" aria-hidden="true"></i>
          </div>
          <div class="title">Reservaciones</div>
        </a>
      </li>
      <li class="active">
        <a href="./profile.php">
          <div class="icon">
            <i class="fa fa-user" aria-hidden="true"></i>
          </div>
          <div class="title">Mi cuenta</div>
        </a>
      </li>
    </ul>
  </div>
</aside>

<script type="text/ng-template" id="sidebar-dropdown.tpl.html">
  <div class="dropdown-background">
    <div class="bg"></div>
  </div>
  <div class="dropdown-container">
    {{list}}
  </div>
</script>
<div class="app-container">

  <nav class="navbar navbar-default" id="navbar">
  <div class="container-fluid">
    <div class="navbar-collapse collapse in">
      <ul class="nav navbar-nav navbar-mobile">
        <li>
          <button type="button" class="sidebar-toggle">
            <i class="fa fa-bars"></i>
          </button>
        </li>
        <li class="logo">
          <a class="navbar-brand" href="#"><span class="highlight">Dashboard</a>
        </li>
        <li>
          <button type="button" class="navbar-toggle">
            <img class="profile-img" src="./assets/images/profile.png">
          </button>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-left">
        <li class="navbar-title">Dashboard de servicios</li>
        <li class="navbar-search hidden-sm">
          <input id="search" type="text" placeholder="Buscar..">
          <button class="btn-search"><i class="fa fa-search"></i></button>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown notification">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <div class="icon"><i class="fa fa-shopping-basket" aria-hidden="true"></i></div>
            <div class="title">New Orders</div>
            <div class="count">0</div>
          </a>
          <div class="dropdown-menu">
            <ul>
              <li class="dropdown-header">Servicios reservados</li>
              <li class="dropdown-empty">Ningún servicio reservado</li>
              <li class="dropdown-footer">
                <a href="#">Ver todos <i class="fa fa-angle-right" aria-hidden="true"></i></a>
              </li>
            </ul>
          </div>
        </li>
        <li class="dropdown notification warning">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <div class="icon"><i class="fa fa-comments" aria-hidden="true"></i></div>
            <div class="title">Unread Messages</div>
            <div class="count">99</div>
          </a>
          <div class="dropdown-menu">
            <ul>
              <li class="dropdown-header">Mensajes</li>
              <li>
                <a href="#">
                  <span class="badge badge-warning pull-right">10</span>
                  <div class="message">
                    <img class="profile" src="https://placehold.it/100x100">
                    <div class="content">
                      <div class="title">"Fotos de Koda.."</div>
                      <div class="description">Lorena</div>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="#">
                  <span class="badge badge-warning pull-right">5</span>
                  <div class="message">
                    <img class="profile" src="https://placehold.it/100x100">
                    <div class="content">
                      <div class="title">"Servicio de Spa para Tiago"</div>
                      <div class="description">Celen</div>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="#">
                  <span class="badge badge-warning pull-right">2</span>
                  <div class="message">
                    <img class="profile" src="https://placehold.it/100x100">
                    <div class="content">
                      <div class="title">"Cita con veterinario.."</div>
                      <div class="description">Heloel</div>
                    </div>
                  </div>
                </a>
              </li>
              <li class="dropdown-footer">
                <a href="#">Ver todos <i class="fa fa-angle-right" aria-hidden="true"></i></a>
              </li>
            </ul>
          </div>
        </li>
        <li class="dropdown notification danger">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <div class="icon"><i class="fa fa-bell" aria-hidden="true"></i></div>
            <div class="title">System Notifications</div>
            <div class="count">10</div>
          </a>
          <div class="dropdown-menu">
            <ul>
              <li class="dropdown-header">Notificaciones</li>
              <li>
                <a href="#">
                  <span class="badge badge-danger pull-right">8</span>
                  <div class="message">
                    <div class="content">
                      <div class="title">Koda finalizó su hora de paseo</div>
                      <div class="description">$75 total</div>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="#">
                  <span class="badge badge-danger pull-right">14</span>
                  Heloel aceptó tu solicitud de paseo para Tiago
                </a>
              </li>
              <li>
                <a href="#">
                  <span class="badge badge-danger pull-right">5</span>
                  El Croketon está cerca, ¡Inscríbite!
                </a>
              </li>
              <li class="dropdown-footer">
                <a href="#">Ver todos <i class="fa fa-angle-right" aria-hidden="true"></i></a>
              </li>
            </ul>
          </div>
        </li>
        <li class="dropdown profile">
          <a href="/html/pages/profile.html" class="dropdown-toggle"  data-toggle="dropdown">
          <?php
            echo '<img class="profile-img" src="'.$imageURL.'">';
          ?>
            <div class="title">Profile</div>
          </a>
          <div class="dropdown-menu">
            <div class="profile-info">
              <h4 class="username">
                <?php
                    echo $current_user->get("name");
                  ?>
              </h4>
            </div>
            <ul class="action">
              <li>
                <a href="#">
                  Perfil
                </a>
              </li>
              <li>
                <a href="#">
                  <span class="badge badge-danger pull-right">5</span>
                  Nuestros servicios
                </a>
              </li>
              <li>
                <a href="#">
                  Ayuda
                </a>
              </li>
              <li>
                <a href="#">
                  Convertirse en cuidador
                </a>
              </li>
              <li>
                <a href="#">
                  Configuración
                </a>
              </li>
              <li>
                <a href="#">
                  Logout
                </a>
              </li>
            </ul>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>

  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body app-heading">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="text-center">
                <?php
                    echo '<img class="img-responsive img-thumbnail" src="'.$imageURL.'">';
                ?>
                <h6>Cambiar foto de perfil ...</h6>
                <input type="file" class="text-center center-block well well-sm">
            </div>
        </div>

        <div class="col-md-6">
            <div class="app-title">
                <div class="title"><span class="highlight">
                    <?php 
                        echo $current_user->get("name"); 
                    ?>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
                <div class="card-body app-heading">
                <!-- edit form column -->
                    <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
                    <h3>Información personal</h3>
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                        <label class="col-lg-3 control-label">Nombre:</label>
                        <div class="col-lg-8">
                            <?php
                                echo '<input class="form-control" type="text" placeholder="'.$current_user->get("name").'">';
                            ?>
                        </div>
                        </div>
                        <div class="form-group">
                        <label class="col-lg-3 control-label">Apellidos:</label>
                        <div class="col-lg-8">
                            <?php
                                 echo '<input class="form-control" type="text" placeholder="'.$current_user->get("lastname").'">';
                            ?>
                        </div>
                        </div>
                        <div class="form-group">
                        <label class="col-lg-3 control-label">Ocupación:</label>
                        <div class="col-lg-8">
                            <input class="form-control" value="" type="text">
                        </div>
                        </div>
                        <div class="form-group">
                        <label class="col-lg-3 control-label">Email:</label>
                        <div class="col-lg-8">
                            <?php
                                 echo '<input class="form-control" type="text" placeholder="'.$current_user->get("email").'">';
                            ?>
                        </div>
                        </div>
                        
                        <div class="form-group">
                        <label class="col-md-3 control-label">Password:</label>
                        <div class="col-md-8">
                            <input class="form-control" value="11111122333" type="password">
                        </div>
                        </div>
                        <div class="form-group">
                        <label class="col-md-3 control-label">Confirm password:</label>
                        <div class="col-md-8">
                            <input class="form-control" value="11111122333" type="password">
                        </div>
                        </div>
                        <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-8">
                            <input class="btn btn-primary" value="Guardar cambios" type="button">
                            <span></span>
                            <input class="btn btn-default" value="Cancelar" type="reset">
                        </div>
                        </div>
                    </form>
                    </div>
                </div>
        </div>
    </div>
</div>
  
  <script type="text/javascript" src="../assets/js/vendor.js"></script>
  <script type="text/javascript" src="../assets/js/app.js"></script>

</body>
</html>
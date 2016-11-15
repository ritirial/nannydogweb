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
        <li class="navbar-title">Perfil de mi mascota</li>
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
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
             Información general
            </div>
            <div class="card-body">
                <div class="row">

                    <div class="col-md-12"><h2><center>Aún no tienes mascotas registradas</center></h2></div>

                    <div class="col-md-12">
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal" style="position: relative; left: 50%; margin-right: -50%; transform: translate(-50%, -50%); margin-top: 2%;">Agregar mascota</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"><strong>Datos de mi mascota</strong></h4>
          </div>
          <div class="modal-body">
             <form enctype="multipart/form-data" class="form-horizontal" role="form" method="post" action="../ax_almacena_mascota.php">
                <input type="text" class="form-control" placeholder="Nombre" name="name">
                <p>Tamaño:</p>
                <select class="select" name="size">
                    <option value="pequeño">Pequeño (0-9 kg)</option>
                    <option value="mediano">Mediano (10-19 kg)</option>
                    <option value="grande">Grande (20-30 kg)</option>
                    <option value="extragrande">Extragrande (Más de 40 kg)</option>
                </select>

                <p style="margin-top: 5%;">Sexo:</p>
                <select class="select" name="gender">
                    <option value="macho">Macho</option>
                    <option value="embra">Hembra</option>
                </select>
              
                <input type="text" class="form-control" placeholder="Raza" style="margin-top: 5%;" name="breed">
                
                <p>Tu mascota:</p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="checkbox">
                            <input type="checkbox" id="checkbox1" name="check1">
                            <label for="checkbox1">
                                Convive con niños
                            </label>
                        </div>
                        <div class="checkbox">
                            <input type="checkbox" id="checkbox2" name="check2">
                            <label for="checkbox2">
                                Se lleva bien con otros perros
                            </label>
                        </div>
                        <div class="checkbox">
                            <input type="checkbox" id="checkbox3" name="check3">
                            <label for="checkbox3">
                                Desparasitación
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="checkbox">
                            <input type="checkbox" id="checkbox4" name="check4">
                            <label for="checkbox4">
                                Vacunas actualizadas
                            </label>
                        </div>
                        <div class="checkbox">
                            <input type="checkbox" id="checkbox5" name="check5">
                            <label for="checkbox5">
                                Esterilizado
                            </label>
                        </div>
                        <div class="checkbox">
                            <input type="checkbox" id="checkbox6" name="check6">
                            <label for="checkbox6">
                                Tira de la correa
                            </label>
                        </div>
                    </div>
                </div>

                <p>Cuéntanos sobre tu mascota: </p>
                <textarea class="form-control" name="about"></textarea>
        
                <input type="file" name="testimage1" class="btn btn-sm btn-default"/>
                <input type="button" id="reset1" value="Borrar" class="btn btn-sm btn-default"/>
                <div id="preview1" class="img-responsive"></div>    
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-sm btn-success">Guardar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  
  <script type="text/javascript" src="../assets/js/vendor.js"></script>
  <script type="text/javascript" src="../assets/js/app.js"></script>

  <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
  <script type="text/javascript" src="../js/imagepreview.js"></script>

  <script type="text/javascript">
    $(function() {
      $('#preview1').imagepreview({
          input: '[name="testimage1"]',
          reset: '#reset1',
          preview: '#preview1'
      });
    });
  </script>

</body>
</html>
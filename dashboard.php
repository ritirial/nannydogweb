<!DOCTYPE html>
<html>
<head>
  <title>NannyDog Dashboard</title>
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

  <link rel="stylesheet" type="text/css" href="./assets/css/vendor.css">
  <link rel="stylesheet" type="text/css" href="./assets/css/flat-admin.css">

  <!-- Theme -->
  <link rel="stylesheet" type="text/css" href="./assets/css/theme/blue-sky.css">
  <link rel="stylesheet" type="text/css" href="./assets/css/theme/blue.css">
  <link rel="stylesheet" type="text/css" href="./assets/css/theme/red.css">
  <link rel="stylesheet" type="text/css" href="./assets/css/theme/yellow.css">

</head>
<body>
  <div class="app app-default">

<aside class="app-sidebar" id="sidebar">
  <div class="sidebar-header">
    <a class="sidebar-brand" href="#"><img class="img-responsive" src="./assets/images/logo.png"></a>
    <button type="button" class="sidebar-toggle">
      <i class="fa fa-times"></i>
    </button>
  </div>
  <div class="sidebar-menu">
    <ul class="sidebar-nav">
      <li class="active">
        <a href="./index.html">
          <div class="icon">
            <i class="fa fa-tasks" aria-hidden="true"></i>
          </div>
          <div class="title">Dashboard</div>
        </a>
      </li>
      <li class="@@menu.messaging">
        <a href="#">
          <div class="icon">
            <i class="fa fa-comments" aria-hidden="true"></i>
          </div>
          <div class="title">Mensajes</div>
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
            <img class="profile-img" src="./assets/images/profile.png">
            <div class="title">Profile</div>
          </a>
          <div class="dropdown-menu">
            <div class="profile-info">
              <h4 class="username">Guillermo Arturo</h4>
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

  <div class="btn-floating" id="help-actions">
  <div class="btn-bg"></div>
  <button type="button" class="btn btn-default btn-toggle" data-toggle="toggle" data-target="#help-actions">
    <i class="icon fa fa-plus"></i>
  </button>
  <div class="toggle-content">
    <ul class="actions">
      <li><a href="#">Nuevo peludito</a></li>
    </ul>
  </div>
</div>

<div class="row">
  <div class="col-xs-12">
    <div class="card card-banner card-chart card-blue no-br">
      <div class="card-header">
        <div class="card-title">
          <div class="title">Servicio seleccionado</div>
        </div>
        <ul class="card-action">
          <li>
            <a href="#">
              <i class="fa fa-refresh"></i>
            </a>
          </li>
        </ul>
      </div>
      <div class="card-body">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3772.033122753807!2d-98.24351968561434!3d19.01826205872819!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85cfc74296a8201f%3A0x8888d7339559ccd4!2sTecnol%C3%B3gico+de+Monterrey+Campus+Puebla!5e0!3m2!1ses!2smx!4v1477168102191" width="1200" height="480" frameborder="0" style="border:0" allowfullscreen></iframe>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
      <a class="card card-banner card-green-light">
  <div class="card-body">
    <i class="icon fa fa-paw fa-4x"></i>
    <div class="content">
      <div class="title">Paseo</div>
      <div class="value">
        <img class="profile" src="https://placehold.it/50x50">
        <img class="profile" src="https://placehold.it/50x50">
        <img class="profile" src="https://placehold.it/50x50">           
      </div>
    </div>
  </div>
</a>

  </div>
  <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
      <a class="card card-banner card-blue-light">
  <div class="card-body">
    <i class="icon fa fa-home fa-4x"></i>
    <div class="content">
      <div class="title">Hospedaje</div>
      <div class="value">
        <img class="profile" src="https://placehold.it/50x50">
        <img class="profile" src="https://placehold.it/50x50">
        <img class="profile" src="https://placehold.it/50x50">           
      </div>
    </div>
  </div>
</a>

  </div>
  <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
      <a class="card card-banner card-yellow-light">
  <div class="card-body">
    <i class="icon fa fa-bed fa-4x"></i>
    <div class="content">
      <div class="title">Guardería</div>
      <div class="value">
        <img class="profile" src="https://placehold.it/50x50">
        <img class="profile" src="https://placehold.it/50x50">
        <img class="profile" src="https://placehold.it/50x50">           
      </div>
    </div>
  </div>
</a>
  </div>
</div>

<div class="row">
  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
    <div class="card card-mini">
      <div class="card-header">
        <div class="card-title">Historial de servicios</div>
        <ul class="card-action">
          <li>
            <a href="/">
              <i class="fa fa-refresh"></i>
            </a>
          </li>
        </ul>
      </div>
      <div class="card-body no-padding table-responsive">
        <table class="table card-table">
          <thead>
            <tr>
              <th>Servicio</th>
              <th class="right">Costo</th>
              <th>Estatus</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Paseo de Tiago</td>
              <td class="right">$50</td>
              <td><span class="badge badge-success badge-icon"><i class="fa fa-check" aria-hidden="true"></i><span>Completado</span></span></td>
            </tr>
            <tr>
              <td>Paseo de Koda</td>
              <td class="right">$75</td>
              <td><span class="badge badge-warning badge-icon"><i class="fa fa-clock-o" aria-hidden="true"></i><span>Pendiente</span></span></td>
            </tr>
            <tr>
              <td>Hospedaje de Koda</td>
              <td class="right">$400</td>
              <td><span class="badge badge-info badge-icon"><i class="fa fa-credit-card" aria-hidden="true"></i><span>Confirmación de pago</span></span></td>
            </tr>
            <tr>
              <td>Guardería para Tiago</td>
              <td class="right">$120</td>
              <td><span class="badge badge-danger badge-icon"><i class="fa fa-times" aria-hidden="true"></i><span>Cancelado</span></span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
    <div class="card card-tab card-mini">
      <div class="card-header">
        <ul class="nav nav-tabs tab-stats">
          <li role="tab1" class="active">
            <a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">Mis mascotas</a>
          </li>
          <li role="tab2">
            <a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab">Cuidadores</a>
          </li>
        </ul>
      </div>
      <div class="card-body tab-content">
        <div role="tabpanel" class="tab-pane active" id="tab1">
          <div class="row">
            <div class="col-sm-12">

              <div class="row">
                <div class="col-sm-4">
                    <img class="profile" src="https://placehold.it/80x80">
                </div>
                <div class="col-sm-8">
                    <div class="content">
                      <div class="title">"Koda"</div>
                      <div class="description">Descripción de Koda</div>
                  </div>
                </div>
              </div>
              <div class="row" style="padding-top: 10px;">
                <div class="col-sm-4">
                    <img class="profile" src="https://placehold.it/80x80">
                </div>
                <div class="col-sm-8">
                    <div class="content">
                      <div class="title">"Tiago"</div>
                      <div class="description">Descripción de Tiago</div>
                  </div>
                </div>
              </div>        
            </div>
          </div>
        </div>
        <div role="tabpanel" class="tab-pane" id="tab2">
          <div class="row">
            <div class="col-sm-12">
              <div class="row">
                <div class="col-sm-4">
                    <img class="profile" src="https://placehold.it/80x80">
                </div>
                <div class="col-sm-8">
                    <div class="content">
                      <div class="title">Lorena</div>
                      <div class="description">Descripción del cuidador</div>
                  </div>
                </div>
              </div>
              <div class="row" style="padding-top: 10px;">
                <div class="col-sm-4">
                    <img class="profile" src="https://placehold.it/80x80">
                </div>
                <div class="col-sm-8">
                    <div class="content">
                      <div class="title">Heloel</div>
                      <div class="description">Descripción del cuidador</div>
                  </div>
                </div>
              </div>
              <div class="row" style="padding-top: 10px;">
                <div class="col-sm-4">
                    <img class="profile" src="https://placehold.it/80x80">
                </div>
                <div class="col-sm-8">
                    <div class="content">
                      <div class="title">Ricardo</div>
                      <div class="description">Descripción del cuidador</div>
                  </div>
                </div>
              </div>  
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  <footer class="app-footer"> 
  <div class="row">
    <div class="col-xs-12">
      <div class="footer-copyright">
        Copyright © 2016 NannyDog
      </div>
    </div>
  </div>
</footer>
</div>

  </div>
  
  <script type="text/javascript" src="./assets/js/vendor.js"></script>
  <script type="text/javascript" src="./assets/js/app.js"></script>

</body>
</html>
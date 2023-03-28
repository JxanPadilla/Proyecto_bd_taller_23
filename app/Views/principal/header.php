<!DOCTYPE html>
<html lang="es">

<head>
  <link rel="stylesheet" href="<?php echo base_url('/css/header.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('/bootstrap/bootstrap.min.css'); ?>">
  <script rel="stylesheet" src="<?php echo base_url('/bootstrap/bootstrap.bundle.min.js'); ?>"></script>
  <link rel="stylesheet" href="<?php echo base_url('/swt/sweetalert2.min.css'); ?>">
  <script rel="stylesheet" src="<?php echo base_url('/swt/sweetalert2.all.min.js'); ?>"></script>
  <script src="<?php echo base_url(); ?>/css/jquery-3.6.0.js"></script>
  <meta charset="utf-8" />
  
</head>

<header>
  <a href="http://localhost/proyecto/public/principal"><img src="<?php echo base_url('/img/logo.png'); ?>"></a>
  <div class="titulos">

    <h1 id ="titulo"><?php echo $titulo; ?></h1>
    <h4 id ="nombret"><?php echo $nombre; ?></h4>
    <img id="lineas" src="<?php echo base_url('/img/lineas.png'); ?>">
    <img id="lineas1" src="<?php echo base_url('/img/lineas.png'); ?>">

  </div>

  <a href="https://oferta.senasofiaplus.edu.co/sofia-oferta/"><img src="<?php echo base_url('/img/senablanco.png'); ?>"></a>

</header>

<body>
  <nav class="navbar navbar-expand-lg navbar-light " id="menu" style="padding-left: 2rem">
    <div class="container-fluid" >
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="indices" >
        <ul class="navbar-nav" >
          <li class="nav-item dropdown" >
            <a onMouseOver="this.style.cssText='color: #00074A'" onMouseOut="this.style.cssText='color: #FFFFFF'" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #FFFFFF; ">
              Ubicacion   <img id="ubi" src="<?php echo base_url('/img/ubicacion.png'); ?>">
            </a>
            <ul class="dropdown-menu" style="background: #6095BC; border: 1px solid #00074A; width: 230px; height: 150px; font-family: 'Amaranth'; font-style: normal; font-size: 25px; left: -46px ">
              <li><a onMouseOver="this.style.cssText='background: #004A80; color: #FFFFFF'" onMouseOut="this.style.cssText='color: #FFFFFF'" class="dropdown-item"  style="color: #FFFFFF;" href="<?php echo base_url('/paises'); ?>">Paises <img id="pai" src="<?php echo base_url('/img/paises.png'); ?>"></a></li>
              <li><a onMouseOver="this.style.cssText='background: #004A80; color: #FFFFFF'" onMouseOut="this.style.cssText='color: #FFFFFF'" class="dropdown-item"  style="color: #FFFFFF;" href="<?php echo base_url('/departamentos'); ?>">Departamentos <img id="dpo" src="<?php echo base_url('/img/departamento.png'); ?>"></a></li>
              <li><a onMouseOver="this.style.cssText='background: #004A80; color: #FFFFFF'" onMouseOut="this.style.cssText='color: #FFFFFF'" class="dropdown-item"  style="color: #FFFFFF;" href="<?php echo base_url('/municipios'); ?>">Municipios <img id="mun" src="<?php echo base_url('/img/municipio.png'); ?>"></a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a  onMouseOver="this.style.cssText='color: #00074A'" onMouseOut="this.style.cssText='color: #FFFFFF'" class="nav-link" style="color: #FFFFFF;" href="<?php echo base_url('/cargos'); ?>" tabindex="-1">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Cargos <img id="tare" src="<?php echo base_url('/img/tareas.png'); ?>"></a>
          </li>
          <li class="nav-item dropdown">
            <a  onMouseOver="this.style.cssText='color: #00074A'" onMouseOut="this.style.cssText='color: #FFFFFF'" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #FFFFFF;">
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Empleados <img id="emple" src="<?php echo base_url('/img/empleados.png'); ?>">
            </a>
            <ul class="dropdown-menu" style="background: #6095BC; border: 1px solid #00074A; width: 210px; height: 100px; font-family: 'Amaranth'; font-style: normal; font-size: 25px; left: 60px">
              <li><a onMouseOver="this.style.cssText='background: #004A80; color: #FFFFFF'" onMouseOut="this.style.cssText='color: #FFFFFF'" class="dropdown-item"  style="color: #FFFFFF;" href="<?php echo base_url('/empleados'); ?>">Administrar <img id="admin" src="<?php echo base_url('/img/admin.png'); ?>"></a></li>
              <li><a onMouseOver="this.style.cssText='background: #004A80; color: #FFFFFF'" onMouseOut="this.style.cssText='color: #FFFFFF'" class="dropdown-item"  style="color: #FFFFFF;" href="<?php echo base_url('/salarios'); ?>">Salarios <img id="sala" src="<?php echo base_url('/img/salario.png'); ?>"></a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</body>
<!-- <foother>
</foother> -->
<?php
/* $misParametros = $_GET;
echo "<pre>";
print_r($misParametros);
echo "</pre>"; */

require_once "classes/Vino.php";

$secciones_validas = [
  "envios" => [
    "titulo" => "Información de envios"
  ],
  "home" => [
    "titulo" => "Bienvenidos"
  ],
  "quienes_somos" => [
    "titulo" => "Sobre Nosotros"
  ],
  "vinos" => [
    "titulo" => "Nuestros Vinos"
  ],
  "producto" => [
    "titulo" => "Detalle de producto"
  ],
  "por_uva" => [
    "titulo" => "Selección por uva"
  ],
  "catalogo_completo" => [
    "titulo" => "Todos nuestros productos"
  ],
  "formulario" => [
    "titulo" => "Formulario"
  ],
  "datos_formulario" => [
    "titulo" => "Datos"
  ],
  "por_precio" => [
    "titulo" => "Seleccíon por precio"
  ],
  "datos_del_alumno" => [
    "titulo" => "Datos del alumno"
  ]
];

$seccion = $_GET['sec'] ?? 'home';

if (array_key_exists($seccion, $secciones_validas)) {
  $vista = $seccion;
  $titulo = $secciones_validas[$seccion]['titulo'];
} else {
  $vista = "404";
  $titulo = "404 Pagina no encontrada";
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> El buen vino :: <?= $titulo ?></title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  <link rel="stylesheet" href="css/style.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@700&family=Outfit:wght@300&family=Source+Code+Pro&display=swap" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@700&family=Outfit:wght@300&family=Roboto+Condensed:wght@300&family=Source+Code+Pro&display=swap" rel="stylesheet">

</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light encabezado">
    <div class="container-fluid">
      <a class="navbar-brand ms-3" href="index.php?sec=home"><img id="logo" src="images/home/icon.png"></a>
      <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon bg-light"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link text-light" href="index.php?sec=home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="index.php?sec=quienes_somos">¿Quienes somos?</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="index.php?sec=catalogo_completo">Todos nuestros productos</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Nuestras bodegas
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="index.php?sec=vinos&bod=nieto_senetiner">Niesto Senetiner</a></li>
              <li><a class="dropdown-item" href="index.php?sec=vinos&bod=etchart">Etchart</a></li>
              <li><a class="dropdown-item" href="index.php?sec=vinos&bod=salentein">Salentein</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="index.php?sec=envios">Envios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="index.php?sec=formulario">Contactanos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="index.php?sec=datos_del_alumno">Datos del alumno</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>



  <main>

    <?php
    require_once (file_exists("views/$vista.php")) ? "views/$vista.php" : "views/404.php";
    ?>

  </main>

  <footer class="text-light mt-5 encabezado">

    <div class="container-fluid">

      <div class="row p-3">
        <div class="col-xs-12 col-md-6 col-lg-3 ps-3">
          <div>
          <a class="navbar-brand" href="index.php?sec=home"><img id="logo" src="images/home/icon.png"></a>
          </div>
        </div>

        <div class="col-xs-12 col-md-6 col-lg-6">
          <ul class="text-center">
            <li class="list-group-item fw-bold">Martin Vicens</li>
            <li class="list-group-item fw-bold">Programacion 2</li>
            <li class="list-group-item ">© copyright 2023</li>
          </ul>
        </div>

        <div class="col-xs-12 col-md-12 col-lg-3">
          <ul class="lista_redes">
            <li><a href="http://www.instagram.com/martin.vicens/" target="_blank" rel="noopener noreferrer"><img src="./images/redes/instagram.png" alt="logo de instagram"></a></li>
            <li><a href="http://www.linkedin.com/in/martin-vicens-457bba146/" target="_blank" rel="noopener noreferrer"><img src="./images/redes/linkedin.png" alt="logo de linkedin"></a></a></li>
            <li><a href="http://https://web.whatsapp.com/" target="_blank" rel="noopener noreferrer"><img src="./images/redes/whatsapp.png" alt="logo de whatsapp"></a></a></li>
          </ul>
        </div>
      </div>
      
    </div>


  </footer>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>
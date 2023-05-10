<?php

$uvaseleccionada = $_GET['uva'] ?? false;

$titulo = ucwords(str_replace("_", " ", $uvaseleccionada));

$miObjetoVino = new Vino();
$catalogouva = $miObjetoVino->catalogo_x_variedad($uvaseleccionada);

?>

<section>

<div>
    <h1 class="text-center mb-5 fw-bold titulo-home mb-3"> Vinos <?=  $titulo ?></h1>
</div>
    <div class="container">

    <div class="btn-group desplegable_uva">
  <button class="btn btn-secondary btn-sm dropdown-toggle " type="button" data-bs-toggle="dropdown" aria-expanded="false">
    Filtra por uva
  </button>
  <ul class="dropdown-menu lista_desplegable">
  <li><a class="dropdown-item" href="index.php?sec=catalogo_completo">Catalogo Completo</a></li>
  <li><a class="dropdown-item" href="index.php?sec=por_uva&uva=malbec">Malbec</a></li>
                  <li><a class="dropdown-item" href="index.php?sec=por_uva&uva=cabernet">Cabernet</a></li>
                  <li><a class="dropdown-item" href="index.php?sec=por_uva&uva=merlot">Merlot</a></li>
                  <li><a class="dropdown-item" href="index.php?sec=por_uva&uva=blend">Blend</a></li>
                  <li><a class="dropdown-item" href="index.php?sec=por_uva&uva=sauvignon_blanc">Sauvignon Blanc</a></li>
                  <li><a class="dropdown-item" href="index.php?sec=por_uva&uva=tempranillo">Tempranillo</a></li>
  </ul>
</div>


        <?php if (!empty($catalogouva)) { ?>

    
        <div class="row">              
                <?php foreach ($catalogouva as $vino) { ?> 

                <div class="col-sm cajasVinos">
                        
                    <div class="card mb-3" style="width: 19rem;">
                            <img src="images/<?= $vino->getFoto() ?>" class="card-img-top" alt="<?= $vino->nombre_vino() ?>">
                        <div class="card-body">
                            <div class="card-body">
                                <h5 class="card-title fw-bold"> <?= $vino->nombre_vino() ?> </h5>
                                <p class="card-text"> <?= $vino->recortar_texto()?> </p>
                            </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><span class="fw-bold">Año:</span> <?= $vino->getAño() ?></li>
                                    <li class="list-group-item"><span class="fw-bold">Variedad:</span> <?=$vino->variedad_vino() ?></li>
                                    <li class="list-group-item"><span class="fw-bold">Origen:</span> <?= $vino->getOrigen() ?></li>
                                </ul>

                            <div class="card-body">
                                <div class="fs-4 mb-3 fw-bold text-center text-dark">$<?= $vino->formato_precio() ?></div>
                                <a href="index.php?sec=producto&id=<?= $vino->getId() ?>" class="btn btn-dark w-100">VER MÁS</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <?php } ?>
        </div>

        <?php } else { ?>
            <div class="row">
                <div class="col-12 text-center h1">PRODUCTO NO ENCONTRADO</div>
            </div>
        <?php } ?>

    </div>
    </section>
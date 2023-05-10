<?php
/*  $bodegaseleccionada = isset($_GET['mar']) ? $_GET['mar'] : false; */
$bodegaseleccionada = $_GET['bod'] ?? false;
$titulo = strtoupper(str_replace("_", " ", $bodegaseleccionada));


$miObjetoVino = new Vino();
/* ahora mi catalogo filtrado por bodega lo traigo a travez de una funcion */
$catalogo = $miObjetoVino->catalogo_x_bodega($bodegaseleccionada);

?>
<section></section>
<div>
    <h1 class="text-center mb-5 fw-bold titulo-home mb-3"> Bodega <?=  $titulo ?></h1>
</div>


    <div class="container">

        <?php if (!empty($catalogo)) { ?>

    
        <div class="row">
               
                <?php foreach ($catalogo as $vino) { ?> 

                <div class="col-sm">
                        
                <!-- si yo pongo $vino ['nombre de indice'] me trae la info del mismo -->
                <div class="cajas">
                <div class="card mb-3" style="width: 19rem;">
                            <img src="images/<?= $vino->getFoto() ?>" class="card-img-top" alt="<?= $vino->nombre_vino() ?>">
                        <div class="card-body">
                            <div class="card-body">
                                <h5 class="card-title fw-bold"> <?= $vino->nombre_vino() ?> </h5>
                                <p class="card-text"><?= $vino->recortar_texto() ?></p>
                            </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><span class="fw-bold">Año:</span> <?= $vino->getAño() ?></li>
                                    <li class="list-group-item"><span class="fw-bold">Variedad:</span> <?= $vino->variedad_vino() ?></li>
                                    <li class="list-group-item"><span class="fw-bold">Origen:</span> <?= $vino->getOrigen() ?></li>
                                </ul>

                            <div class="card-body">
                                <div class="fs-4 mb-3 fw-bold text-center text-dark">$<?= $vino->formato_precio() ?></div>
                                <a href="index.php?sec=producto&id=<?= $vino->getId() ?>" class="btn btn-dark w-100">VER MÁS</a>
                            </div>
                            
                        </div>
                    </div>
                </div>

                </div>
                <?php } ?>
        </div>

        <?php } else { ?>
            <div class="row">
                <div class="col-12 text-center h1">BODEGA INEXISTENTE</div>
            </div>
        <?php } ?>

    </div>



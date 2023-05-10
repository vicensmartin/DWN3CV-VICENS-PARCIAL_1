<?php

$rango_precio = $_GET['pre'] ?? false;

$titulo = $rango_precio;
$miObjetoVino = new Vino();
$catalogo_precio = is_numeric($rango_precio) ? $miObjetoVino->catalogo_x_precio($rango_precio) : null;

?>

<section class="container">

<div>
    <h1 class="text-center mb-5 fw-bold titulo-home mb-3">Nuestra selección de vinos por precio</h1>
    <p class="text-center mb-5 titulo-home mb-3">Aqui los vinos que valen menos de $<?= $titulo ?></p>
</div>

<div class="btn-group desplegable_uva">
    <button class="btn btn-secondary btn-sm dropdown-toggle " type="button" data-bs-toggle="dropdown" aria-expanded="false">
        Filtra por precio</button>
    <ul class="dropdown-menu lista_desplegable">
        <li><a class="dropdown-item" href="index.php?sec=catalogo_completo">Catalogo Completo</a></li>
        <li><a class="dropdown-item" href="index.php?sec=por_precio&pre=2000">Menos de $2000</a></li>
        <li><a class="dropdown-item" href="index.php?sec=por_precio&pre=3000">Menos de $3000</a></li>
        <li><a class="dropdown-item" href="index.php?sec=por_precio&pre=4000">Menos de $4000</a></li>
        <li><a class="dropdown-item" href="index.php?sec=por_precio&pre=5000">Menos de $5000</a></li>
        <li><a class="dropdown-item" href="index.php?sec=por_precio&pre=6000">Menos de $6000</a></li>
    </ul>
</div>


<div class="container">


    <?php if (!empty($catalogo_precio)) { ?>


        <div class="row">
            <?php foreach ($catalogo_precio as $vino) { ?>

                <div class="col-sm ms-2 cajasVinos">

                    <div class="card mb-3" style="width: 19rem;">
                        <img src="images/<?= $vino->getFoto() ?>" class="card-img-top" alt="<?= $vino->nombre_vino() ?>">
                        <div class="card-body">
                            <div class="card-body">
                                <h5 class="card-title fw-bold"> <?= $vino->nombre_vino() ?> </h5>
                                <p class="card-text"> <?= $vino->recortar_texto() ?> </p>
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
            <?php } ?>
        </div>

    <?php } else { ?>
        <div class="row">
            <div class="col-12 text-center h1">PRODUCTO NO ENCONTRADO</div>
        </div>
    <?php } ?>

</div>

</div>

</section>
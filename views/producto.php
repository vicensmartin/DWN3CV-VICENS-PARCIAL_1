<?php

$idSeleccionado = $_GET['id'] ?? false;
$miObjetoVino = new Vino();
$vino = $miObjetoVino->producto_x_id($idSeleccionado);

?>


    <section class=" d-flex justify-content-center p-5">
    <div>
        <div class="container">

            <div class="row">

                <?PHP if ($vino) { ?>
                    <div class="col">
                        <div class="card mb-5">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="images/<?= $vino->getFoto() ?>" class="img-fluid rounded-center col-md-10" alt="<?= $vino->nombre_vino() ?>">
                                </div>
                                <div class="col-md-8 d-flex flex-column p-3">
                                    <div class="card-body flex-grow-0">
                                        <p class="fs-4 m-0 fw-bold text-dark"><?= $vino->nombre_vino() ?></p>
                                        
                                        <p class="card-text"><?= $vino->getNotas() ?></p>
                                    </div>

                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><span class="fw-bold">Variedad:</span> <?= $vino->variedad_vino() ?></li>
                                        <li class="list-group-item"><span class="fw-bold">Año:</span> <?= $vino->getAño() ?> </li>
                                        <li class="list-group-item"><span class="fw-bold">Origen:</span> <?= $vino->getOrigen() ?></li>
                                        <li class="list-group-item"><span class="fw-bold">Apelación:</span> <?= $vino->getApelacion() ?></li>
                                        <li class="list-group-item"> <?= $vino->getCrianza() ?></li>
                                    </ul>

                                    <div class="card-body flex-grow-0 mt-auto">
                                        <div class="fs-3 mb-3 fw-bold text-center text-dark">$<?= $vino->formato_precio() ?></div>
                                        <a href="#" class="btn btn-dark w-100 fw-bold">COMPRAR</a>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>




                    <?php } else { ?>
                        <div class="row">
                        <div class="col-12 text-center h1">PRODUCTO NO ENCONTRADO</div>
                        </div>
                    <?php } ?>



            </div>
        </div>

    </div>
</section>

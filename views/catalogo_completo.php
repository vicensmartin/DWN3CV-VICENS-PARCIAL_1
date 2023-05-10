<?php

$catalogoCompleto = $_GET['sec'] ?? false;


$miObjetoVino = new Vino();
$catalogo = $miObjetoVino->catalogo_completo(5000);

?>

<section class="container">

<h1 class="text-center mb-5 fw-bold titulo-home">Nuestro catálogo completo</h1>

<div class="btn-group desplegable_uva">
    <div class="me-3">  
        <button class="btn btn-secondary btn-sm dropdown-toggle " type="button" data-bs-toggle="dropdown" aria-expanded="false">
        Filtra por uva</button>
        <ul class="dropdown-menu lista_desplegable">
        <li><a class="dropdown-item" href="index.php?sec=por_uva&uva=malbec">Malbec</a></li>
        <li><a class="dropdown-item" href="index.php?sec=por_uva&uva=cabernet">Cabernet Sauvignon</a></li>
        <li><a class="dropdown-item" href="index.php?sec=por_uva&uva=merlot">Merlot</a></li>
        <li><a class="dropdown-item" href="index.php?sec=por_uva&uva=blend">Blend</a></li>
        <li><a class="dropdown-item" href="index.php?sec=por_uva&uva=sauvignon_blanc">Sauvignon Blanc</a></li>
        <li><a class="dropdown-item" href="index.php?sec=por_uva&uva=tempranillo">Tempranillo</a></li>
        </ul>
    </div>

    <div class="ms-3">
        <button class="btn btn-secondary btn-sm dropdown-toggle " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Filtra por precio</button>
            <ul class="dropdown-menu lista_desplegable">
                <li><a class="dropdown-item" href="index.php?sec=por_precio&pre=2000">Menos de $2000</a></li>
                <li><a class="dropdown-item" href="index.php?sec=por_precio&pre=3000">Menos de $3000</a></li>
                <li><a class="dropdown-item" href="index.php?sec=por_precio&pre=4000">Menos de $4000</a></li>
                <li><a class="dropdown-item" href="index.php?sec=por_precio&pre=5000">Menos de $5000</a></li>
            </ul>
    </div>
            

</div>


<?php if (!empty($catalogo)) { ?>


<div class="row">              
        <?php foreach ($catalogo as $vino) { ?> 

        <div class="col-sm">
                
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
        <?php } ?>
</div>

<?php } else { ?>
    <div class="row">
        <div class="col-12 text-center h1"> NO SE ENCONTRARON PRODUCTOS</div>
    </div>
<?php } ?>

</section>
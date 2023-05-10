<?php

$bodegas_form = [
    "nieto_senetiner" => "nieto_senetiner",
    "salentein" => "salentein",
    "etchart" => "etchart",
];

?>



<section class="container">

    <div>
        <h1 class="text-center mb-5 fw-bold titulo-home mb-3">Llena este formulario y participa por nuestros premios semanales</h1>
    </div>

    <form class="row justify-content-start p-auto fomulario" action="index.php?sec=datos_formulario" method="POST">
        <div class="row mb-3">
            <div class="col-md-6 mb-3">
                <h3>Llena con tus datos</h3>

                <div class="mt-3">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese su nombre completo">
                </div>

                <div class="mt-3">
                    <label for="apellido">Apellido:</label>
                    <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Ingrese su apellido">
                </div>

                <div class="form-group mt-3">
                    <label for="fecha">Fecha de nacimiento:</label>
                    <input type="date" class="form-control" id="fecha" name="fecha">
                </div>

                <div class="form-group mt-3">
                    <label for="email">Correo electrónico:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>


            </div>

            <div class="col-md-6">
                <div class="col-md-12 ms-4 me-4">
                    <h3>Elegí la o las bodegas que mas te gusten</h3>
                    <?PHP foreach ($bodegas_form as $indice => $nombre) { ?>
                        <div class="mt-3">
                            <input type="checkbox" class="form-check-input" id="check_<?= $indice ?>" name="bodega_selec[]" value="<?= $nombre ?>">
                            <label class="form-check-label" for="check_<?= $indice ?>"><?= ucwords(str_replace("_", " ", $nombre)); ?></label>
                        </div>
                    <?PHP } ?>
                </div>
            </div>

            <div>
                <button type="submit" class="btn btn-secondary col-12 mb-3 me-4 ms-4 mt-4">Enviar</button>
            </div>
        </div>
    </form>
</section>
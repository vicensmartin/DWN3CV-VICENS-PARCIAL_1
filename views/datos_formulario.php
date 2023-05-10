<?PHP 


$bodega = $_POST['bodega_selec'];

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$nacimiento = $_POST['fecha'];
$mail = $_POST['email'];

?>

    <section class="respuestaUsuario m-5">



<p>El/a cliente,<span class="fw-bold"> <?=$nombre?> <?=$apellido?>, </span> nacido en <span class="fw-bold"><?=$nacimiento?>.</span> </p>
<p>Mail: <span class="fw-bold"><?=$mail?></span> eligio la/s siguientes bodegas:</p>

<?PHP if (!empty($bodega)) {?>
<?PHP foreach ($bodega as $x) {?>
                    <div>
                        <ul>
                            <li>
                            <?= ucwords(str_replace("_", " ", $x)) ?>
                            </li>
                        </ul>
                    </div>
                    <?PHP } ?>
                    <?php } else { ?>
            <div class="row">
                <div class="col-12 text-center h5"> NO SELECCIONO NINGUNA BODEGA</div>
            </div>
        <?php } ?>
       
    </section>
    

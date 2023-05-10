<?php

class Vino
{
    private $bodega;
    private $variedad;
    private $origen;
    private $id;
    private $nombre;
    private $año;
    private $apelacion;
    private $crianza;
    private $notas;
    private $foto;
    private $precio;



    /**
     * Devuelve el catalogo completo
     * @return array Un array con el catalogo completo
     */
    public function catalogo_completo(): array
    {

        $catalogo = [];
        $catalogoJson = file_get_contents("datos/productos.json");
        $resultado = json_decode($catalogoJson);

        foreach ($resultado as $value) {
            $vino = new self();

            $vino->bodega = $value->bodega;
            $vino->variedad = $value->variedad;
            $vino->origen = $value->origen;
            $vino->id = $value->id;
            $vino->nombre = $value->nombre;
            $vino->año = $value->año;
            $vino->apelacion = $value->apelacion;
            $vino->crianza = $value->crianza;
            $vino->notas = $value->notas;
            $vino->foto = $value->foto;
            $vino->precio = $value->precio;

            $catalogo[] = $vino;
        }

        return $catalogo;
    }


    /**
     * Devuelve el catalogo de productos de una bodega en particular
     * @param string $bodega Un string con el nombre de la bodega a buscar
     * @return Vino[] Un Array lleno de instancias de objeto Vino.
     */
    public function catalogo_x_bodega(string $bodega): array
    {
        $resultado = [];
        $catalogo = $this->catalogo_completo();

        foreach ($catalogo as $p) {
            if ($p->bodega == $bodega) {
                $resultado[] = $p;
            }
        }
        return $resultado;
    }


    /**
     * Devuelve el catalogo de productos de una variedad de vinos en particular
     * @param string $variedad Un string con el nombre de la uva a buscar
     * @return Vino[] Un Array lleno de instancias de objeto Vino.
     */
    public function catalogo_x_variedad(string $variedad): array
    {
        $resultado = [];
        $catalogo = $this->catalogo_completo();

        foreach ($catalogo as $p) {
            if ($p->variedad == $variedad) {
                $resultado[] = $p;
            }
        }
        return $resultado;
    }


    /**
     * Devuelve el catalogo de productos de vinos por rango de precios
     * @param mixed $precio Un int con el precio mayor dispuesto a buscar / pagar
     * @return Vino[] Un Array lleno de instancias de objeto Vino.
     */
    public function catalogo_x_precio(mixed $precio): array
    {
        $resultado = [];
        $catalogo = $this->catalogo_completo();
        
        if (is_numeric($precio)) {
            foreach ($catalogo as $p) {
                if ($p->precio < $precio) {
                    $resultado[] = $p;
                }
            } return $resultado;
        }
    }


    /**
     *  Devuelve los datos de un producto en particular
     * @param mixed $idproducto Es el id unico del producto a mostrar, en este caso mixed para evitar inconvenientes en la url si la cambian y ponen un string
     * 
     * @return ?Vino esto devuelve un objeto vino o null
     */
    public function producto_x_id(mixed $idproducto): ?Vino
    {
        $catalogo = $this->catalogo_completo();

        if (is_numeric($idproducto)) {
            foreach ($catalogo as $p) {
                if ($p->id == $idproducto) {
                    return $p;
                }
            }
        }
        return null;
    }


    /**
     * Devuelve el nombre del vino
     * 
     */
    public function nombre_vino(): string
    {
        return $this->nombre. " ". $this->variedad_vino();
    }


    /**
     * Devuelve la variedad del vino
     * 
     */
    public function variedad_vino(): string
    {
        return ucwords(str_replace("_", " ", ($this->variedad)));
    }


    /**
     * Devuelve el precio de cada producto con el formato correcto
     */
    public function formato_precio(): string
    {
        return number_format($this->precio, 2, ",", ".");
    }


    /**
     *Esta funcion devuelve las primeras X palabras de un parrafo.
     *@param int $cantidad Esta es la cantidad de palabras a extraer (opcional).
     *
     * */
    public function recortar_texto(int $cantidad = 15): string
    {

        $texto = $this->notas;

        $miArray = explode(" ", $texto);
        if (count($miArray) <= $cantidad) {
            $resultado = $texto;
        } else {
            array_splice($miArray, $cantidad);
            $resultado = implode(" ", $miArray) . "...";
        }

        return $resultado;
    }





    /**
     * Get the value of bodega
     */
    public function getBodega()
    {
        return $this->bodega;
    }

    /**
     * Get the value of variedad
     */
    public function getVariedad()
    {
        return $this->variedad;
    }

    /**
     * Get the value of origen
     */
    public function getOrigen()
    {
        return $this->origen;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Get the value of año
     */
    public function getAño()
    {
        return $this->año;
    }

    /**
     * Get the value of apelacion
     */
    public function getApelacion()
    {
        return $this->apelacion;
    }

    /**
     * Get the value of crianza
     */
    public function getCrianza()
    {
        return $this->crianza;
    }

    /**
     * Get the value of notas
     */
    public function getNotas()
    {
        return $this->notas;
    }

    /**
     * Get the value of foto
     */
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * Get the value of precio
     */
    public function getPrecio()
    {
        return $this->precio;
    }
}

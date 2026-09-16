<?php

session_start();

$servicios_disponibles = [
    "Diagnostico" =>[
        "codigo" => "d1010",
        "nombre" => "diagnostico",
        "categoria" => "limpieza",
        "precio" => 20,
        "tiempo_estimado" => "1 horas"
    ],
    "Instalacion_SO" =>[
        "codigo" => "SO1010",
        "nombre" => "instalacion_so",
        "categoria" => "actualizacion",
        "precio" => 30,
        "tiempo_estimado" => "5 horas"
    ]

]


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>TAller de Reparaciones y Mantenimiento de Computadoras</h1>

<div class="contendor_formulario">
    <form action="" method="post">
        <div class="campo">
            <label for="">Nombre Cliente</label>
            <input type="text" name="nombre_cliente">
        </div>
        <div class="campo">
            <label for="">Correo Electronico</label>
            <input type="text" name="correo_cliente">
        </div>
        <div class="campo">
            <label for="">Tipo de Equipo</label>
            <input type="text" name="tipo_equipo">
        </div>
        <div class="campo">
            <label for="">marca</label>
            <input type="text" name="marca">
        </div>
        <div class="campo">
            <label for="">Descipcion</label>
            <input type="text" name="descripcion">
        </div>
        <div class="campo">
            <label for="">Servicios</label>
            <select name="servicios" id="">
                <option value="">Seleccione un Servicio</option>

                <?php foreach($servicios_disponibles as $clave => $valor): ?>
                    <option value="<?= $clave ?>"> 
                        <?= $valor["nombre"] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
    </form>

</div>
    
</body>
</html>
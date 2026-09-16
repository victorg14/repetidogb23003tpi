<?php

session_start();

$error=[];

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

];

$_SESSION["registro_servivios"] ??=[];

if($_SERVER["REQUEST_METHOD"]=== "POST"){
    $nombre =  limpiar_cadena($_POST["nombre_cliente"]);
    $correo = limpiar_cadena($_POST["correo_cliente"]);
    $tipo_equipo = limpiar_cadena($_POST["tipo_equipo"]);
    $marca = limpiar_cadena($_POST["marca"]);
    $descripcion = limpiar_cadena($_POST["descripcion"]);
    $servicios = limpiar_cadena($_POST["servicios"]);

    if($nombre === ""){
        $error[] ="el campo nombre no debe estar vacio";
    }
    if($correo === ""){
        $error[] ="el campo correo no debe estar vacio";
    }

    if($tipo_equipo === ""){
        $error[] ="el campo tipo  no debe estar vacio";
    }

    if($marca === ""){
        $error[] ="el campo nombre no debe estar vacio";
    }
    if($descripcion === ""){
        $error[] ="el campo descripcon no debe estar vacio";
    }
    

    if(empty($error)){
        $_SESSION["registro_servicios"][]=[
            "nombre" => $nombre,
            "correo" => $correo,
            "tipo_equipo" => $tipo_equipo,
            "marca" => $marca,
            "descipcion" => $descripcion,
            "servicios" => $servicios



        ];
        
    }
    header("Location: index.php");
    exit();
    

}


function limpiar_cadena($valor){
    return trim($valor);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .contendor_formulario{
            background-color: #b49797;
        }
    </style>
</head>
<body>
    <h1>TAller de Reparaciones y Mantenimiento de Computadoras</h1>

<div class="contendor_formulario">
    <form action="" method="post">
        <div class="campo">
            <label for="">Nombre Cliente</label>
            <input type="text" name="nombre_cliente" required>
        </div>
        <div class="campo">
            <label for="">Correo Electronico</label>
            <input type="text" name="correo_cliente" required>
        </div>
        <div class="campo">
            <label for="">Tipo de Equipo</label>
            <input type="text" name="tipo_equipo" required
        </div>
        <div class="campo">
            <label for="">marca</label>
            <input type="text" name="marca" required>
        </div>
        <div class="campo">
            <label for="">Descipcion</label>
            <input type="text" name="descripcion" required>
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
        <button class="btn_registrar">Registrar</button>
    </form>

</div>
<div class="datos_recibidos">
    <Table border="5">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>tipo equipo</th>
                <th>marca</th>
                <th>descripcion</th>
                <th>servicios</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($_SESSION["registro_servicios"] as $clientes):?>
                <tr> 
                    <td><?= htmlspecialchars($clientes["nombre"]) ?></td>
                    <td><?= htmlspecialchars($clientes["correo"]) ?></td>
                    <td><?= htmlspecialchars($clientes["tipo_equipo"]) ?></td>
                    <td><?= htmlspecialchars($clientes["marca"]) ?></td>
                    <td><?= htmlspecialchars($clientes["descripcion"]) ?></td>
                    <td><?= htmlspecialchars($clientes["servicios"]) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </Table>
</div>
    
</body>
</html>
<?php
// Obtener las fechas de inicio y fin del formulario
$fechaInicio = $_POST['fecha_inicio'];
$fechaFin = $_POST['fecha_fin'];

echo $fechaInicio;
echo $fechaFin;

$tabla = "";
$campos = "facturas.factura_fecha, facturas.factura_numero, facturas.total_venta, facturas.factura_estado, clientes.cliente_nombre, clientes.cliente_ruc";

// Consulta SQL para obtener los datos filtrados por fecha
$consulta_datos = "SELECT $campos FROM facturas INNER JOIN clientes ON facturas.cliente_id = clientes.cliente_id WHERE facturas.factura_fecha BETWEEN '$fechaInicio' AND '$fechaFin' ORDER BY facturas.factura_fecha DESC LIMIT $inicio, $registros";

$conexion=con();
$datos = $conexion->query($consulta_datos);
$datos = $datos->fetchAll();

$tabla.='
    <div class="table-container">
        <table class="table is-fullwidth">
            <thead>
                <tr class="has-text-centered">
                    <th class="has-text-centered">#</th>
                    <th class="has-text-centered">Fecha</th>
                    <th class="has-text-centered">Factura</th>
                    <th class="has-text-centered">Total Venta</th>
                    <th class="has-text-centered">RUC</th>
                    <th class="has-text-centered">Cliente</th>
                    <th class="has-text-centered">Estado</th>
                    <th colspan="2" class="has-text-centered">Opciones</th>
                </tr>
            </thead>
            <tbody>

';

if($total>=1 && $pagina <= $Npaginas){
    
    $contador = $inicio+1;//contador de usuarios
    $pag_inicio=$inicio+1;//ej: mostrando usuario 1 al 7

    foreach($datos as $fact){
        $precio_entero = number_format($fact["total_venta"], 0, ',', '.');//format precio
        $fecha_obj = new DateTime($fact["factura_fecha"]);//format fecha
        $fechaES = $fecha_obj->format('d-m-Y');
        $tabla.='
                <tr class="has-text-centered" >
                    <td>'.$contador.'</td>
                    <td>'.$fechaES.'</td>
                    <td>'.$fact["factura_numero"].'</td>
                    <td>'.$precio_entero.'</td>
                    <td>'.$fact["cliente_ruc"].'</td>
                    <td>'.$fact["cliente_nombre"].'</td>';
                    $estado = $fact["factura_estado"] == 1 ? "Activo" : "Anulado";
        $tabla.='   
                    <td>'.$estado.'</td>
                    <td>
                        <a href="index.php?vista=client_update&client_id_upd='.$fact["factura_numero"].'" class="button is-success is-rounded is-small">Ver detalle</a>
                    </td>
                    <td>
                        <a href="'.$url.$pagina.'&client_id_del='.$fact["factura_numero"].'" class="button is-danger is-rounded is-small btnDanger">Anular</a>
                    </td>
            </tr>
        ';
        $contador++;
    }
    $pag_final=$contador-1;//ej: mostrando usuario 1 al 7
} else {
    if($total>=1){//si introduce una pagina no existente te muestra boton para llevarte a la pag 1
        $tabla.='
            <tr class="has-text-centered" >
                <td colspan="8">
                    <a href="'.$url.'1" class="button is-link is-rounded is-small mt-4 mb-4">
                        Haga clic para recargar el listado
                    </a>
                </td>
            </tr>
        ';
    } else {
        $tabla.='
            <tr class="has-text-centered" >
                <td colspan="8">
                    No hay registros en el sistema
                </td>
            </tr>';
    }
}

$tabla.='
        </tbody>
    </table>
</div>';

if($total>=1 && $pagina <= $Npaginas){
    $tabla.='
        <p class="has-text-right">Mostrando facturas <strong>'.$pag_inicio.'</strong> al <strong>'.$pag_final.'</strong> de un <strong>total de '.$total.'</strong></p>
    ';
    }

$conexion=null;
echo $tabla;
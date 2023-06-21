<div class="container is-fluid mb-6">
    <h1 class="title">Proveedores</h1>
    <h2 class="subtitle">Lista de proveedores</h2>
</div>

<div class="container pb-6 pt-6">

<?php 
    require_once("./php/main.php");

    //ELIMINAR USUARIOS
    if(isset($_GET["prov_id_del"])){
        require_once("./php/provee_eliminar.php");
    }
    
    if(!isset($_GET["page"])){
        $pagina = 1;
    } else {
        $pagina = (int)$_GET["page"];
        if($pagina<=1){
            $pagina = 1;//controlar que siempre sea 1
        }
    }

    $pagina = limpiar_cadena($pagina);
    $url= "index.php?vista=provee_list&page=";
    $registros=15;//cantidad de registros por pagina
    $busqueda="";//de proveedores
    require_once("./php/provee_lista.php");

?>

</div>
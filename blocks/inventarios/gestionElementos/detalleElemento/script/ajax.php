<?php
/**
 *
 * Los datos del bloque se encuentran en el arreglo $esteBloque.
 */

// URL base
$url = $this->miConfigurador->getVariableConfiguracion ( "host" );
$url .= $this->miConfigurador->getVariableConfiguracion ( "site" );

$urlDirectorio=$url;

$urlDirectorio =$urlDirectorio."/plugin/scripts/javascript/dataTable/Spanish.json";

$url .= "/index.php?";

// Variables
$cadenaACodificar = "pagina=" . $this->miConfigurador->getVariableConfiguracion ( "pagina" );
$cadenaACodificar .= "&procesarAjax=true";
$cadenaACodificar .= "&action=index.php";
$cadenaACodificar .= "&bloqueNombre=" . $esteBloque ["nombre"];
$cadenaACodificar .= "&bloqueGrupo=" . $esteBloque ["grupo"];
$cadenaACodificar .= $cadenaACodificar . "&funcion=Consulta";
$cadenaACodificar .= "&tiempo=" . $_REQUEST ['tiempo'];

if (isset ( $_REQUEST ['fecha_inicio'] ) && $_REQUEST ['fecha_inicio'] != '') {
	$fechaInicio = $_REQUEST ['fecha_inicio'];
} else {
	$fechaInicio = '';
}

if (isset ( $_REQUEST ['fecha_final'] ) && $_REQUEST ['fecha_final'] != '') {
	$fechaFinal = $_REQUEST ['fecha_final'];
} else {
	$fechaFinal = '';
}

if (isset ( $_REQUEST ['placa'] ) && $_REQUEST ['placa'] != '') {
	$placa = $_REQUEST ['placa'];
} else {
	$placa = '';
}

if (isset ( $_REQUEST ['serie1'] ) && $_REQUEST ['serie1'] != '') {
	$serie = $_REQUEST ['serie1'];
} else {
	$serie = '';
}

$arreglo = array (
		"fecha_inicio"=>$fechaInicio,
		"fecha_final"=>$fechaFinal,
		"placa"=>$placa,
		"serie"=>$serie 
);

$arreglo = serialize ( $arreglo );

$cadenaACodificar .= "&arreglo=" .$arreglo;


// Codificar las variables
$enlace = $this->miConfigurador->getVariableConfiguracion ( "enlace" );
$cadena = $this->miConfigurador->fabricaConexiones->crypto->codificar_url ( $cadenaACodificar, $enlace );


// URL definitiva
$urlFinal = $url . $cadena;
// echo $urlFinal;
?>
<script type='text/javascript'>
$(function() {
         	$('#tablaTitulos').ready(function() {

             $('#tablaTitulos').dataTable( {
             	serverSide: true,
				language: {
                url: "<?php echo $urlDirectorio?>"
            			},
             	processing: true,
                ajax:"<?php echo $urlFinal?>",
                  
             });
                  
         		});

});

</script>
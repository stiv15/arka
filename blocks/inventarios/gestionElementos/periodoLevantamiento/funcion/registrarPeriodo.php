<?php

/*
 * To change this license header, choose License Headers in Project Properties. To change this template file, choose Tools | Templates and open the template in the editor.
 */
$esteBloque = $this->miConfigurador->getVariableConfiguracion ( "esteBloque" );

$rutaBloque = $this->miConfigurador->getVariableConfiguracion ( "raizDocumento" ) . "/blocks/inventarios/";
$rutaBloque .= $esteBloque ['nombre'];
$host = $this->miConfigurador->getVariableConfiguracion ( "host" ) . $this->miConfigurador->getVariableConfiguracion ( "site" ) . "/blocks/inventarios/" . $esteBloque ['nombre'];

$conexion = "inventarios";
$esteRecursoDB = $this->miConfigurador->fabricaConexiones->getRecursoDB ( $conexion );

$resultado = '';

$fechaActual = date ( 'Y-m-d' );

$arreglo = array (
		$_REQUEST ['fecha_inicio_cierre'],
		$_REQUEST ['fecha_fin_cierre'],
		date('Y'),
		date('Y-m-d'),
);


$cadenaSql = $this->sql->cadena_sql ( "Actualizar_Periodos_Anterioes" );

$resultado = $esteRecursoDB->ejecutarAcceso ( $cadenaSql, 'acceso' );



$cadenaSql = $this->sql->cadena_sql ( "registroPeriodo", $arreglo );

$resultado = $esteRecursoDB->ejecutarAcceso ( $cadenaSql, 'acceso' );

// Crear Variables necesarias en los métodos



if ($resultado) {
	$this->funcion->Redireccionador ( 'registroPeriodo', date('Y') );
	exit();
} else {
	$this->funcion->Redireccionador ( 'noregistroPeriodo' );
	exit();
}
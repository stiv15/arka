<?php

namespace inventarios\gestionCompras\registrarElementoOrden\funcion;

use inventarios\gestionCompras\registrarElementoOrden\funcion\redireccion;

include_once ('redireccionar.php');

$ruta_1 = $this->miConfigurador->getVariableConfiguracion ( 'raizDocumento' ) . '/plugin/php_excel/Classes/PHPExcel.class.php';
$ruta_2 = $this->miConfigurador->getVariableConfiguracion ( 'raizDocumento' ) . '/plugin/php_excel/Classes/PHPExcel/Reader/Excel2007.class.php';

include_once ($ruta_1);
include_once ($ruta_2);

if (! isset ( $GLOBALS ["autorizado"] )) {
	include ("../index.php");
	exit ();
}
class RegistradorOrden {
	var $miConfigurador;
	var $lenguaje;
	var $miFormulario;
	var $miFuncion;
	var $miSql;
	var $conexion;
	function __construct($lenguaje, $sql, $funcion) {
		$this->miConfigurador = \Configurador::singleton ();
		$this->miConfigurador->fabricaConexiones->setRecursoDB ( 'principal' );
		$this->lenguaje = $lenguaje;
		$this->miSql = $sql;
		$this->miFuncion = $funcion;
	}
	function procesarFormulario() {
		$conexion = "inventarios";
		$esteRecursoDB = $this->miConfigurador->fabricaConexiones->getRecursoDB ( $conexion );
		
		$fechaActual = date ( 'Y-m-d' );
		
		switch ($_REQUEST ['tipo_registro']) {
			
			case '1' :
				
				foreach ( $_FILES as $key => $values ) {
					
					$archivo [] = $_FILES [$key];
				}
				
				$archivoImagen = $archivo [1];
				
				if ($archivoImagen ['error'] == 0) {
					
					if ($archivoImagen ['type'] != 'image/jpeg') {
						redireccion::redireccionar ( 'noFormatoImagen' );
						exit ();
					}
				}
				
				$cadenaSql = $this->miSql->getCadenaSql ( 'consultar_iva', $_REQUEST ['iva'] );
				
				$valor_iva = $esteRecursoDB->ejecutarAcceso ( $cadenaSql, "busqueda" );
				
				$valor_iva = $valor_iva [0] [0];
				
				$_REQUEST ['total_iva_con'] = round ( $_REQUEST ['total_iva_con'] );
				
				if ($_REQUEST ['id_tipo_bien'] == 1) {
					
					$arreglo = array (
							$fechaActual,
							$_REQUEST ['nivel'],
							$_REQUEST ['id_tipo_bien'],
							$_REQUEST ['descripcion'],
							$_REQUEST ['cantidad'],
							$_REQUEST ['unidad'],
							$_REQUEST ['valor'],
							$_REQUEST ['iva'],
							$_REQUEST ['cantidad'] * $_REQUEST ['valor'],
							$_REQUEST ['cantidad'] * $_REQUEST ['valor'] * $valor_iva,
							round ( $_REQUEST ['cantidad'] * $_REQUEST ['valor'] + $_REQUEST ['cantidad'] * $_REQUEST ['valor'] * $valor_iva ),
							($_REQUEST ['marca'] != '') ? $_REQUEST ['marca'] : null,
							($_REQUEST ['serie'] != '') ? $_REQUEST ['serie'] : null,
							$_REQUEST ['id_orden'] 
					);
					
					$cadenaSql = $this->miSql->getCadenaSql ( 'ingresar_elemento_tipo_1', $arreglo );
					
					$elemento = $esteRecursoDB->ejecutarAcceso ( $cadenaSql, "busqueda" );
				} else if ($_REQUEST ['id_tipo_bien'] == 2) {
					
					$arreglo = array (
							$fechaActual,
							$_REQUEST ['nivel'],
							$_REQUEST ['id_tipo_bien'],
							$_REQUEST ['descripcion'],
							$_REQUEST ['cantidad'] = 1,
							$_REQUEST ['unidad'],
							$_REQUEST ['valor'],
							$_REQUEST ['iva'],
							$_REQUEST ['cantidad'] * $_REQUEST ['valor'],
							$_REQUEST ['cantidad'] * $_REQUEST ['valor'] * $valor_iva,
							round ( $_REQUEST ['cantidad'] * $_REQUEST ['valor'] + $_REQUEST ['cantidad'] * $_REQUEST ['valor'] * $valor_iva ),
							($_REQUEST ['marca'] != '') ? $_REQUEST ['marca'] : null,
							($_REQUEST ['serie'] != '') ? $_REQUEST ['serie'] : null,
							$_REQUEST ['id_orden'] 
					);
					
					$cadenaSql = $this->miSql->getCadenaSql ( 'ingresar_elemento_tipo_1', $arreglo );
					
					$elemento = $esteRecursoDB->ejecutarAcceso ( $cadenaSql, "busqueda" );
				} else if ($_REQUEST ['id_tipo_bien'] == 3) {
					
					if ($_REQUEST ['tipo_poliza'] == 0) {
						$arreglo = array (
								$fechaActual,
								$_REQUEST ['nivel'],
								$_REQUEST ['id_tipo_bien'],
								$_REQUEST ['descripcion'],
								$_REQUEST ['cantidad'] = 1,
								$_REQUEST ['unidad'],
								$_REQUEST ['valor'],
								$_REQUEST ['iva'],
								$_REQUEST ['cantidad'] * $_REQUEST ['valor'],
								$_REQUEST ['cantidad'] * $_REQUEST ['valor'] * $valor_iva,
								round ( $_REQUEST ['cantidad'] * $_REQUEST ['valor'] + $_REQUEST ['cantidad'] * $_REQUEST ['valor'] * $valor_iva ),
								$_REQUEST ['tipo_poliza'],
								NULL,
								NULL,
								($_REQUEST ['marca'] != '') ? $_REQUEST ['marca'] : NULL,
								($_REQUEST ['serie'] != '') ? $_REQUEST ['serie'] : NULL,
								$_REQUEST ['id_orden'] 
						);
					} else if ($_REQUEST ['tipo_poliza'] == 1) {
						$arreglo = array (
								$fechaActual,
								$_REQUEST ['nivel'],
								$_REQUEST ['id_tipo_bien'],
								$_REQUEST ['descripcion'],
								$_REQUEST ['cantidad'] = 1,
								$_REQUEST ['unidad'],
								$_REQUEST ['valor'],
								$_REQUEST ['iva'],
								$_REQUEST ['cantidad'] * $_REQUEST ['valor'],
								$_REQUEST ['cantidad'] * $_REQUEST ['valor'] * $valor_iva,
								round ( $_REQUEST ['cantidad'] * $_REQUEST ['valor'] + $_REQUEST ['cantidad'] * $_REQUEST ['valor'] * $valor_iva ),
								$_REQUEST ['tipo_poliza'],
								$_REQUEST ['fecha_inicio'],
								$_REQUEST ['fecha_final'],
								($_REQUEST ['marca'] != '') ? $_REQUEST ['marca'] : NULL,
								($_REQUEST ['serie'] != '') ? $_REQUEST ['serie'] : NULL,
								$_REQUEST ['id_orden'] 
						);
					}
					
					$cadenaSql = $this->miSql->getCadenaSql ( 'ingresar_elemento_tipo_2', $arreglo );
					
					$elemento = $esteRecursoDB->ejecutarAcceso ( $cadenaSql, "busqueda" );
				}
				
				$datos = array (
						$_REQUEST ['mensaje_titulo'],
						$_REQUEST ['id_orden'],
						$fechaActual ,
						$_REQUEST['arreglo']
				);
				
				//
				foreach ( $_FILES as $key ) {
					
					$archivo [] = $key;
				}
				
				$archivo = $archivo [1];
				
				if ($archivo ['type'] == 'image/jpeg') {
					
					$data = base64_encode ( file_get_contents ( $archivo ['tmp_name'] ) );
					
					$arreglo = array (
							"elemento" => $elemento [0] [0],
							"imagen" => $data 
					);
					
					$cadenaSql = $this->miSql->getCadenaSql ( 'ElementoImagen', $arreglo );
					
					$imagen = $esteRecursoDB->ejecutarAcceso ( $cadenaSql, "busqueda" );
				}
				
				if ($elemento) {
					
					\inventarios\gestionActa\registrarElementoOrden\funcion\redireccion::redireccionar ( 'inserto', $datos );
					
					exit ();
				} else {
					
					\inventarios\gestionActa\registrarElementoOrden\funcion\redireccion::redireccionar ( 'noInserto', $datos );
					
					exit ();
				}
				
				break;
			case '2' :
				{
					
					$esteBloque = $this->miConfigurador->getVariableConfiguracion ( "esteBloque" );
					// ** Ruta a directorio ******
					$rutaBloque = $this->miConfigurador->getVariableConfiguracion ( "raizDocumento" ) . "/blocks/inventarios/gestionCompras/";
					$rutaBloque .= $esteBloque ['nombre'];
					$host = $this->miConfigurador->getVariableConfiguracion ( "host" ) . $this->miConfigurador->getVariableConfiguracion ( "site" ) . "/blocks/inventarios/gestionCompras/" . $esteBloque ['nombre'];
					
					$ingreso = 0;
					
					$ruta_eliminar_xlsx = $rutaBloque . "/archivo/*.xlsx";
					
					$ruta_eliminar_xls = $rutaBloque . "/archivo/*.xls";
					
					foreach ( glob ( $ruta_eliminar_xlsx ) as $filename ) {
						unlink ( $filename );
					}
					foreach ( glob ( $ruta_eliminar_xls ) as $filename ) {
						unlink ( $filename );
					}
					
					foreach ( $_FILES as $key => $values ) {
						
						$archivo [] = $_FILES [$key];
					}
					
					$archivo = $archivo [0];
					
					$trozos = explode ( ".", $archivo ['name'] );
					$extension = end ( $trozos );
					
					if ($extension == 'xlsx') {
						
						if ($archivo) {
							// obtenemos los datos del archivo
							$tamano = $archivo ['size'];
							$tipo = $archivo ['type'];
							$archivo1 = $archivo ['name'];
							$prefijo = "archivo";
							
							if ($archivo1 != "") {
								// guardamos el archivo a la carpeta files
								$ruta_absoluta = $rutaBloque . "/archivo/" . $archivo1;
								// echo $ruta_absoluta;exit;
								
								if (copy ( $archivo ['tmp_name'], $ruta_absoluta )) {
									$status = "Archivo subido: <b>" . $archivo1 . "</b>";
								} else {
									
									\inventarios\gestionActa\registrarElementoOrden\funcion\redireccion::redireccionar ( 'noArchivoCarga' );
									exit ();
								}
							} else {
								\inventarios\gestionActa\registrarElementoOrden\funcion\redireccion::redireccionar ( 'noArchivoCarga' );
								exit ();
							}
						}
						
						if (file_exists ( $ruta_absoluta )) {
							
							// Cargando la hoja de cálculo
							
							$objReader = new \PHPExcel_Reader_Excel2007 ();
							
							$objPHPExcel = $objReader->load ( $ruta_absoluta );
							
							$objFecha = new \PHPExcel_Shared_Date ();
							
							// Asignar hoja de excel activa
							
							$objPHPExcel->setActiveSheetIndex ( 0 );
							
							$objWorksheet = $objPHPExcel->setActiveSheetIndex ( 0 );
							
							$highestRow = $objWorksheet->getHighestRow ();
							
							for($i = 2; $i <= $highestRow; $i ++) {
								
								$datos [$i] ['Nivel'] = $objPHPExcel->getActiveSheet ()->getCell ( 'A' . $i )->getCalculatedValue ();
								
								$datos [$i] ['Tipo_Bien'] = $objPHPExcel->getActiveSheet ()->getCell ( 'B' . $i )->getCalculatedValue ();
								
								$datos [$i] ['Descripcion'] = $objPHPExcel->getActiveSheet ()->getCell ( 'C' . $i )->getCalculatedValue ();
								
								$datos [$i] ['Cantidad'] = $objPHPExcel->getActiveSheet ()->getCell ( 'D' . $i )->getCalculatedValue ();
								
								$datos [$i] ['Unidad_Medida'] = $objPHPExcel->getActiveSheet ()->getCell ( 'E' . $i )->getCalculatedValue ();
								
								$datos [$i] ['Valor_Precio'] = $objPHPExcel->getActiveSheet ()->getCell ( 'F' . $i )->getCalculatedValue ();
								
								$datos [$i] ['Iva'] = $objPHPExcel->getActiveSheet ()->getCell ( 'G' . $i )->getCalculatedValue ();
								
								$datos [$i] ['Tipo_poliza'] = $objPHPExcel->getActiveSheet ()->getCell ( 'H' . $i )->getCalculatedValue ();
								
								$datos [$i] ['Fecha_Inicio_Poliza_Anio'] = $objPHPExcel->getActiveSheet ()->getCell ( 'I' . $i )->getCalculatedValue ();
								
								$datos [$i] ['Fecha_Inicio_Poliza_Mes'] = $objPHPExcel->getActiveSheet ()->getCell ( 'J' . $i )->getCalculatedValue ();
								
								$datos [$i] ['Fecha_Inicio_Poliza_Dia'] = $objPHPExcel->getActiveSheet ()->getCell ( 'K' . $i )->getCalculatedValue ();
								
								$datos [$i] ['Fecha_Final_Poliza_Anio'] = $objPHPExcel->getActiveSheet ()->getCell ( 'L' . $i )->getCalculatedValue ();
								
								$datos [$i] ['Fecha_Final_Poliza_Mes'] = $objPHPExcel->getActiveSheet ()->getCell ( 'M' . $i )->getCalculatedValue ();
								
								$datos [$i] ['Fecha_Final_Poliza_Dia'] = $objPHPExcel->getActiveSheet ()->getCell ( 'N' . $i )->getCalculatedValue ();
								
								$datos [$i] ['Marca'] = $objPHPExcel->getActiveSheet ()->getCell ( 'O' . $i )->getCalculatedValue ();
								
								$datos [$i] ['Serie'] = $objPHPExcel->getActiveSheet ()->getCell ( 'P' . $i )->getCalculatedValue ();
							}
							
							for($i = 2; $i <= $highestRow; $i ++) {
								
								// "1";0;"Exento";
								// "2";0;"Tarifa de Cero";
								// "3";0.05;"5%";
								// "4";0.04;"4%";
								// "5";0.1;"10%";
								// "6";0.16;"16%";
								switch ($datos [$i] ['Iva']) {
									
									case "1" :
										
										$IVA = 0;
										
										break;
									
									case "2" :
										
										$IVA = 0;
										
										break;
									
									case "3" :
										
										$IVA = 0.05;
										
										break;
									
									case "4" :
										
										$IVA = 0.04;
										
										break;
									
									case "5" :
										
										$IVA = 0.10;
										
										break;
									
									case "6" :
										
										$IVA = 0.16;
										
										break;
								}
								
								if ($datos [$i] ['Tipo_Bien'] == 1) {
									
									$arreglo = array (
											$fechaActual,
											$datos [$i] ['Nivel'],
											$datos [$i] ['Tipo_Bien'],
											trim ( $datos [$i] ['Descripcion'], "'" ),
											$datos [$i] ['Cantidad'],
											trim ( $datos [$i] ['Unidad_Medida'], "'" ),
											$datos [$i] ['Valor_Precio'],
											$datos [$i] ['Iva'],
											$datos [$i] ['Cantidad'] * $datos [$i] ['Valor_Precio'],
											$datos [$i] ['Cantidad'] * $datos [$i] ['Valor_Precio'] * $IVA,
											round ( $datos [$i] ['Cantidad'] * $datos [$i] ['Valor_Precio'] * $IVA ) + ($datos [$i] ['Cantidad'] * $datos [$i] ['Valor_Precio']),
											(is_null ( $datos [$i] ['Marca'] ) == true) ? null : trim ( $datos [$i] ['Marca'], "'" ),
											(is_null ( $datos [$i] ['Serie'] ) == true) ? null : trim ( $datos [$i] ['Serie'], "'" ),
											$_REQUEST ['id_orden'] 
									);
									$cadenaSql = $this->miSql->getCadenaSql ( 'ingresar_elemento_tipo_1', $arreglo );
									
									$elemento_id = $esteRecursoDB->ejecutarAcceso ( $cadenaSql, "busqueda" );
								} else if ($datos [$i] ['Tipo_Bien'] == 2) {
									
									$arreglo = array (
											$fechaActual,
											$datos [$i] ['Nivel'],
											$datos [$i] ['Tipo_Bien'],
											trim ( $datos [$i] ['Descripcion'], "'" ),
											1,
											trim ( $datos [$i] ['Unidad_Medida'], "'" ),
											$datos [$i] ['Valor_Precio'],
											$datos [$i] ['Iva'],
											1 * $datos [$i] ['Valor_Precio'],
											1 * $datos [$i] ['Valor_Precio'] * $IVA,
											round ( 1 * $datos [$i] ['Valor_Precio'] * $IVA ) + (1 * $datos [$i] ['Valor_Precio']),
											(is_null ( $datos [$i] ['Marca'] ) == true) ? null : trim ( $datos [$i] ['Marca'], "'" ),
											(is_null ( $datos [$i] ['Serie'] ) == true) ? null : trim ( $datos [$i] ['Serie'], "'" ),
											$_REQUEST ['id_orden'] 
									);
									
									$cadenaSql = $this->miSql->getCadenaSql ( 'ingresar_elemento_tipo_1', $arreglo );
									
									$elemento_id = $esteRecursoDB->ejecutarAcceso ( $cadenaSql, "busqueda" );
								} else if ($datos [$i] ['Tipo_Bien'] == 3) {
									
									if ($datos [$i] ['Tipo_poliza'] == 0) {
										
										$arreglo = array (
												$fechaActual,
												$datos [$i] ['Nivel'],
												$datos [$i] ['Tipo_Bien'],
												trim ( $datos [$i] ['Descripcion'], "'" ),
												1,
												trim ( $datos [$i] ['Unidad_Medida'], "'" ),
												$datos [$i] ['Valor_Precio'],
												$datos [$i] ['Iva'],
												1 * $datos [$i] ['Valor_Precio'],
												1 * $datos [$i] ['Valor_Precio'] * $IVA,
												round ( 1 * $datos [$i] ['Valor_Precio'] * $IVA ) + (1 * $datos [$i] ['Valor_Precio']),
												$datos [$i] ['Tipo_poliza'],
												NULL,
												NULL,
												(is_null ( $datos [$i] ['Marca'] ) == true) ? null : trim ( $datos [$i] ['Marca'], "'" ),
												(is_null ( $datos [$i] ['Serie'] ) == true) ? null : trim ( $datos [$i] ['Serie'], "'" ),
												$_REQUEST ['numero_acta'] 
										);
									} else if ($datos [$i] ['Tipo_poliza'] == 1) {
										
										$arreglo = array (
												$fechaActual,
												$datos [$i] ['Nivel'],
												$datos [$i] ['Tipo_Bien'],
												trim ( $datos [$i] ['Descripcion'], "'" ),
												1,
												trim ( $datos [$i] ['Unidad_Medida'], "'" ),
												$datos [$i] ['Valor_Precio'],
												$datos [$i] ['Iva'],
												1 * $datos [$i] ['Valor_Precio'],
												1 * $datos [$i] ['Valor_Precio'] * $IVA,
												round ( 1 * $datos [$i] ['Valor_Precio'] * $IVA ) + (1 * $datos [$i] ['Valor_Precio']),
												$datos [$i] ['Tipo_poliza'],
												$datos [$i] ['Fecha_Inicio_Poliza_Anio'] . "-" . $datos [$i] ['Fecha_Inicio_Poliza_Mes'] . "-" . $datos [$i] ['Fecha_Inicio_Poliza_Dia'],
												$datos [$i] ['Fecha_Final_Poliza_Anio'] . "-" . $datos [$i] ['Fecha_Final_Poliza_Mes'] . "-" . $datos [$i] ['Fecha_Final_Poliza_Dia'],
												(is_null ( $datos [$i] ['Marca'] ) == true) ? NULL : trim ( $datos [$i] ['Marca'], "'" ),
												(is_null ( $datos [$i] ['Serie'] ) == true) ? NULL : trim ( $datos [$i] ['Serie'], "'" ),
												$_REQUEST ['id_orden'] 
										);
									}
									
									$cadenaSql = $this->miSql->getCadenaSql ( 'ingresar_elemento_tipo_2', $arreglo );
									
									$elemento_id = $esteRecursoDB->ejecutarAcceso ( $cadenaSql, "busqueda" );
								}
							}
							
							$datos = array (
									$_REQUEST ['mensaje_titulo'],
									$_REQUEST ['id_orden'],
									$fechaActual ,
									(!isset($_REQUEST['registroOrden']))?$_REQUEST['arreglo']:$_REQUEST['registroOrden'],
							);
							
							
							if ($elemento_id && $_REQUEST ['id_orden']) {
								
								\inventarios\gestionActa\registrarElementoOrden\funcion\redireccion::redireccionar ( 'inserto_cargue_masivo', $datos );
								exit ();
							} else {
								
								\inventarios\gestionActa\registrarElementoOrden\funcion\redireccion::redireccionar ( 'noInserto', $datos );
								exit ();
							}
						}
					} else {
						
						
						\inventarios\gestionActa\registrarElementoOrden\funcion\redireccion::redireccionar ( 'noExtension');
						
						exit ();
					}
				}
				
				break;
		}
	}
	function resetForm() {
		foreach ( $_REQUEST as $clave => $valor ) {
			
			if ($clave != 'pagina' && $clave != 'development' && $clave != 'jquery' && $clave != 'tiempo') {
				unset ( $_REQUEST [$clave] );
			}
		}
	}
}

$miRegistrador = new RegistradorOrden ( $this->lenguaje, $this->sql, $this->funcion );

$resultado = $miRegistrador->procesarFormulario ();

?>
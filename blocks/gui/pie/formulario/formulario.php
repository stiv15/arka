<?php
if (! isset ( $GLOBALS ["autorizado"] )) {
	include ("../index.php");
	exit ();
}
class registrarForm {
	var $miConfigurador;
	var $lenguaje;
	var $miFormulario;
	var $miSql;
	function __construct($lenguaje, $formulario) {
		$this->miConfigurador = \Configurador::singleton ();
		
		$this->miConfigurador->fabricaConexiones->setRecursoDB ( 'principal' );
		
		$this->lenguaje = $lenguaje;
		
		$this->miFormulario = $formulario;
	}
	function miForm() {
		// Rescatar los datos de este bloque
		$esteBloque = $this->miConfigurador->getVariableConfiguracion ( "esteBloque" );
		
		// ---------------- SECCION: Parámetros Globales del Formulario ----------------------------------
		/**
		 * Atributos que deben ser aplicados a todos los controles de este formulario.
		 * Se utiliza un arreglo
		 * independiente debido a que los atributos individuales se reinician cada vez que se declara un campo.
		 *
		 * Si se utiliza esta técnica es necesario realizar un mezcla entre este arreglo y el específico en cada control:
		 * $atributos= array_merge($atributos,$atributosGlobales);
		 */
		
		$atributosGlobales ['campoSeguro'] = 'true';
		
		$_REQUEST ['tiempo'] = time ();
		$tiempo = $_REQUEST ['tiempo'];
		
		// ---------------- SECCION: Parámetros Generales del Formulario ----------------------------------
		$esteCampo = 'pie';
		
		$atributos ['id'] = $esteCampo;
		$atributos ['nombre'] = $esteCampo;
		// Si no se coloca, entonces toma el valor predeterminado 'application/x-www-form-urlencoded'
		$atributos ['tipoFormulario'] = 'multipart/form-data';
		// Si no se coloca, entonces toma el valor predeterminado 'POST'
		$atributos ['metodo'] = 'POST';
		// Si no se coloca, entonces toma el valor predeterminado 'index.php' (Recomendado)
		$atributos ['action'] = 'index.php';
		// $atributos ['titulo'] = $this->lenguaje->getCadena ( $esteCampo );
		// Si no se coloca, entonces toma el valor predeterminado.
		$atributos ['estilo'] = '';
		$atributos ['marco'] = false;
		$tab = 1;
		// ---------------- FIN SECCION: de Parámetros Generales del Formulario ----------------------------
		
		// ----------------INICIAR EL FORMULARIO ------------------------------------------------------------
		$atributos ['tipoEtiqueta'] = 'inicio';
		echo $this->miFormulario->formulario ( $atributos );
		{
			// ---------------- SECCION: Controles del Formulario -----------------------------------------------
			
			$esteCampo = "marcoDatosBasicosPie";
			$atributos ['id'] = $esteCampo;
			$atributos ["estilo"] = "";
			$atributos ['tipoEtiqueta'] = 'inicio';
			$atributos ['marco'] = false;
			echo $this->miFormulario->marcoAgrupacion ( 'inicio', $atributos );
			unset ( $atributos );
			{
				
				$tab = 1;
				// ------------------Division-------------------------
				
				$atributos ["id"] = "footerLeft";
				// $atributos ["estilo"] = "textoIzquierda";
				echo $this->miFormulario->division ( "inicio", $atributos );
				unset ( $atributos );
				{
					$esteCampo = 'mensajeResolucion ';
					$atributos ["id"] = $esteCampo;
					$atributos ["estilo"] = $esteCampo;
					$atributos ['columnas'] = 1;
					$atributos ["estilo"] = "textoSubtituloCursiva";
					$atributos ['texto'] = $this->lenguaje->getCadena ( $esteCampo );
					$tab ++;
					echo $this->miFormulario->campoTexto ( $atributos );
					unset ( $atributos );
					
					// ---------------- CONTROL: Cuadro de Texto --------------------------------------------------------
					$esteCampo = 'link_reso';
					
					$atributos ['id'] = $esteCampo;
					$atributos ['enlace'] = $this->miConfigurador->getVariableConfiguracion ( 'rutaUrlBloque' ) . 'imagen/escudo.png';
					$atributos ['tabIndex'] = 1;
					$atributos ['estilo'] = 'textoSubtitulo';
					$atributos ['enlaceTexto'] = $this->lenguaje->getCadena ( $esteCampo );
					$atributos ['ancho'] = '10%';
					$atributos ['alto'] = '10%';
					echo $this->miFormulario->enlace ( $atributos );
					
					unset ( $atributos );
					
					$esteCampo = 'mensajePie';
					$atributos ["id"] = $esteCampo;
					$atributos ["estilo"] = $esteCampo;
					$atributos ['columnas'] = 1;
					$atributos ["estilo"] = "textoSubtituloCursiva";
					$atributos ['texto'] = $this->lenguaje->getCadena ( $esteCampo );
					$tab ++;
					echo $this->miFormulario->campoTexto ( $atributos );
					unset ( $atributos );
				}
				
				echo $this->miFormulario->division ( "fin" );
				
				$atributos ["id"] = "footerRight";
				$atributos ["estilo"] = "textoDerecha";
				echo $this->miFormulario->division ( "inicio", $atributos );
				unset ( $atributos );
				{
					setlocale(LC_ALL,"es_ES");
					$fecha = strftime("%A %d de %B del %Y");
					
					
					$esteCampo = 'fecha';
					$atributos ["id"] = $esteCampo;
					$atributos ["estilo"] = $esteCampo;
					$atributos ['columnas'] = 1;
					$atributos ["estilo"] = "textoSubtituloCursivaDerecha";
					$atributos ['texto'] = $fecha;
					$tab ++;
					echo $this->miFormulario->campoTexto ( $atributos );
					unset ( $atributos );
		
// 					// ---------------- CONTROL: Cuadro de Texto --------------------------------------------------------
// 					$esteCampo = 'link_facebook';
					
// 					$atributos ['id'] = $esteCampo;
// 					$atributos ['enlace'] = "https://www.google.com/";
// 					$atributos ['tabIndex'] = 1;
// 					// $atributos ['estilo'] = 'jquery';
// 					$atributos ['enlaceImagen'] = $this->miConfigurador->getVariableConfiguracion ( 'rutaUrlBloque' ) . 'imagen/escudo.png';
// 					$atributos ['ancho'] = '10%';
// 					$atributos ['alto'] = '10%';
// 					$atributos ['saltoLinea'] = true;
// 					echo $this->miFormulario->enlace ( $atributos );
					
// 					unset ( $atributos );
					
					$esteCampo = 'link_facebook';
					
					$atributos ['id'] = $esteCampo;
					$atributos ['enlace'] = "https://www.google.com/";
					$atributos ['tabIndex'] = 1;
					// $atributos ['estilo'] = 'jquery';
					$atributos ['enlaceImagen'] = $this->miConfigurador->getVariableConfiguracion ( 'rutaUrlBloque' ) . 'imagen/escudo.png';
					$atributos ['ancho'] = '10%';
					$atributos ['alto'] = '10%';
					echo $this->miFormulario->enlace ( $atributos );
					
					unset ( $atributos );
				}
				
				echo $this->miFormulario->division ( "fin" );
			}
			
			echo $this->miFormulario->agrupacion ( 'fin' );
		}
		
		$atributos ['marco'] = true;
		$atributos ['tipoEtiqueta'] = 'fin';
		echo $this->miFormulario->formulario ( $atributos );
		
		return true;
	}
}
$miSeleccionador = new registrarForm ( $this->lenguaje, $this->miFormulario );

$miSeleccionador->miForm ();
?>




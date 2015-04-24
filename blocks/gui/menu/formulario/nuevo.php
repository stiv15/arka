<?php
// var_dump($this->miConfigurador);
$esteBloque = $this->miConfigurador->getVariableConfiguracion("esteBloque");

$rutaBloque = $this->miConfigurador->getVariableConfiguracion("host");
$rutaBloque .= $this->miConfigurador->getVariableConfiguracion("site") . "/blocks/";
$rutaBloque .= $esteBloque ['grupo'] . "/" . $esteBloque ['nombre'];

$directorio = $this->miConfigurador->getVariableConfiguracion("host");
$directorio .= $this->miConfigurador->getVariableConfiguracion("site") . "/index.php?";
$directorio .= $this->miConfigurador->getVariableConfiguracion("enlace");
$miSesion = Sesion::singleton();

// Registro Orden Compra
$enlaceRegistroOrdenCompra ['enlace'] = "pagina=registrarOrdenCompra";
$enlaceRegistroOrdenCompra ['enlace'] .= "&usuario=" . $miSesion->getSesionUsuarioId();

$enlaceRegistroOrdenCompra ['urlCodificada'] = $this->miConfigurador->fabricaConexiones->crypto->codificar_url($enlaceRegistroOrdenCompra ['enlace'], $directorio);
$enlaceRegistroOrdenCompra ['nombre'] = "Registrar Orden de Compra";

// consultar y modificar Orden Compra
$enlaceConsultaOrdenCompra ['enlace'] = "pagina=consultaOrdenCompra";
$enlaceRegistroOrdenCompra ['enlace'] .= "&usuario=" . $miSesion->getSesionUsuarioId();

$enlaceConsultaOrdenCompra ['urlCodificada'] = $this->miConfigurador->fabricaConexiones->crypto->codificar_url($enlaceConsultaOrdenCompra ['enlace'], $directorio);
$enlaceConsultaOrdenCompra ['nombre'] = "Consultar y Modificar Orden de Compra";

// Registro Orden Servicios
$enlaceRegistroOrdenServicios ['enlace'] = "pagina=registrarOrdenServicios";
$enlaceRegistroOrdenServicios ['enlace'] .= "&usuario=" . $miSesion->getSesionUsuarioId();

$enlaceRegistroOrdenServicios ['urlCodificada'] = $this->miConfigurador->fabricaConexiones->crypto->codificar_url($enlaceRegistroOrdenServicios ['enlace'], $directorio);
$enlaceRegistroOrdenServicios ['nombre'] = "Registrar Orden de Servicios";


// Consultar y Modificar Orden Servicios
$enlaceConsultaOrdenServicios ['enlace'] = "pagina=consultaOrdenServicios";
$enlaceConsultaOrdenServicios ['enlace'] .= "&usuario=" . $miSesion->getSesionUsuarioId();

$enlaceConsultaOrdenServicios ['urlCodificada'] = $this->miConfigurador->fabricaConexiones->crypto->codificar_url($enlaceConsultaOrdenServicios ['enlace'], $directorio);
$enlaceConsultaOrdenServicios ['nombre'] = "Consultar y Modificar Orden de Servicios";


// Registro de Contrato

$enlacegestionContrato['enlace'] = "pagina=gestionContrato";
$enlacegestionContrato['enlace'] .= "&usuario=" . $miSesion->getSesionUsuarioId();

$enlacegestionContrato['urlCodificada'] = $this->miConfigurador->fabricaConexiones->crypto->codificar_url($enlacegestionContrato ['enlace'], $directorio);
$enlacegestionContrato['nombre'] = "Contratos Vicerrectoría";

// Gestionar Acta de Recibido

$enlacegestionActa['enlace'] = "pagina=registrarActa";
$enlacegestionActa['enlace'] .= "&usuario=" . $miSesion->getSesionUsuarioId();

$enlacegestionActa['urlCodificada'] = $this->miConfigurador->fabricaConexiones->crypto->codificar_url($enlacegestionActa ['enlace'], $directorio);
$enlacegestionActa['nombre'] = "Registrar Acta de Recibido";

// Gestionar Acta de Recibido

$enlaceconsultaActa['enlace'] = "pagina=consultarActa";
$enlaceconsultaActa['enlace'] .= "&usuario=" . $miSesion->getSesionUsuarioId();

$enlaceconsultaActa['urlCodificada'] = $this->miConfigurador->fabricaConexiones->crypto->codificar_url($enlaceconsultaActa['enlace'], $directorio);
$enlaceconsultaActa['nombre'] = "Consultar y Modificar Acta de Recibido";


// Registro Entradas
$enlaceRegistroEntradas ['enlace'] = "pagina=registrarEntradas";
$enlaceRegistroEntradas ['enlace'] .= "&usuario=" . $miSesion->getSesionUsuarioId();

$enlaceRegistroEntradas ['urlCodificada'] = $this->miConfigurador->fabricaConexiones->crypto->codificar_url($enlaceRegistroEntradas ['enlace'], $directorio);
$enlaceRegistroEntradas ['nombre'] = "Registrar Entrada";

// Consultar y Modificar Estado Entradas
$enlaceConsultaEntradas ['enlace'] = "pagina=consultaEntradas";
$enlaceConsultaEntradas ['enlace'] .= "&usuario=" . $miSesion->getSesionUsuarioId();

$enlaceConsultaEntradas ['urlCodificada'] = $this->miConfigurador->fabricaConexiones->crypto->codificar_url($enlaceConsultaEntradas ['enlace'], $directorio);
$enlaceConsultaEntradas ['nombre'] = "Consultar y Modificar Estado Entrada";

// Modificar Entradas

$enlaceModificarEntradas ['enlace'] = "pagina=modificarEntradas";
$enlaceModificarEntradas ['enlace'] .= "&usuario=" . $miSesion->getSesionUsuarioId();

$enlaceModificarEntradas ['urlCodificada'] = $this->miConfigurador->fabricaConexiones->crypto->codificar_url($enlaceModificarEntradas ['enlace'], $directorio);
$enlaceModificarEntradas ['nombre'] = "Modificar Entradas";

// Registro Elementos
$enlaceRegistroElementos ['enlace'] = "pagina=registrarElemento";
$enlaceRegistroElementos ['enlace'] .= "&usuario=" . $miSesion->getSesionUsuarioId();

$enlaceRegistroElementos ['urlCodificada'] = $this->miConfigurador->fabricaConexiones->crypto->codificar_url($enlaceRegistroElementos ['enlace'], $directorio);
$enlaceRegistroElementos ['nombre'] = "Cargar Elementos";

// Consultar y Modificar Elementos
$enlaceModificarElementos ['enlace'] = "pagina=modificarElemento";
$enlaceModificarElementos['enlace'] .= "&usuario=" . $miSesion->getSesionUsuarioId();

$enlaceModificarElementos ['urlCodificada'] = $this->miConfigurador->fabricaConexiones->crypto->codificar_url($enlaceModificarElementos ['enlace'], $directorio);
$enlaceModificarElementos ['nombre'] = "Consultar y Modificar Elementos";

// Registro Salidas
$enlaceRegistroSalidas ['enlace'] = "pagina=registrarSalidas";
$enlaceRegistroSalidas ['enlace'] .= "&usuario=" . $miSesion->getSesionUsuarioId();

$enlaceRegistroSalidas ['urlCodificada'] = $this->miConfigurador->fabricaConexiones->crypto->codificar_url($enlaceRegistroSalidas ['enlace'], $directorio);
$enlaceRegistroSalidas ['nombre'] = "Registrar Salida";

// Consultar y Modificar Salidas

$enlaceModificarSalidas ['enlace'] = "pagina=modificarSalidas";
$enlaceModificarSalidas ['enlace'] .= "&usuario=" . $miSesion->getSesionUsuarioId();

$enlaceModificarSalidas ['urlCodificada'] = $this->miConfigurador->fabricaConexiones->crypto->codificar_url($enlaceModificarSalidas ['enlace'], $directorio);
$enlaceModificarSalidas ['nombre'] = "Consultar y Modificar Salidas";


// Traslado Elementos
$enlaceTrasladosElementos ['enlace'] = "pagina=registrarTraslados";
$enlaceTrasladosElementos ['enlace'] .= "&usuario=" . $miSesion->getSesionUsuarioId();

$enlaceTrasladosElementos ['urlCodificada'] = $this->miConfigurador->fabricaConexiones->crypto->codificar_url($enlaceTrasladosElementos ['enlace'], $directorio);
$enlaceTrasladosElementos ['nombre'] = "Traslados Elementos";


// Sobrantes Y faltantes
$enlaceSobranteFlatanteElementos ['enlace'] = "pagina=registrarFaltantesSobrantes";
$enlaceSobranteFlatanteElementos ['enlace'] .= "&usuario=" . $miSesion->getSesionUsuarioId();

$enlaceSobranteFlatanteElementos ['urlCodificada'] = $this->miConfigurador->fabricaConexiones->crypto->codificar_url($enlaceSobranteFlatanteElementos ['enlace'], $directorio);
$enlaceSobranteFlatanteElementos ['nombre'] = "Faltantes y Sobrantes Elementos";


// Gestionar Catalogo

$enlaceGestionarCatalogo ['enlace'] = "pagina=catalogo";
$enlaceGestionarCatalogo ['enlace'] .= "&usuario=" . $miSesion->getSesionUsuarioId();

$enlaceGestionarCatalogo ['urlCodificada'] = $this->miConfigurador->fabricaConexiones->crypto->codificar_url($enlaceGestionarCatalogo ['enlace'], $directorio);
$enlaceGestionarCatalogo ['nombre'] = "Nivel de Inventarios";

// Gestionar GrupoC

$enlaceGestionarGrupoC ['enlace'] = "pagina=grupoContable";
$enlaceGestionarGrupoC ['enlace'] .= "&usuario=" . $miSesion->getSesionUsuarioId();

$enlaceGestionarGrupoC ['urlCodificada'] = $this->miConfigurador->fabricaConexiones->crypto->codificar_url($enlaceGestionarGrupoC ['enlace'], $directorio);
$enlaceGestionarGrupoC ['nombre'] = "Grupos Contables";

// Radicar ASignar

$enlaceRadicarAsignar ['enlace'] = "pagina=radicarAsignar";
$enlaceRadicarAsignar ['enlace'] .= "&usuario=" . $miSesion->getSesionUsuarioId();

$enlaceRadicarAsignar ['urlCodificada'] = $this->miConfigurador->fabricaConexiones->crypto->codificar_url($enlaceRadicarAsignar ['enlace'], $directorio);
$enlaceRadicarAsignar ['nombre'] = "Asignar Entrada";


// Radicar entrada y salida de elementos

$enlaceradicarEntradaSalida ['enlace'] = "pagina=radicarEntradaSalida";
$enlaceradicarEntradaSalida ['enlace'] .= "&usuario=" . $miSesion->getSesionUsuarioId();

$enlaceradicarEntradaSalida ['urlCodificada'] = $this->miConfigurador->fabricaConexiones->crypto->codificar_url($enlaceradicarEntradaSalida ['enlace'], $directorio);
$enlaceradicarEntradaSalida ['nombre'] = "Entrada y Salida de Elementos";


//Asignar inventarios a Contratistas

$enlaceasignarInventarioC ['enlace'] = "pagina=asignarInventarioC";
$enlaceasignarInventarioC ['enlace'] .= "&usuario=" . $miSesion->getSesionUsuarioId();

$enlaceasignarInventarioC ['urlCodificada'] = $this->miConfigurador->fabricaConexiones->crypto->codificar_url($enlaceasignarInventarioC ['enlace'], $directorio);
$enlaceasignarInventarioC ['nombre'] = "Asignación de  Elementos a Contratistas";

//modificar inventarios a Contratistas

$enlaceconsultarAsignacion ['enlace'] = "pagina=consultarAsignacion";
$enlaceconsultarAsignacion ['enlace'] .= "&usuario=" . $miSesion->getSesionUsuarioId();

$enlaceconsultarAsignacion ['urlCodificada'] = $this->miConfigurador->fabricaConexiones->crypto->codificar_url($enlaceconsultarAsignacion ['enlace'], $directorio);
$enlaceconsultarAsignacion ['nombre'] = "Modificar Asignación de  Elementos a Contratistas";

//descargar inventarios a Contratistas

$enlacedescargarInventario ['enlace'] = "pagina=descargarInventario";
$enlacedescargarInventario ['enlace'] .= "&usuario=" . $miSesion->getSesionUsuarioId();

$enlacedescargarInventario ['urlCodificada'] = $this->miConfigurador->fabricaConexiones->crypto->codificar_url($enlacedescargarInventario ['enlace'], $directorio);
$enlacedescargarInventario ['nombre'] = "Descargar  Elementos a Contratista";

// Reportico
$enlaceReportico ['enlace'] = "pagina=reportico";
$enlaceReportico ['enlace'] .= "&usuario=" . $miSesion->getSesionUsuarioId();

$enlaceReportico ['urlCodificada'] = $this->miConfigurador->fabricaConexiones->crypto->codificar_url($enlaceReportico ['enlace'], $directorio);
$enlaceReportico ['nombre'] = "Reportes Inventarios";

//generar paz y salvo
$enlacegenerarPazSalvo ['enlace'] = "pagina=generarPazSalvo";
$enlacegenerarPazSalvo ['enlace'] .= "&usuario=" . $miSesion->getSesionUsuarioId();

$enlacegenerarPazSalvo ['urlCodificada'] = $this->miConfigurador->fabricaConexiones->crypto->codificar_url($enlacegenerarPazSalvo ['enlace'], $directorio);
$enlacegenerarPazSalvo ['nombre'] = "Generar Paz y Salvo Contratista";


//generar paz y salvo
$enlacegenerarPazSalvo ['enlace'] = "pagina=generarPazSalvo";
$enlacegenerarPazSalvo ['enlace'] .= "&usuario=" . $miSesion->getSesionUsuarioId();

$enlacegenerarPazSalvo ['urlCodificada'] = $this->miConfigurador->fabricaConexiones->crypto->codificar_url($enlacegenerarPazSalvo ['enlace'], $directorio);
$enlacegenerarPazSalvo ['nombre'] = "Generar Paz y Salvo Contratista";

//gestión depreciación - registro
$enlacegestionDepreciacion ['enlace'] = "pagina=registrarDepreciacion";
$enlacegestionDepreciacion ['enlace'] .= "&usuario=" . $miSesion->getSesionUsuarioId();

$enlacegestionDepreciacion ['urlCodificada'] = $this->miConfigurador->fabricaConexiones->crypto->codificar_url($enlacegestionDepreciacion ['enlace'], $directorio);
$enlacegestionDepreciacion ['nombre'] = "Generar Depreciación";

//gestión depreciación - modificación
$enlacemodificarDepreciacion ['enlace'] = "pagina=modificarDepreciacion";
$enlacemodificarDepreciacion ['enlace'] .= "&usuario=" . $miSesion->getSesionUsuarioId();

$enlacemodificarDepreciacion ['urlCodificada'] = $this->miConfigurador->fabricaConexiones->crypto->codificar_url($enlacemodificarDepreciacion ['enlace'], $directorio);
$enlacemodificarDepreciacion ['nombre'] = "Modificar Depreciación";

// gestion usuarios
$enlaceUsuarios ['enlace'] = "pagina=gestionUsuarios";
$enlaceUsuarios ['enlace'] .= "&usuario=" . $miSesion->getSesionUsuarioId();

$enlaceUsuarios ['urlCodificada'] = $this->miConfigurador->fabricaConexiones->crypto->codificar_url($enlaceUsuarios ['enlace'], $directorio);
$enlaceUsuarios ['nombre'] = "Gestión Usuarios";

//Administración Dependencias
$enlaceregistrarDependencia ['enlace'] = "pagina=agregarDependencia";
$enlaceregistrarDependencia['enlace'] .= "&usuario=" . $miSesion->getSesionUsuarioId();

$enlaceregistrarDependencia['urlCodificada'] = $this->miConfigurador->fabricaConexiones->crypto->codificar_url($enlaceregistrarDependencia['enlace'], $directorio);
$enlaceregistrarDependencia['nombre'] = "Dependencias";


// Bajas Elementos
$enlaceBajasElementos ['enlace'] = "pagina=registrarBajas";
$enlaceBajasElementos ['enlace'] .= "&usuario=" . $miSesion->getSesionUsuarioId();

$enlaceBajasElementos ['urlCodificada'] = $this->miConfigurador->fabricaConexiones->crypto->codificar_url($enlaceBajasElementos ['enlace'], $directorio);
$enlaceBajasElementos ['nombre'] = "Bajas Elementos";


// Radicacion movimientos  Elementos
$enlaceradicacionesElementos ['enlace'] = "pagina=radicacionesElementos";
$enlaceradicacionesElementos ['enlace'] .= "&usuario=" . $miSesion->getSesionUsuarioId();

$enlaceradicacionesElementos ['urlCodificada'] = $this->miConfigurador->fabricaConexiones->crypto->codificar_url($enlaceradicacionesElementos['enlace'], $directorio);
$enlaceradicacionesElementos['nombre'] = "Radicaciones Inexistencias Elementos";


// Fin de la sesión
$enlaceFinSesion['enlace'] = "pagina=index";
$enlaceFinSesion['enlace'] .= "&usuario=" . $miSesion->getSesionUsuarioId();

$enlaceFinSesion['urlCodificada'] = $this->miConfigurador->fabricaConexiones->crypto->codificar_url($enlaceFinSesion['enlace'], $directorio);
$enlaceFinSesion['nombre'] = "Cerrar Sesión";

//------------------------------- Inicio del Menú-------------------------- //
?>
<nav id="cbp-hrmenu" class="cbp-hrmenu">
    <ul>
        <li>
            <a href="#">Gestión de Compras</a>
            <div class="cbp-hrsub">
                <div class="cbp-hrsub-inner"> 
                    <div>
                        <h4>Orden de Compra</h4>
                        <ul>
                            <li><a href="<?php echo $enlaceRegistroOrdenCompra['urlCodificada'] ?>"><?php echo $enlaceRegistroOrdenCompra['nombre'] ?></a></li>
                            <li><a href="<?php echo $enlaceConsultaOrdenCompra['urlCodificada'] ?>"><?php echo $enlaceConsultaOrdenCompra['nombre'] ?></a></li>
                        </ul>
                    </div>
                    <div>
                        <h4>Orden de Servicios</h4>
                        <ul>
                            <li><a href="<?php echo $enlaceRegistroOrdenServicios['urlCodificada'] ?>"><?php echo $enlaceRegistroOrdenServicios['nombre'] ?></a></li>
                            <li><a href="<?php echo $enlaceConsultaOrdenServicios['urlCodificada'] ?>"><?php echo $enlaceConsultaOrdenServicios['nombre'] ?></a></li>
                        </ul>
                    </div>
                    <div>
                        <h4>Contratos Vicerrectoría</h4>
                        <ul>
                            <li><a href="<?php echo $enlacegestionContrato['urlCodificada'] ?>"><?php echo $enlacegestionContrato['nombre'] ?></a></li>
                        </ul>
                    </div>
                </div><!-- /cbp-hrsub-inner -->
            </div><!-- /cbp-hrsub -->
        </li>

        <li>
            <a href="#">Gestión Entrada y Salida</a>
            <div class="cbp-hrsub">
                <div class="cbp-hrsub-inner">
                    <div>
                        <h4>Acta de Recibido</h4>
                        <ul>
                            <li><a href="<?php echo $enlacegestionActa['urlCodificada'] ?>"><?php echo $enlacegestionActa['nombre'] ?></a></li>
                            <li><a href="<?php echo$enlaceconsultaActa['urlCodificada'] ?>"><?php echo $enlaceconsultaActa['nombre'] ?></a></li>
                        </ul>
                    </div>

                    <div>
                        <h4>Entrada de Elementos</h4>
                        <ul>
                            <li><a href="<?php echo $enlaceRegistroEntradas['urlCodificada'] ?>"><?php echo $enlaceRegistroEntradas['nombre'] ?></a></li>
                            <li><a href="<?php echo $enlaceConsultaEntradas['urlCodificada'] ?>"><?php echo $enlaceConsultaEntradas['nombre'] ?></a></li>
                            <li><a href="<?php echo $enlaceModificarEntradas['urlCodificada'] ?>"><?php echo $enlaceModificarEntradas['nombre'] ?></a></li>  
                        </ul>
                    </div>

                    <div>
                        <h4>Salida de Elementos</h4>
                        <ul>
                            <li><a href="<?php echo $enlaceRegistroSalidas['urlCodificada'] ?>"><?php echo $enlaceRegistroSalidas['nombre'] ?></a></li>
                            <li><a href="<?php echo $enlaceModificarSalidas['urlCodificada'] ?>"><?php echo $enlaceModificarSalidas['nombre'] ?></a></li>  
                        </ul>
                    </div>
                </div><!-- /cbp-hrsub-inner -->
            </div><!-- /cbp-hrsub -->
        </li>

        <li>
            <a href="#">Gestión de Elementos</a>
            <div class="cbp-hrsub">
                <div class="cbp-hrsub-inner">
                    <div>
                        <h4>Cargue de Elementos</h4>
                        <ul>
                            <li><a href="<?php echo $enlaceRegistroElementos['urlCodificada'] ?>"><?php echo $enlaceRegistroElementos['nombre'] ?></a></li>
                            <li><a href="<?php echo $enlaceModificarElementos['urlCodificada'] ?>"><?php echo $enlaceModificarElementos['nombre'] ?></a></li> 
                        </ul>
                    </div>


                    <div>
                        <h4>Movimientos</h4>
                        <ul>
                            <li><a href="<?php echo $enlaceTrasladosElementos['urlCodificada'] ?>"><?php echo $enlaceTrasladosElementos['nombre'] ?></a></li>
                            <li><a href="<?php echo $enlaceSobranteFlatanteElementos['urlCodificada'] ?>"><?php echo $enlaceSobranteFlatanteElementos['nombre'] ?></a></li>
                            <li><a href="<?php echo $enlaceBajasElementos['urlCodificada'] ?>"><?php echo $enlaceBajasElementos['nombre'] ?></a></li>
                        </ul>
                    </div>

                    <div>
                        <h4>Asignación de Elementos Contratistas</h4>
                        <ul>
                            <li><a href="<?php echo $enlaceasignarInventarioC['urlCodificada'] ?>"><?php echo $enlaceasignarInventarioC['nombre'] ?></a></li>
                            <li><a href="<?php echo $enlaceconsultarAsignacion['urlCodificada'] ?>"><?php echo $enlaceconsultarAsignacion['nombre'] ?></a></li>
                            <li><a href="<?php echo $enlacedescargarInventario['urlCodificada'] ?>"><?php echo $enlacedescargarInventario['nombre'] ?></a></li>
                        </ul>
                    </div>
                    <div>
                        <h4>Gestión Depreciación</h4>
                        <ul>
                            <li><a href="<?php echo$enlacegestionDepreciacion['urlCodificada'] ?>"><?php echo$enlacegestionDepreciacion['nombre'] ?></a></li>
                            <li><a href="<?php echo$enlacemodificarDepreciacion['urlCodificada'] ?>"><?php echo$enlacemodificarDepreciacion['nombre'] ?></a></li>
                        </ul>
                    </div>
                </div><!-- /cbp-hrsub-inner -->
            </div><!-- /cbp-hrsub -->
        </li>

        <li>
            <a href="#">Gestión Documentos</a>
            <div class="cbp-hrsub">
                <div class="cbp-hrsub-inner"> 
                    <div>
                        <h4>Radicación Documentos</h4>
                        <ul>
                            <li><a href="<?php echo $enlaceRadicarAsignar['urlCodificada'] ?>"><?php echo $enlaceRadicarAsignar['nombre'] ?></a></li>
			    <li><a href="<?php echo$enlaceradicacionesElementos['urlCodificada'] ?>"><?php echo $enlaceradicacionesElementos['nombre'] ?></a></li>
                                    <!--li><a href="<?php echo $enlaceradicarEntradaSalida['urlCodificada'] ?>"><?php echo $enlaceradicarEntradaSalida['nombre'] ?></a></li-->
                        </ul>
                    </div>

                    <div>
                        <h4>Gestor Reportes</h4>
                        <ul>
                            <li><a href="<?php echo$enlaceReportico['urlCodificada'] ?>"><?php echo $enlaceReportico['nombre'] ?></a></li>
                            <li><a href="<?php echo $enlacegenerarPazSalvo['urlCodificada'] ?>"><?php echo $enlacegenerarPazSalvo['nombre'] ?></a></li>
                        </ul>
                    </div>
                </div><!-- /cbp-hrsub-inner -->
            </div><!-- /cbp-hrsub -->
        </li>


        <li>
            <a href="#">Admin. Datos Básicos</a>
            <div class="cbp-hrsub">
                <div class="cbp-hrsub-inner"> 
                           <div>
                        <h4>Gestión de Catálogos</h4>
                        <ul>
                            <li><a href="<?php echo $enlaceGestionarCatalogo['urlCodificada'] ?>"><?php echo $enlaceGestionarCatalogo['nombre'] ?></a></li>
                            <!--li><a href="<?php echo $enlaceregistrarDependencia['urlCodificada'] ?>"><?php echo $enlaceregistrarDependencia['nombre'] ?></a></li-->
                            <li><a href="<?php echo $enlaceGestionarGrupoC['urlCodificada'] ?>"><?php echo $enlaceGestionarGrupoC['nombre'] ?></a></li>
                        </ul>
                    </div>



                </div><!-- /cbp-hrsub-inner -->
            </div><!-- /cbp-hrsub -->
        </li>

        <li>
            <a href="#">Mi Sesión</a>
            <div class="cbp-hrsub">
                <div class="cbp-hrsub-inner"> 
                    <div>
                        <h4>Usuarios</h4>
                        <ul>
                            <li><a href="<?php echo $enlaceUsuarios['urlCodificada'] ?>"><?php echo ($enlaceUsuarios['nombre']) ?></a></li>
			    <li><a href="<?php echo$enlaceFinSesion['urlCodificada'] ?>">Cerrar Sesión</a></li>
                        </ul>
                    </div>
                </div><!-- /cbp-hrsub-inner -->
            </div><!-- /cbp-hrsub -->
        </li>
        
    </ul>
</nav>


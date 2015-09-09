<?php
/**
 *
 * Los datos del bloque se encuentran en el arreglo $esteBloque.
 */

// URL base
$url = $this->miConfigurador->getVariableConfiguracion ( "host" );
$url .= $this->miConfigurador->getVariableConfiguracion ( "site" );

$urlDirectorio = $url;

$urlDirectorio = $urlDirectorio . "/plugin/scripts/javascript/dataTable/Spanish.json";

$url .= "/index.php?";

// Variables
$cadenaACodificar = "pagina=" . $this->miConfigurador->getVariableConfiguracion ( "pagina" );
$cadenaACodificar .= "&procesarAjax=true";
$cadenaACodificar .= "&action=index.php";
$cadenaACodificar .= "&bloqueNombre=" . $esteBloque ["nombre"];
$cadenaACodificar .= "&bloqueGrupo=" . $esteBloque ["grupo"];
$cadenaACodificar .= $cadenaACodificar . "&funcion=Consulta";
$cadenaACodificar .= "&tiempo=" . $_REQUEST ['tiempo'];
$cadenaACodificar .= "&usuario=" . $_REQUEST ['usuario'];

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

if (isset ( $_REQUEST ['sede'] ) && $_REQUEST ['sede'] != '') {
	$sede = $_REQUEST ['sede'];
} else {
	$sede = '';
}

if (isset ( $_REQUEST ['dependencia'] ) && $_REQUEST ['dependencia'] != '') {
	$dependencia = $_REQUEST ['dependencia'];
} else {
	$dependencia = '';
}

if (isset ( $_REQUEST ['funcionario'] ) && $_REQUEST ['funcionario'] != '') {
	$funcionario = $_REQUEST ['funcionario'];
} else {
	$funcionario = '';
}

if (isset ( $_REQUEST ['numero_entrada'] ) && $_REQUEST ['numero_entrada'] != '') {
	$entrada = $_REQUEST ['numero_entrada'];
} else {
	$entrada = '';
}

if (isset ( $_REQUEST ['registro_salidas'] ) && $_REQUEST ['registro_salidas'] != '') {
	$registroSalidas = $_REQUEST ['registro_salidas'];
} else {
	$registroSalidas = '';
}

$arreglo = array (
		$fechaInicio,
		$fechaFinal,
		$placa,
		$serie,
		$sede,
		$dependencia,
		$funcionario,
		$entrada,
		$registroSalidas 
);

$arreglo = serialize ( $arreglo );

$cadenaACodificar .= "&arreglo=" . $arreglo;

// Codificar las variables
$enlace = $this->miConfigurador->getVariableConfiguracion ( "enlace" );
$cadena = $this->miConfigurador->fabricaConexiones->crypto->codificar_url ( $cadenaACodificar, $enlace );

// URL definitiva
$urlFinal = $url . $cadena;

// Variables
$cadenaACodificar16 = "pagina=" . $this->miConfigurador->getVariableConfiguracion ( "pagina" );
$cadenaACodificar16 .= "&procesarAjax=true";
$cadenaACodificar16 .= "&action=index.php";
$cadenaACodificar16 .= "&bloqueNombre=" . $esteBloque ["nombre"];
$cadenaACodificar16 .= "&bloqueGrupo=" . $esteBloque ["grupo"];
$cadenaACodificar16 .= $cadenaACodificar16 . "&funcion=consultarDependencia";
$cadenaACodificar16 .= "&tiempo=" . $_REQUEST ['tiempo'];

// Codificar las variables
$enlace = $this->miConfigurador->getVariableConfiguracion ( "enlace" );
$cadena16 = $this->miConfigurador->fabricaConexiones->crypto->codificar_url ( $cadenaACodificar16, $enlace );

// URL definitiva
$urlFinal16 = $url . $cadena16;
// echo $urlFinal;

// Variables
$cadenaACodificar2 = "pagina=" . $this->miConfigurador->getVariableConfiguracion ( "pagina" );
$cadenaACodificar2 .= "&procesarAjax=true";
$cadenaACodificar2 .= "&action=index.php";
$cadenaACodificar2 .= "&bloqueNombre=" . $esteBloque ["nombre"];
$cadenaACodificar2 .= "&bloqueGrupo=" . $esteBloque ["grupo"];
$cadenaACodificar2 .= "&funcion=SeleccionTipoBien";
$cadenaACodificar2 .= "&tiempo=" . $_REQUEST ['tiempo'];

// Codificar las variables
$enlace = $this->miConfigurador->getVariableConfiguracion ( "enlace" );
$cadena2 = $this->miConfigurador->fabricaConexiones->crypto->codificar_url ( $cadenaACodificar2, $enlace );

// URL definitiva
$urlFinal2 = $url . $cadena2;

?>
<script type='text/javascript'>
$(function() {
         	$('#tablaTitulos').ready(function() {

             $('#tablaTitulos').dataTable( {
//              	 serverSide: true,
				language: {
                url: "<?php echo $urlDirectorio?>"
            			},
             	 processing: true,
//                   ordering: true,
                  searching: true,
//                   deferRender: true,
//                   sScrollY: 200	,
         //          bScrollCollapse: true,
                  info:true,
//                   lengthChange:true,
                  paging: true,
//                   stateSave: true,
         //          renderer: "bootstrap",
         //          retrieve: true,
                  ajax:{
                      url:"<?php echo $urlFinal?>",
                      dataSrc:"data"                                                                  
                  },
                  columns: [
                  { data :"fecharegistro" },
                  { data :"entrada" },
                  { data :"descripcion" },
                  { data :"placa" },
                  { data :"funcionario" },
                  { data :"dependencia" },
                  { data :"modificar" },
                  { data :"anular" }
                            ]
             });
                  
         		});

});



function tipo_bien(elem, request, response){
	  $.ajax({
	    url: "<?php echo $urlFinal2?>",
	    dataType: "json",
	    data: { valor:$("#<?php echo $this->campoSeguro('nivel')?>").val()},
	    success: function(data){ 


	    			$("#<?php echo $this->campoSeguro('id_tipo_bien')?>").val(data[0]);
	    			$("#<?php echo $this->campoSeguro('tipo_bien')?>").val(data[1]);

	    			  switch($("#<?php echo $this->campoSeguro('id_tipo_bien')?>").val())
	    	            {
	    	                           
	    	                
	    	                case '2':


	    	                    $("#<?php echo $this->campoSeguro('devolutivo')?>").css('display','none');
	    	                    $("#<?php echo $this->campoSeguro('consumo_controlado')?>").css('display','block');   
	    	                 $("#<?php echo $this->campoSeguro('cantidad')?>").val('1');
	    	                 $('#<?php echo $this->campoSeguro('cantidad')?>').attr('disabled','');

	    	                 break;
	    	                
	    	                case '3':

	    	                    $("#<?php echo $this->campoSeguro('devolutivo')?>").css('display','block');
	    	                    $("#<?php echo $this->campoSeguro('consumo_controlado')?>").css('display','none');
	    	                    $("#<?php echo $this->campoSeguro('tipo_poliza')?>").select2();
	    	         
	    	                 $("#<?php echo $this->campoSeguro('cantidad')?>").val('1');
	    	                 $('#<?php echo $this->campoSeguro('cantidad')?>').attr('disabled','');
	    	                    
	    	                break;
	    	                                
	    	           
	    	                break;
	    	                

	    	                default:

	    	                    $("#<?php echo $this->campoSeguro('devolutivo')?>").css('display','none');
	    	                    $("#<?php echo $this->campoSeguro('consumo_controlado')?>").css('display','none');   
	    	                    
	    	                 
	    	                 $("#<?php echo $this->campoSeguro('cantidad')?>").val('');
	    	                 $('#<?php echo $this->campoSeguro('cantidad')?>').removeAttr('disabled');
	    	                 
	    	                break;
	    	                
	    	                }






	    			

	    }
		                    
	   });
	};




function consultarDependencia(elem, request, response){
	  $.ajax({
	    url: "<?php echo $urlFinal16?>",
	    dataType: "json",
	    data: { valor:$("#<?php echo $this->campoSeguro('sede')?>").val()},
	    success: function(data){ 


	    	 if(data[0]!=" "){

		            $("#<?php echo $this->campoSeguro('dependencia')?>").html('');
		            $("<option value=''>Seleccione  ....</option>").appendTo("#<?php echo $this->campoSeguro('dependencia')?>");
		            $.each(data , function(indice,valor){

		            	$("<option value='"+data[ indice ].ESF_CODIGO_DEP+"'>"+data[ indice ].ESF_DEP_ENCARGADA+"</option>").appendTo("#<?php echo $this->campoSeguro('dependencia')?>");
		            	
		            });
		            
		            $("#<?php echo $this->campoSeguro('dependencia')?>").removeAttr('disabled');
		            
		            $('#<?php echo $this->campoSeguro('dependencia')?>').width(260);
		            $("#<?php echo $this->campoSeguro('dependencia')?>").select2();
		            
		          
		            
			        }
	    
	    			

	    }
		                    
	   });
	};

	  $(function () {

          
	        $('#<?php echo $this->campoSeguro('fecha_inicio')?>').datepicker({
			dateFormat: 'yy-mm-dd',
			maxDate: 0,
			changeYear: true,
			changeMonth: true,
			monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
			    'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
			    monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
			    dayNames: ['Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado'],
			    dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sab'],
			    dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
			    onSelect: function(dateText, inst) {
				var lockDate = new Date($('#<?php echo $this->campoSeguro('fecha_inicio')?>').datepicker('getDate'));
				$('input#<?php echo $this->campoSeguro('fecha_final')?>').datepicker('option', 'minDate', lockDate);
				},
				onClose: function() { 
			 	    if ($('input#<?php echo $this->campoSeguro('fecha_inicio')?>').val()!='')
	                    {
	                        $('#<?php echo $this->campoSeguro('fecha_final')?>').attr("class", "cuadroTexto ui-widget ui-widget-content ui-corner-all   validate[required]");
	                }else {
	                        $('#<?php echo $this->campoSeguro('fecha_final')?>').attr("class", "cuadroTexto ui-widget ui-widget-content ui-corner-all ");
	                    }
				  }
				
				
			});
	              $('#<?php echo $this->campoSeguro('fecha_final')?>').datepicker({
			dateFormat: 'yy-mm-dd',
			maxDate: 0,
			changeYear: true,
			changeMonth: true,
			monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
			    'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
			    monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
			    dayNames: ['Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado'],
			    dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sab'],
			    dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
			    onSelect: function(dateText, inst) {
				var lockDate = new Date($('#<?php echo $this->campoSeguro('fecha_final')?>').datepicker('getDate'));
				$('input#<?php echo $this->campoSeguro('fecha_inicio')?>').datepicker('option', 'maxDate', lockDate);
				 },
				 onClose: function() { 
			 	    if ($('input#<?php echo $this->campoSeguro('fecha_final')?>').val()!='')
	                    {
	                        $('#<?php echo $this->campoSeguro('fecha_inicio')?>').attr("class", "cuadroTexto ui-widget ui-widget-content ui-corner-all   validate[required]");
	                }else {
	                        $('#<?php echo $this->campoSeguro('fecha_inicio')?>').attr("class", "cuadroTexto ui-widget ui-widget-content ui-corner-all ");
	                    }
				  }
				
		   });
		   


		  

		  $( "#<?php echo $this->campoSeguro('tipo_poliza')?>" ).change(function() {
		        
	            switch($("#<?php echo $this->campoSeguro('tipo_poliza')?>").val())
	            {
	                           
	                case '0':
	                    
	                   
	                    $("#<?php echo $this->campoSeguro('fechas_polizas')?>").css('display','none');
	                   

	                   

	                break;
	                
	                
	                case '1':
	                    
	                  $("#<?php echo $this->campoSeguro('fechas_polizas')?>").css('display','block');
	       
	                break;
	                

	                default:
	                
	                $("#<?php echo $this->campoSeguro('fechas_polizas')?>").css('display','none');
	                   
	                   break;
	                
	                
	             }
	          });  
	  



		  
		    $("#<?php echo $this->campoSeguro('nivel')?>").change(function() {
		    	
				if($("#<?php echo $this->campoSeguro('nivel')?>").val()!=''){

					tipo_bien();	

				}else{}

		    });
			  

	        $("#<?php echo $this->campoSeguro('sede')?>").change(function(){
	        	if($("#<?php echo $this->campoSeguro('sede')?>").val()!=''){
	            	consultarDependencia();
	    		}else{
	    			$("#<?php echo $this->campoSeguro('dependencia')?>").attr('disabled','');
	    			}

	    	      });
	        





	        
	        $( "#<?php echo $this->campoSeguro('cantidad')?>" ).keyup(function() {
	            
	            $("#<?php echo $this->campoSeguro('valor')?>").val('');
	            $("#<?php echo $this->campoSeguro('subtotal_sin_iva')?>").val('');
	            $("#<?php echo $this->campoSeguro('total_iva')?>").val('');
	            $("#<?php echo $this->campoSeguro('total_iva_con')?>").val('');
	            
	          });  
		
	        $( "#<?php echo $this->campoSeguro('valor')?>" ).keyup(function() {
	        	$("#<?php echo $this->campoSeguro('subtotal_sin_iva')?>").val('');
	            $("#<?php echo $this->campoSeguro('total_iva')?>").val('');
	            $("#<?php echo $this->campoSeguro('total_iva_con')?>").val('');
	            
	            cantidad=Number($("#<?php echo $this->campoSeguro('cantidad')?>").val());
	            valor=Number($("#<?php echo $this->campoSeguro('valor')?>").val());
	            
	            precio = cantidad * valor;
	      
	      
	            if (precio==0){
	            
	            
	            $("#<?php echo $this->campoSeguro('subtotal_sin_iva')?>").val('');
	            
	            }else{
	            
	            $("#<?php echo $this->campoSeguro('subtotal_sin_iva')?>").val(precio);
	            
	            }

	          }); 
	          
	          $( "#<?php echo $this->campoSeguro('iva')?>" ).change(function() {
	        
	        
	        
			     switch($("#<?php echo $this->campoSeguro('iva')?>").val())
	            {
	                           
	                case '1':
	                 
	                 cantidad=Number($("#<?php echo $this->campoSeguro('cantidad')?>").val());
	            	 valor=Number($("#<?php echo $this->campoSeguro('valor')?>").val());
	       			 precio=cantidad * valor;
	       			 total=precio;
	       			 
	                 $("#<?php echo $this->campoSeguro('total_iva')?>").val('0');
	                 
	                 $("#<?php echo $this->campoSeguro('total_iva_con')?>").val(total);
	                                    
	                break;
	                
	                case '2':
	                 
	                 cantidad=Number($("#<?php echo $this->campoSeguro('cantidad')?>").val());
	            	 valor=Number($("#<?php echo $this->campoSeguro('valor')?>").val());
	       			 precio=cantidad * valor;
	       			 total=precio;
	       			 
	                 $("#<?php echo $this->campoSeguro('total_iva')?>").val('0');
	                 
	                 $("#<?php echo $this->campoSeguro('total_iva_con')?>").val(total);
	                                    
	                break;
	                
	                case '3':
	                
	                 cantidad=Number($("#<?php echo $this->campoSeguro('cantidad')?>").val());
	            	 valor=Number($("#<?php echo $this->campoSeguro('valor')?>").val());
	       			 iva = (cantidad * valor)* 0.05;
	       			 precio=cantidad * valor;
	       			 total=precio+iva;
	       			 
	                 $("#<?php echo $this->campoSeguro('total_iva')?>").val(iva);
	                 
	                 $("#<?php echo $this->campoSeguro('total_iva_con')?>").val(total);
	                    
	                break;
	                                
	                case '4':
	                
	                 cantidad=Number($("#<?php echo $this->campoSeguro('cantidad')?>").val());
	            	 valor=Number($("#<?php echo $this->campoSeguro('valor')?>").val());
	       			 iva = (cantidad * valor)* 0.04;
	       			 precio = cantidad*valor;
	       			 total=precio+iva;
	       			 
	                 $("#<?php echo $this->campoSeguro('total_iva')?>").val(iva);
	                 $("#<?php echo $this->campoSeguro('total_iva_con')?>").val(total);
	                                     
	                break;
	                

	                 case '5':
	                
	                 cantidad=Number($("#<?php echo $this->campoSeguro('cantidad')?>").val());
	            	 valor=Number($("#<?php echo $this->campoSeguro('valor')?>").val());
	       			 iva = (cantidad * valor)* 0.1;
	       			 precio = cantidad*valor;
	       			 total=precio+iva;
	       			 
	                 $("#<?php echo $this->campoSeguro('total_iva')?>").val(iva);
	                 $("#<?php echo $this->campoSeguro('total_iva_con')?>").val(total);
	                                     
	                break;
	                
	                 case '6':
	                
	                 cantidad=Number($("#<?php echo $this->campoSeguro('cantidad')?>").val());
	            	 valor=Number($("#<?php echo $this->campoSeguro('valor')?>").val());
	       			 iva = (cantidad * valor)* 0.16;
	       			 precio = cantidad*valor;
	       			 total=precio+iva;
	       			 
	                 $("#<?php echo $this->campoSeguro('total_iva')?>").val(iva);
	                 $("#<?php echo $this->campoSeguro('total_iva_con')?>").val(total);
	                                     
	                break;
	                
	                
	                default:
	                $("#<?php echo $this->campoSeguro('total_iva')?>").val('');
	                $("#<?php echo $this->campoSeguro('total_iva_con')?>").val('');
	                   
	                break;
	                
	                }
	            
	          });  
	          
	          $("#<?php echo $this->campoSeguro('iva')?>").select2();  
	          
	          
	         $( "#<?php echo $this->campoSeguro('tipo_bien')?>" ).change(function() {
	        
	        
	        
	          switch($("#<?php echo $this->campoSeguro('tipo_bien')?>").val())
	            {
	                           
	                
	                case '2':
	                
	                 $("#<?php echo $this->campoSeguro('cantidad')?>").val('1');
	                 $('#<?php echo $this->campoSeguro('cantidad')?>').attr('disabled','');

	                 break;
	                
	                case '3':
	                
	                 $("#<?php echo $this->campoSeguro('cantidad')?>").val('1');
	                 $('#<?php echo $this->campoSeguro('cantidad')?>').attr('disabled','');
	                    
	                break;
	                                
	           
	                break;
	                

	                default:
	                 
	                 $("#<?php echo $this->campoSeguro('cantidad')?>").val('');
	                 $('#<?php echo $this->campoSeguro('cantidad')?>').removeAttr('disabled');
	                 
	                break;
	                
	                }
	            
	          });  
	        





			
	    });
	


</script>

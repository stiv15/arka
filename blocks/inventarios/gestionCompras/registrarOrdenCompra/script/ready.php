
// Asociar el widget de validación al formulario
     $("#registrarOrdenCompra").validationEngine({
            promptPosition : "centerRight", 
            scroll: false,
            autoHidePrompt: true,
            autoHideDelay: 2000
	         });
	

        $(function() {
            $("#registrarOrdenCompra").submit(function() {
                $resultado=$("#registrarOrdenCompra").validationEngine("validate");
                   
                if ($resultado) {
                
                    return true;
                }
                return false;
            });
        });

        
        	$('#<?php echo $this->campoSeguro('proveedor')?>').attr('disabled','');
        	$('#<?php echo $this->campoSeguro('nitProveedor')?>').attr('disabled','');
        	$('#<?php echo $this->campoSeguro('direccionProveedor')?>').attr('disabled','');
        	$('#<?php echo $this->campoSeguro('telefonoProveedor')?>').attr('disabled','');
        	$('#<?php echo $this->campoSeguro('direccionDependencia')?>').attr('disabled','');
        	$('#<?php echo $this->campoSeguro('telefonoDependencia')?>').attr('disabled','');
        	$('#<?php echo $this->campoSeguro('total_iva')?>').attr('disabled',''); 
		    $('#<?php echo $this->campoSeguro('total')?>').attr('disabled','');  
		    $('#<?php echo $this->campoSeguro('total_preliminar')?>').attr('disabled','');    
        	
        	
        
            $("#<?php echo $this->campoSeguro('reg_prov')?>").select2();
        

        $('#<?php echo $this->campoSeguro('fecha_diponibilidad')?>').datepicker({
	        dateFormat: 'yy-mm-dd',
	        maxDate: 0,
	        changeYear: true,
	        monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
				'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
				monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
				dayNames: ['Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado'],
				dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sab'],
				dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa']
        });
        
        
        
         $("#<?php echo $this->campoSeguro('selec_dependencia')?>").select2();
         
        $("#<?php echo $this->campoSeguro('selec_proveedor')?>").select2({
   		 placeholder: "Search for a repository",
   		 minimumInputLength: 3,

       });
    
    
         
          $("#<?php echo $this->campoSeguro('cargoJefeSeccion')?>").select2();
	      
          $("#<?php echo $this->campoSeguro('asignacionOrdenador')?>").select2();
         
    		$('#<?php echo $this->campoSeguro('nombreJefeSeccion')?>').attr('disabled','');
        	$('#<?php echo $this->campoSeguro('nombreOrdenador')?>').attr('disabled','');     
        
        
	             
        $( "#<?php echo $this->campoSeguro('reg_proveedor')?>" ).change(function() {
        
        
        if($( "#<?php echo $this->campoSeguro('reg_proveedor')?>" ).val()==0){
        
      
        
        $('#<?php echo $this->campoSeguro('proveedorDiv')?>').css('display','block');
        
        $('#<?php echo $this->campoSeguro('proveedor')?>').val('');
        $('#<?php echo $this->campoSeguro('nitProveedor')?>').val('');
        $('#<?php echo $this->campoSeguro('direccionProveedor')?>').val('');
        $('#<?php echo $this->campoSeguro('telefonoProveedor')?>').val('');
        	
        $('#<?php echo $this->campoSeguro('proveedor')?>').attr('disabled','');
        $('#<?php echo $this->campoSeguro('nitProveedor')?>').attr('disabled','');
        $('#<?php echo $this->campoSeguro('direccionProveedor')?>').attr('disabled','');
        $('#<?php echo $this->campoSeguro('telefonoProveedor')?>').attr('disabled','');
        	

        	
        	
        
        }else if($( "#<?php echo $this->campoSeguro('reg_proveedor')?>" ).val()==1){
        
        
        $('#<?php echo $this->campoSeguro('proveedorDiv')?>').css('display','none');
        
 		$('#<?php echo $this->campoSeguro('proveedor')?>').val('');
        $('#<?php echo $this->campoSeguro('nitProveedor')?>').val('');
        $('#<?php echo $this->campoSeguro('direccionProveedor')?>').val('');
        $('#<?php echo $this->campoSeguro('telefonoProveedor')?>').val('');
        	
        $('#<?php echo $this->campoSeguro('proveedor')?>').removeAttr('disabled');
        $('#<?php echo $this->campoSeguro('nitProveedor')?>').removeAttr('disabled');
        $('#<?php echo $this->campoSeguro('direccionProveedor')?>').removeAttr('disabled');
        $('#<?php echo $this->campoSeguro('telefonoProveedor')?>').removeAttr('disabled');
        	

        
        }
        
        
        });
   
        
 
        

        
        
          







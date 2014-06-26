<?php session_start(); ?>

<!-- ZONA DE ALERTAS -->

<div id="alertZone" class="mp row-fluid "></div>

<!-- ZONA DE BOTONES, BARRAS Y FILTROS -->


	
<!-- TOOLBAR DE ACCIONES -->	
<!-- 
<div class="row-fluid">

	<div class="span12">
		<div class="btn-toolbar pull-right">	
		
			<div class="btn-group ">
				<a class="btn btn-success dropdown-toggle" data-toggle="dropdown" href="#">
			  		<i class="icon-cog icon-white"></i>
				    	Facturas
				    	<span class="caret"></span>
				</a>
				<ul class="mp toolbar dropdown-menu pull-right">					
				    <li><a href="#mp_modal_registro" class="showModal"><i class="icon-file "></i>  Nuevo</a></li>
				</ul>			  
			</div>		
		</div>
	</div>
</div>	
	
 -->
					
	
				
<div class="row-fluid">&nbsp;</div>

<!-- CONTENEDOR PRINCIPAL DEL MODULO -->
									
<div class="row-fluid tablecontainer" >							
	<div class="content">

		
	
		<form class="mp form_registro" action="add">
		
			<div class="row-fluid">
				
				<div class="span3">
		    	<span class="editlabel"> Usuario: <b class='text-info'></b></span>
			    	<input type="text" class="span12" name="username" readonly="readonly" 
			    	value="<?php echo $_SESSION["login"]["username"]?>"/>    	
		    	</div>
		    	        		
		    	<div class="span3">
		    	<span class="editlabel"> Nombre: <b class='text-info'></b></span>
			    	<input type="text" class="span12" name="nombre" readonly="readonly"
			    	value="<?php echo $_SESSION["login"]["nombre"]?>"/>    	
		    	</div>
		    	
		    	<div class="span3">
		    	<span class="editlabel"> Razon Social: <b class='text-info'></b></span>
			    	<input type="text" class="span12" name="razon_social" readonly="readonly" 
			    	value="<?php echo $_SESSION["login"]["razon_social"]?>"/>    	
		    	</div>
		    	
		    	<div class="span3">
		    	<span class="editlabel"> RFC: <b class='text-info'></b></span>
			    	<input type="text" class="span12" name="rfc" readonly="readonly" 
			    	value="<?php echo $_SESSION["login"]["rfc"]?>"/>    	
		    	</div>		    	
		    </div>
		    
		    <div class="row-fluid">
		    	
		    	<div class="span6">
		    	<span class="editlabel"> Direccion: <b class='text-info'></b></span><br>
			    	<input type="text" class="span12" name="direccion" readonly="readonly" 
			    	value="<?php echo $_SESSION["login"]["direccion"]?>"/>    	
		    	</div>		    	
		    	    
		    </div>
		
			 <!-- 
			 <div class="row-fluid">
		    	<button class="btn btn-success pull-right">Guardar</button>
		    </div>	    
			 -->
		</form>
	
	</div>
</div>	

<!-- MODAL DE REGISTRO -->



	<div id="mp_modal_registro" class="mp modal hide fade" tabindex="-1" role="dialog" aria-hidden="true">
	
		
		  
		<div class="modal-body" >          
	    	
			<div class="row-fluid">        		
		    	<div class="span6">
		    		<span class="editlabel">Cliente: <b class='text-info'></b></span>
			    	<select name="cliente">
			    		<option selected="selected">Seleccione un cliente</option>
			    	</select>	    	
		    	</div>
		    	<div class="span6">		    	   	
		    		
		    		<span class="editlabel">Fecha de Registro: <b class='text-info'></b></span>		    	   	
			    	<input type="date" name="fecha_registro" required="required"/>
		    	
		    				    	
		    	</div>
	    	</div>    	    	
	    	
	    	<div class="row-fluid">&nbsp;</div>
	    	
	    	<div class="row-fluid">        		
		    	<div class="span6">
		    	<span class="editlabel"> Metodo de Pago: <b class='text-info'></b></span>
			    	<input type="text" name="metodo_pago" readonly="readonly" />    	
		    	</div>
		    	<div class="span6">
		    		
		    		<span class="editlabel">Producto: <b class='text-info'></b></span>
			    	<select name="producto">
			    		<option selected="selected">Seleccione un producto</option>
			    	</select>	    	
		    	</div>
	    	</div>
	    	
	    	<div class="row-fluid">&nbsp;</div>
	    	
	    	<div class="row-fluid">        		
		    	<div class="span6">
		    	<span class="editlabel"> Precio Unitario: <b class='text-info'></b></span>
			    	<input type="text" name="precio" readonly="readonly"/>    	
		    	</div>
		    	<div class="span6">
		    		
		    		<span class="editlabel">Cantidad: <b class='text-info'></b></span>
			    	<input type="text" name="cantidad" required="required" pattern="[1-9]*"/>	    	
		    	</div>
	    	</div>
	    	
	    	<div class="row-fluid">&nbsp;</div>
	    	
	    	<div class="row-fluid">        		
		    	<div class="span6">
		    	<span class="editlabel"> Impuesto: <b class='text-info'></b></span>
			    	<input type="text" name="IVA" readonly="readonly"/>    	
		    	</div>
		    	<div class="span6">
		    		
		    		<span class="editlabel">Total: <b class='text-info'></b></span>
			    	<input type="text" name="total" readonly="readonly""/>	    	
		    	</div>
	    	</div>     
		</div>
	
		<div class="modal-footer">
			<button type="button" class="btn cancel" data-dismiss="">Cancelar</button>
			<button class="btn btn-success send">Registrar</button>
		</div> 
	</div>  
</form> 

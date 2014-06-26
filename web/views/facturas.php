<!-- ZONA DE ALERTAS -->

<div id="alertZone" class="gf row-fluid "></div>

<!-- ZONA DE BOTONES, BARRAS Y FILTROS -->

<div class="row-fluid">

	<div class="span12">
	
		<!-- TOOLBAR DE ACCIONES -->
		
		
		<div class="btn-toolbar pull-right">
		
			<!-- <a class="btn btn-success refresh gf">
				<i class="icon-repeat icon-white"></i> Actualizar</a> -->
		
			<div class="btn-group ">
				<a class="btn btn-success dropdown-toggle" data-toggle="dropdown" href="#">
			  		<i class="icon-cog icon-white"></i>
				    	Facturas
				    	<span class="caret"></span>
				</a>
				<ul class="gf toolbar dropdown-menu pull-right">
					<!-- dropdown menu links -->
				    <!-- <li><a href="javascript:;" class="accionRegistro estatus"><i class="icon-ban-circle"></i> Bloq/Desbloq</a></li>
				    <li><a href="javascript:;" class="accionRegistro eliminar"><i class="icon-trash "></i>  Eliminar</a></li>
				    <li class="divider"></li> -->
				    <li><a href="#gf_modal_registro" class="showModal"><i class="icon-file "></i>  Nuevo</a></li>
				</ul>			  
			</div>
		
		</div>
	
					
	</div>
</div>
				
<div class="row-fluid">&nbsp;</div>

<!-- CONTENEDOR PRINCIPAL DEL MODULO -->
									
<div class="row-fluid tablecontainer" >							
	<div class="content"></div>
</div>	

<!-- MODAL DE REGISTRO -->

<form class="gf form_registro" action="add">

	<div id="gf_modal_registro" class="gf modal hide fade" tabindex="-1" role="dialog" aria-hidden="true">
	
		<div class="modal-header">
			<button type="button" class="close cancel">&times;</button>
			<h4 class="text-success">Nueva Factura</h4>
			<span class="muted"> A continuacion proporcione los datos necesarios para registrar la factura.</span>
		</div>
		  
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

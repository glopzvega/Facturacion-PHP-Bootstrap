var Facturas = function(){
	
	this.consultarFacturas = function(util){
		
		var context = this;		
		
		$.post("controlador.php", {action : "factura", method : "load"}, function(facturas){
			
			facturas = $.parseJSON(facturas);
			var size = util.sizeOf(facturas.data);
			
			context.mostrarFacturas(facturas.data, size);			
		});		
	};
	
	this.consultarClientes = function(){
		
		var app = this;
		
		$.post("controlador.php", {action : "cliente", method : "load"}, function(response){
				
			response = $.parseJSON(response);
			
			app.data = app.data || {};
			app.data.clientes = response.data;			
		});
	};
	
	this.consultarProductos = function(){
		
		var app = this;
		
		$.post("controlador.php", {action : "producto", method : "load"}, function(response){
			
			response = $.parseJSON(response);
			
			app.data = app.data || {};
			app.data.productos = response.data;					
		});	
	};
	
	this.mostrarFacturas = function(facturas, size){
		
		var app = this;
		var table = "<table class='table table-hover'>";
		table += "<thead><tr>";
			
			table += "<th><input type='checkbox' class='headId'></th>";
			table += "<th>Cliente</th>";
			table += "<th>Producto</th>";
			table += "<th>Cantidad</th>";
			table += "<th>Precio Unitario</th>";
			table += "<th>IVA</th>";
			table += "<th>Total</th>";
			table += "<th>Fecha de Registro</th>";
			table += "<th>Metodo de Pago</th>";					
		
		table += "</tr></thead>";
				
		var c = 0;
		
		$.each(facturas, function(i, factura){
						
			table += "<tr>";
			table += "<td><input type='checkbox' id='" + factura.idfactura + "' class='rowId'></td>";
			table += "<td>" + factura.partner + "</td>";
			table += "<td>" + factura.nombre + "</td>";
			table += "<td>" + factura.cantidad + "</td>";
			table += "<td> $ " + factura.precio + ".00 </td>";
			table += "<td> $ " + factura.IVA + ".00 </td>";
			table += "<td> $" + factura.total + ".00 </td>";
			table += "<td>" + factura.fecha_registro + "</td>";
			table += "<td>" + factura.metodo_pago + "</td>";
			table += "</tr>";
			
			c++;
			
			if(size == c){
							
				var selector = $("#tabContent_facturas");			
				selector = selector.find(".tablecontainer > .content").html(table);
				
				var header = selector.find("table > thead").find("tr");
				var filas = selector.find("table > tbody").find("tr");
				
				app.addEventosHeader($(header));
				
				$.each(filas, function(i, fila){
					app.addEventosFila($(fila));
				});
			}			
		});	
	};
	
	this.generarFila = function(factura){
		
		var app = this;
		var clientes = app.data.clientes;
		var productos = app.data.productos;
		
		var fila = "<tr class='new'>";
		fila += "<td><input type='checkbox' id='" + factura.idfactura + "' class='rowId'></td>";
		fila += "<td>" + clientes[factura.cliente].partner + "</td>";
		fila += "<td>" + productos[factura.producto].nombre + "</td>";
		fila += "<td>" + factura.cantidad + "</td>";
		fila += "<td> $ " + factura.precio + ".00 </td>";
		fila += "<td> $ " + factura.IVA + ".00 </td>";
		fila += "<td> $" + factura.total + ".00 </td>";
		fila += "<td>" + factura.fecha_registro + "</td>";
		fila += "<td>" + factura.metodo_pago + "</td>";
		fila += "</tr>";
		
		return fila;		
	};
	
	this.registrarFactura = function(data){
		
		var app = this;
		
		$.post("controlador.php?" + data, {action : "factura", method : "add"}, function(response){
			
			app.util.hideModals();
			response = $.parseJSON(response);		
			
			if(response.success){
				
				app.util.mostrarAlerta($("#alertZone.gf"), "Registro Agregado Exitosamente", "alert-success");
				
				var selector = $("#tabContent_facturas");
				var tabla = selector.find("table");
								
				
				var fila = tabla.append(app.generarFila(response.data)).find("tr.new");
				
				console.log(app.generarFila(response.data));	
				app.addEventosFila(fila);
			}
			
			console.log(response);			
		});
	};
	
	this.defaultModalAccion = function(selector, util){				
		
		var app = this;	
		var modal = util.showModal(selector);
				
		if(app.data.clientes == null)
			app.consultarClientes();		
		
		if(app.data.productos == null)
			app.consultarProductos();
		
		app.prepareDatosModal(function(){		
			
			var form = modal.parents("form");			
			form.attr("action", "add");	
		});	
	};
	
	this.prepareDatosModal = function(callback){
		
		var app = this;
		var clientes = app.data.clientes;
		var productos = app.data.productos;
		
		console.log(clientes)
		console.log(productos)
		
		var optClientes = "";
		$.each(clientes, function(i, cliente){
			optClientes += "<option value='" + cliente.idpartner + "'>" + cliente.partner + "</option>";
		});
		
		var optProductos = "";
		$.each(productos, function(i, producto){
			optProductos += "<option value='" + producto.id_producto + "'>" + producto.nombre + "</option>";
		});
			
		var clienteId = $("select[name=cliente]").html(optClientes).val();
		var productoId = $("select[name=producto]").html(optProductos).val();
		
		$("input[name=metodo_pago]").val(clientes[clienteId].metodo_pago);
		
		var inputPrecio = $("input[name=precio]").val(productos[productoId].precio);
		var inputCantidad = $("input[name=cantidad]").val(1);
		
		var subtotal = inputPrecio.val() * inputCantidad.val();			
		var IVA = $("input[name=IVA]").val(Math.round(subtotal * 0.16)).val();
		
		$("input[name=total]").val(parseInt(subtotal) + parseFloat(IVA));		
		
		callback();		
	};
	
	this.addEventosHeader = function(header){
		
		var app = this;
		var headId = header.find(".headId");
		var table = header.parents("table");
		
		headId.on("click", function(){
				
			var head = $(this);
			
			if(head.is(":checked"))
				app.util.selectAllRows(table, false);		
			else
				app.util.selectAllRows(table, true);		
			
		});
		
	};
	
	this.addEventosFila = function(fila){
		
		var app = this;
		var table = fila.parents("table");
		
		fila.on("click", function(){		
			
			if(fila.hasClass("selected"))			
				app.util.selectRow(fila, true);							
			else
				app.util.selectRow(fila, false);
			
			if(table.find("tr.selected").length > 0 && table.find("tbody > tr.selected").length == table.find("tbody > tr").length)				
				table.find(".headId").prop("checked", true);					
			else			
				table.find(".headId").prop("checked", false);		
		});	
		
	};
};

$(function(){
	
	var app = new Facturas();	 
	var util = new App();
	app.util = util;
	
	app.consultarFacturas(util);	
	app.consultarClientes();	
	app.consultarProductos();

	$(".gf .showModal").on("click", function(){			
		app.defaultModalAccion($(this), util);
	});	
	
	$(".gf.form_registro").submit(function(e){
		e.preventDefault();			
					
		var form = $(this);		
		var data = form.serialize();
		
		app.registrarFactura(data);
	});
	
	$(".gf.modal button").on("click", function(){			
		
		var btn = $(this);						

		if(btn.hasClass("cancel"))
			util.hideModals();			
	});	
	
	$("input[name=cantidad]").on("change", function(){
		
		var precio = $("input[name=precio]").val();		
		var subtotal = precio * $(this).val();
		var IVA = subtotal * 0.16;
		
		$("input[name=IVA]").val(Math.round(IVA));
		$("input[name=total]").val(parseInt(subtotal + IVA));		
	});
	
	$("select[name=cliente]").on("change", function(){
		
		var idCliente = $(this).val();
		var cliente = app.data.clientes[idCliente];
		$("input[name=metodo_pago]").val(cliente.metodo_pago);		
	});
	
	$("select[name=producto]").on("change", function(){
		
		var idProducto = $(this).val();
		var producto = app.data.productos[idProducto];
		$("input[name=precio]").val(producto.precio);
		
		var cantidad = $("input[name=cantidad]").val();
		var precio = $("input[name=precio]").val();		
		var subtotal = precio * cantidad;
		var IVA = subtotal * 0.16;
		
		$("input[name=IVA]").val(Math.round(IVA));
		$("input[name=total]").val(parseInt(subtotal + IVA));
	});


});
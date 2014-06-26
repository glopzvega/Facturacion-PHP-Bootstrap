var Productos = function(){
	
	this.consultarProductos = function(util){
		
		var context = this;
		
		$.post("controlador.php", {action : "producto", method : "load"}, function(productos){
			
			productos = $.parseJSON(productos);
			var size = util.sizeOf(productos.data);			

			context.mostrarProductos(productos.data, size);			
		});		
	};	
	
	this.mostrarProductos = function(productos, size){
		
		var table = "<table class='table table-hover'>";
		table += "<tr>";
		
			table += "<th><input type='checkbox' class='headId'></th>";
			table += "<th>Nombre</th>";
			table += "<th>Tipo</th>";
			table += "<th>Precio</th>";
			table += "<th>IVA</th>";		
		
		table += "</tr>";
				
		var c = 0;
		
		$.each(productos, function(i, producto){
			
			var tipo = (producto.tipo == 1) ? "Servicio" : "Articulo";
			var iva = (producto.iva == 1) ? "Si" : "No";
			
			table += "<tr>";
			table += "<td><input type='checkbox' id='" + producto.id_producto + "' class='rowId'></td>";
			table += "<td>" + producto.nombre + "</td>";
			table += "<td>" + tipo + "</td>";
			table += "<td> $ " + producto.precio + ".00 </td>";
			table += "<td>" + iva + "</td>";
			table += "</tr>";
			
			c++;
			
			if(size == c){
							
				var selector = $("#tabContent_productos");			
				selector.html(table);
			}
			
		});	
	};
};

$(function(){
	
	var app = new Productos();
	var util = new App();		
		
	app.consultarProductos(util);
	
});
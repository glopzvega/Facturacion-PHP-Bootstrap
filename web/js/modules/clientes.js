var Clientes = function(){
	
	this.consultarClientes = function(util){

		var context = this;

		$.post("controlador.php", {action : "cliente", method : "load"}, function(clientes){
			
			clientes = $.parseJSON(clientes);
			var size = util.sizeOf(clientes.data);
			
			context.mostrarClientes(clientes.data, size);			
		});		
	};	
	
	this.mostrarClientes = function(clientes, size){
		
		var table = "<table class='table table-hover'>";
		table += "<tr>";
		
			table += "<th><input type='checkbox' class='headId'></th>";
			table += "<th>Nombre</th>";
			table += "<th>Razon Social</th>";
			table += "<th>RFC</th>";
			table += "<th>Direccion</th>";		
		
		table += "</tr>";
				
		var c = 0;
		
		$.each(clientes, function(i, cliente){
						
			table += "<tr>";
			table += "<td><input type='checkbox' id='" + cliente.idpartner + "' class='rowId'></td>";
			table += "<td>" + cliente.partner + "</td>";
			table += "<td>" + cliente.razon_social + "</td>";
			table += "<td>" + cliente.rfc + "</td>";
			table += "<td>" + cliente.direccion + "</td>";
			table += "</tr>";
			
			c++;
			
			if(size == c){
							
				var selector = $("#tabContent_clientes");			
				selector.html(table);
			}			
		});	
	};

};

$(function(){
	
	var app = new Clientes();
	var util = new App();
	
	app.consultarClientes(util);
	
});
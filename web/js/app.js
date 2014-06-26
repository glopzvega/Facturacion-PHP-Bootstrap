var App = function(){
	
	this.request = function(page){
		
		var app = this;
		
		$.post("controlador.php", {action : "loader", module : page}, function(data){
//			console.log(data);
			opc = {
				html : data,
				context : page
			}
			app.cargarModulo(opc);			
		});
		
	};
	
	this.cargarModulo = function(response){
		
		var app = this;	
		
		var tabContainer = $("#TabModuleContainer");
		var tabs = tabContainer.find("li > a");	
		
		if(tabs.length > 0){
			
			$.each(tabs, function(index, value){
				
				var tabHref = $(this).attr("href");		
				
				if(tabHref == "#tabContent_" + response.context){			
					$("#tabContent_" + response.context).html(response.html);
					$(this).tab("show");
					return false;
				}
		
				if(index == tabs.length - 1){				
					
					var tabContent = $(this).parents(".tabbable").find(".tab-content");
					var tabSelector = app.agregarTabModule(response, tabContainer, tabContent);		
					app.mostrarTab(tabSelector);
				} 
			});
		}
		else{
			
			var tabContent = tabContainer.parents(".tabbable").find(".tab-content");
			var tabSelector = app.agregarTabModule(response, tabContainer, tabContent);
			app.mostrarTab(tabSelector);
		}		
		
		app.callbackRequest(response);
	};
	
	this.callbackRequest = function(response){		
		
		var script_src = "src='web/js/modules/" + response.context + ".js'";
		$("#tabContent_" + response.context).append("<script "+ script_src + " type='text/javascript'></script>");		
	};
	
	this.agregarTabModule = function(response, tabContainer, tabContent){

		module = {
				perfil : {
					id : "mp",
					text : "Mi Perfil",
					icon : "cog"
				},
				productos : {
					id : "gp",
					text : "Gestion de Productos",
					icon : "cog"
				},
				clientes : {
					id : "gc",
					text : "Gestion de Clientes",
					icon : "cog"
				},
				facturas : {
					id : "gf",
					text : "Gestion de Facturas",
					icon : "cog"
				}				
		};
		
		
		var tab = "<li class='tab_module' id='tab_" + response.context + "'><a href='#tabContent_" + response.context + "' data-toggle='tab'>" +
				"<button type='button' class='close'> &nbsp; &times;</button>" +
				"<i class='icon-" + module[response.context].icon + "'></i> " + module[response.context].text + "</a></li>";
		
		var content = "<div class='tab-pane " + module[response.context].id + "' id='tabContent_" + response.context + "'>" + response.html + "</div>";
		
		tabContainer.append(tab);
		tabContent.append(content);
		
		var tab = $("a[href='#tabContent_" + response.context + "']");
		this.addEventosTab(tab);
		
		return tab;
	};

	this.addEventosTab = function(tab){
		
		var app = this;
		var btnClose = tab.find(".close");
		
		btnClose.on("click", function(){
			app.cerrarTab(tab);			
		});	
	};

	this.mostrarTab = function(tabSelector){	
		tabSelector.tab("show");	
	};

	this.cerrarTab = function(tab){
		
		var tabId = tab.attr("href");
		
		tab.parents(".tab_module").remove();
		$(".tab-content").find(tabId).remove();
		$("#TabModuleContainer").find("a:last").tab("show");	
	};
	
	this.sizeOf = function(model){
		
		var longitud = 0;	
		if(model != null){		
			for(var i in model){
				longitud++;			
			}
		}	
		return longitud;
	};
	
	this.showModal = function(selector){	
		
		var idmodal = selector.attr("href");	
		var modal = $(idmodal).modal("show");
		
		this.initForm(modal.parents("form"));
		
		return modal; 
	};
	
	this.hideModals = function(){
		
		var modal = $(".modal").modal("hide");
		var form = modal.parent("form");
		var progress = modal.find(".progressZone");
		
		progress.hide();
		this.initForm(form);
	};

	this.initForm = function(form){
		
		$.each(form.find("input"), function(index, value){
			
			var input = $(value);
			var inputc = input.parent();		
			
			if(input.hasClass("changed")){
				
				input.removeClass("changed").show();
				inputc.find("span b").text("");
			}
		});
		
		form.reset();	
	};
	
	this.selectRow = function(row, b){
		
		if(b){
			row.removeClass("info selected").find(".rowId").prop('checked', false);
			row.find(".accionRegistro i").removeClass("icon-white");
		}		
		else{
			row.addClass("info selected").find(".rowId").prop('checked', true);
			row.find(".accionRegistro i").addClass("icon-white");
		}			
	};
	
	this.selectAllRows = function(table, b){
		
		var app = this;
		var rows = table.find("tbody tr");	
		
		$.each(rows, function(index, value){
			app.selectRow($(value), b);
		});		
	};
	
	this.mostrarAlerta = function(selector, message, clase){	
		
		var app = this;
		app.eliminarAlertas(selector, "slow");
		
		var alerta = "<div class='alert " + clase + "'>" +
			"<button type='button' class='close' data-dismiss='alert'>&times;</button>" + 
			message + "<div>";	
		
		alerta = selector.html(alerta).find(".alert");	
		
		setTimeout(function(){		
			app.eliminarAlertas(selector, "slow");}, 3000);
	};

	this.eliminarAlertas = function(alertZone, opcion){
			
		var app = this;
		var alerts = alertZone.find(".alert");
			
		$.each(alerts, function(index, value){
			app.eliminarAlerta($(value), opcion);
		});	
	};
	
	this.eliminarAlerta = function(alert, opcion){
		
		alert.fadeOut(opcion, function(){
			alert.remove();
		});
	};

};

jQuery.fn.reset = function () {
	  $(this).each (function() { this.reset(); });
};

$(function(){
	
	var app = new App();
	
	$(".opcionMenu").on("click", function(e){
		e.preventDefault();
		
		var page = $(this).attr("href").replace("#", "");
		app.request(page);
		
	});
	
	
});
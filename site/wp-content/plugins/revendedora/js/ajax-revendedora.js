jQuery(function($) {
	
	// validacao do cpf on blur
	$("#cpf").on("blur",function(){
		var cpf = this.value.replace(/\D/g, '');
		if(validarCPF(cpf))
			ajaxCPF(cpf);
		else
			alert("cpf invalido");
	});

function ajaxCPF(cpf){
	console.log(ajax_url);
	$.ajax({
		url : ajax_url.check_cpf,
		data: {
			'cpf':cpf,
			'path': ajax_url.path
		},
		type: 'POST',
		dataType:'json',
		success:function(data){

		}
	});
}

});
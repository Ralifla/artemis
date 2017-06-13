jQuery(function($) {
	
	// primeira parte do cadastro
	$("#first-step").validate({
		 rules: {
			 	cpf: {
		 			required: true, 
		 			cpfValido: true
			 	},
	        	name: {required: true, minlength: 8, regex:"^[a-zA-Z]*$" },
	        	sexo: {required: true, sexoFeminino: true},
	        	estado_civil: {required: true},
	        	residencia: {required: true},
	        	data_nascimento: {required: true, checkAge: true},
	        	email: {required: true, email: true},
	        	cep: {required: true}
	        },errorPlacement: function(error, element) {
	            if(element.is(":radio") || element.is(":checkbox"))
	                error.appendTo( element.parents('.msg-append') );
	            else
	            	error.insertAfter(element);
	        },
	        submitHandler: function (form,event) {
				event.preventDefault();
				placeLoading();
				
				var dataSerialize = $('form#first-step').serializeArray();
				dataSerialize.push({ name: "path", value: ajax_url.path });
				
				$.ajax({
					url: ajax_url.first_step,
					type: "POST",
					dataType: "json",
					data: dataSerialize,
					success: function(data){
						var html;
						if(data.error == null){
							// inicia segundo etapa
							var html = "<p>A primeira parte do cadastro foi concluída com sucesso!</p>"
							$("#cadastro-alert").removeClass().addClass("alert alert-success");
							second_step();
						}else{
							// erro ao cadastrar
							var html = "<strong>Ops!</strong><p>Ocorreu um erro ao realizar o cadastro, tente novamente</p>"
							$("#cadastro-alert").removeClass().addClass("alert alert-danger");
						}
						// appenda msg e faz scroll
						$("#cadastro-alert").html(html);
						$('html,body').animate({
					        scrollTop: $("#cadastro-alert").offset().top
				        },'slow');
					}
				});
				removeLoading();
	        }
	});
	
	// segunda parte do cadastro
	$("#second-step").validate({
		 rules: {
			 	rg: {required: true, minlength: 8},
			 	facebook: {required: true}
	        },errorPlacement: function(error, element) {
	            if(element.is(":radio") || element.is(":checkbox"))
	                error.appendTo( element.parents('.msg-append') );
	            else
	            	error.insertAfter(element);
	        },
	        submitHandler: function (form,event) {
				event.preventDefault();
				placeLoading();
				
				var formData = new FormData($("#second-step")[0]);
				formData.append("path", ajax_url.path);
				
				$.ajax({
					url: ajax_url.second_step,
					type: "POST",
					dataType: "json",
			        contentType: false,
			        processData: false,
					data: formData,
					success: function(data){
						if(data.error == null){
							// cadastro finalizado
						}else{
							// erro ao finalizar cadastro
						}
					}
				});
				removeLoading();
	        }
	});
	
	// validacao do cpf on blur
	$("#cpf").on("blur",function(){
		var cpf = this.value.replace(/\D/g, '');
		cpf_cadastrado(cpf)
	});
	
	// validacao do cep on blur
	$("#cep").on("blur",function(){
		var cep_val = this.value.replace(/\D/g, '');
		fill_cep_data(cep_val,this);
	});
	
	// segunda etapa do cadastro
	function second_step(){
		$("#first-step").fadeOut("750");
		$("#second-step").removeAttr("style").fadeIn();
	}
	
	// webservise de validação do CEP
	function fill_cep_data(cep, elem){
		placeLoading();
		var obj = $(elem).parents(".container-endereco");
		obj = $(obj).find("input");
		$.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {
            if (!("erro" in dados)) {
            	//Atualiza os campos com os valores da consulta.
            	for(var i in obj){
            		if(i.replace(/\D/g, '')){
            			for(var j in dados){
            				if(obj[i].name == j){
            					obj[i].value = dados[j];
            					break;
            				}
            			}
            		} else break;
            	}
            }else{
            	for(var i in obj){
            		if(i.replace(/\D/g, ''))
            			obj[i].value = "";
            		else break;
            	}
            	$("#cep-error").remove();
				var msg = '<label id="cep-error" class="error" for="cep">CEP não encontrado.</label>';
				$("#cep").parent().append(msg);
            }
            removeLoading();
        });
	}
	
	// verifica se CPF possui cadastro no banco
	function cpf_cadastrado(cpf){
		$.ajax({
			url : ajax_url.check_cpf,
			data: {
				'cpf':cpf,
				'path': ajax_url.path
			},
			type: 'POST',
			async: true,
			dataType:'json',
			success:function(data){
				if(data.error != null){
					$("#cpf").val('');
					$("#cpf-error").remove();
					var msg = '<label id="cpf-error" class="error" for="cpf">Este CPF já possui cadastro em nosso sistema</label>';
					$("#cpf").parent().append(msg);
				}
			}
		});
	}
	
	// add estado de loading
	function placeLoading(){
		$(".page-container").addClass("status-loading");
	}
	// remove estado de loading
	function removeLoading(){
		$(".page-container").removeClass("status-loading");
	}
});
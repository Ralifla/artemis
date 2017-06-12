jQuery(function($) {
	// sobrescreve mensagens padrão do validate
	$.extend($.validator.messages, {
        required: "Por gentileza preencha este campo.",
        email: "Ops, digite um e-mail válido."
    });
	
	// mascaras
	$("input[name='cep']").mask("99999-999");
	$("input[name='data_nascimento']").mask("99/99/9999",{placeholder:"dd/mm/aaaa"});
	$("input[type='tel']").mask("(99) 9999-9999?9").focusout(function(event) {
        var target, phone, element;
        target = (event.currentTarget) ? event.currentTarget : event.srcElement;
        phone = target.value.replace(/\D/g, '');
        element = $(target);
        element.unmask();
        if (phone.length > 10) 
            element.mask("(99) 99999-999?9");
        else 
            element.mask("(99) 9999-9999?9");
        
	});
	
	/*
	 * regras do validate
	 */
		
	// expressão regular
	$.validator.addMethod(
		"regex",
		function(value, element, regexp) {
		    var re = new RegExp(regexp);
		    return this.optional(element) || re.test(value);
		},
		"Não é permitido o uso de caracteres especiais."
	);
	
	// cpf valido
	$.validator.addMethod(
		"cpfValido",
		function(value) {
			var cpf = value.replace(/\D/g, '');
			var check = validarCPF(cpf);
			if(!check) 
				return false;
		    return true;
		},
		"Digite um CPF válido"
	);
	
	// sexo feminino
	$.validator.addMethod(
		"sexoFeminino",
		function(value) {
			if(value == "FEMININO")
				return true;
			return false;
		},
		"Este cadastro é restrito ao público feminino"
	);

	// idade > 21
	$.validator.addMethod(
			"checkAge",
			function(value) {
				var age = value.split("/");
				age = new Date(age[2],age[1]-1,age[0]);
				
				if(calculateAge(age) < 21)
					return false;
				return true;
			},
			"Cadastro restrito a maiores de 21 anos"
	);
	// FIM REGRAS VALIDATE
	
	/*
	 * manipulações de html com js
	 */
	
	// mostra campos do parceiro
	$("input[name='estado_civil']").on("change",function(){
		if(this.value == "CASADA" || this.value == "AMASIADA")
			$(".parceiro").fadeIn("600");
		else
			$(".parceiro").fadeOut("600");
	});
	
	// add parentesco em select de referencias
	var parentesco = ['Mãe/Pai','Irmão(a)','Genro/Nora','Sogro(a)','Filho(a)','Amigo Próximo','Vizinho','Colega de Trabalho','Outro'];
	addOptionSelect(parentesco,$("#referencia-1"));
	
	// add novo campo de referencia
	$("#add-referencia").on("click",function(){
		var count = $(".referencias .container-referencia").length;
		count++;
		var html = '<div class="container-referencia">';
				html += '<div>';
					html += '<label class="remover-referencia">remover</label>';
					html += '<label for="referencia_'+count+'_nome">Nome :</label>';
					html += '<input type="text" name="referencia_'+count+'_nome"  placeholder="Nome Completo" required>';
				html += '</div>';
				html += '<div>';
					html += '<label for="referencia_'+count+'_parentesco">Parentesco :</label>';
					html += '<select name="referencia_'+count+'_parentesco"></select>';
				html += '</div>'
				html += '<div>';
					html += '<label for="referencia_'+count+'_fone">Telefone :</label>';
					html += '<input type="tel" name="referencia_'+count+'_fone" placeholder="(00)00000-00000" required>';
				html += '</div>'
			html += '</div>';
		
		$("#add-referencia").before(html);
		addOptionSelect(parentesco,$("select[name='referencia_"+count+"_parentesco']"));
	});
	
	// remover referencia
	$("body").on("click",".remover-referencia",function(){
		var obj = $(this).parents(".container-referencia");
		$(obj).fadeOut("600",function(){
			$(obj).remove();
		});
	})
	
	
	// appenda options em select
	function addOptionSelect(option, element){
		var html = "<option disabled='disabled' selected>--</option>";
		$(element).append(html);
		for(var i in option){
			var html = "<option value='"+option[i]+"'>"+option[i]+"</option>";
			$(element).append(html);
		}
	}
});


// retorna idade
function calculateAge(birthday) { 
    var ageDifMs = Date.now() - birthday.getTime();
    var ageDate = new Date(ageDifMs);
    return Math.abs(ageDate.getUTCFullYear() - 1970);
}

// validador de CPF
function validarCPF(cpf){
	cpf = cpf.replace(/[^\d]+/g,'');    
    if(cpf == '') return false; 
    // Elimina CPFs invalidos conhecidos    
    if (cpf.length != 11 || 
        cpf == "00000000000" || 
        cpf == "11111111111" || 
        cpf == "22222222222" || 
        cpf == "33333333333" || 
        cpf == "44444444444" || 
        cpf == "55555555555" || 
        cpf == "66666666666" || 
        cpf == "77777777777" || 
        cpf == "88888888888" || 
        cpf == "99999999999")
            return false;       
    // Valida 1o digito 
    add = 0;    
    for (i=0; i < 9; i ++)       
        add += parseInt(cpf.charAt(i)) * (10 - i);  
        rev = 11 - (add % 11);  
        if (rev == 10 || rev == 11)     
            rev = 0;    
        if (rev != parseInt(cpf.charAt(9)))     
            return false;       
    // Valida 2o digito 
    add = 0;    
    for (i = 0; i < 10; i ++)        
        add += parseInt(cpf.charAt(i)) * (11 - i);  
    rev = 11 - (add % 11);  
    if (rev == 10 || rev == 11) 
        rev = 0;    
    if (rev != parseInt(cpf.charAt(10)))
        return false;       
    return true; 
}
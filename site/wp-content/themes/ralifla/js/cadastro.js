var $jQuery = jQuery.noConflict()

'use strict';

;( function ( document, window, index ) {

    /*
     * Mascáras (maskedinput.js) 
     */

    $jQuery(function() {
        $jQuery("#cpf").mask("999999999-99");
        $jQuery("#cep").mask("99999-999");
        $jQuery("#end_entrega_cep").mask("99999-999");

        //Telefones
        $jQuery("input[type=tel]").mask("(99) 9999-9999?9")

            .focusout(function(event) {
                var target, phone, element;

                target = (event.currentTarget) ? event.currentTarget : event.srcElement;
                phone = target.value.replace(/\D/g, '');
                element = $(target);
                element.unmask();

                if (phone.length > 10) {
                    element.mask("(99) 99999-999?9");

                } else {
                    element.mask("(99) 9999-9999?9");
            }
        });
    });


     /* Busca CEP 
     * By Republica Virtual
     */


    $jQuery("#cep").blur(function(){
                    
        var cep = this.value.replace(/[^0-9]/, "");

        if(cep.length!=8){
            return false;
        } 

        var url = "http://cep.republicavirtual.com.br/web_cep.php?cep="+cep+"&formato=json";
                     
        $jQuery.getJSON(url, function(dadosRetorno){

            try{
                // Insere os dados em cada campo
                $jQuery("#tipo_cep").val(dadosRetorno.resultado);
                $jQuery("#tipo_logradouro").val(dadosRetorno.tipo_logradouro);
                $jQuery("#logradouro").val(dadosRetorno.logradouro);
                $jQuery("#bairro").val(dadosRetorno.bairro);
                $jQuery("#cidade").val(dadosRetorno.cidade);
                $jQuery("#uf").val(dadosRetorno.uf); 
                    
            } catch(ex){  }
        });
    });
    

    /* Busca CEP #ee_
     * By Republica Virtual
     */

    $jQuery("#ee_cep").blur(function(){
                    
        var ee_cep = this.value.replace(/[^0-9]/, "");

        if(ee_cep.length!=8){
            return false;
        } 

        var url = "http://cep.republicavirtual.com.br/web_cep.php?cep="+ee_cep+"&formato=json";
                     
        $jQuery.getJSON(url, function(dadosRetorno){

            try{
                // Insere os dados em cada campo
                $jQuery("#ee_tipo_cep").val(dadosRetorno.resultado);
                $jQuery("#ee_tipo_logradouro").val(dadosRetorno.tipo_logradouro);
                $jQuery("#ee_logradouro").val(dadosRetorno.logradouro);
                $jQuery("#ee_bairro").val(dadosRetorno.bairro);
                $jQuery("#ee_cidade").val(dadosRetorno.cidade);
                $jQuery("#ee_uf").val(dadosRetorno.uf); 
                    
            } catch(ex){  }
        });
    });


    /* Metodos de validação
     * Verifica CPF
     */

    $jQuery.validator.addMethod("verificaCPF", function(value, element) {

        value = value.replace('.', '');
        value = value.replace('.', '');
        cpf = value.replace('-', '');

        while (cpf.length < 11) cpf = "0" + cpf;

        var expReg = /^0+$|^1+$|^2+$|^3+$|^4+$|^5+$|^6+$|^7+$|^8+$|^9+$/;
        var a = [];
        var b = new Number;
        var c = 11;

        for (i = 0; i < 11; i++) {
          a[i] = cpf.charAt(i);

          if (i < 9) b += (a[i] * --c);
        }

        if ((x = b % 11) < 2) {
          a[9] = 0
        } else {
          a[9] = 11 - x
        }

        b = 0;
        c = 11;

        for (y = 0; y < 10; y++) b += (a[y] * c--);

        if ((x = b % 11) < 2) {
          a[10] = 0;
        } else {
          a[10] = 11 - x;
        }

        if ((cpf.charAt(9) != a[9]) || (cpf.charAt(10) != a[10]) || cpf.match(expReg)) return false;

        return true;
    
    });


    /*
     * Verifica se > 21
     */
    

    $jQuery.validator.addMethod("verificaIdade", function(value, element) {

        var dateNasc = value;
        var arr_dateText = dateNasc.split("-");

        day = arr_dateText[2];
        month = arr_dateText[1];
        year = arr_dateText[0];

        var mydate = new Date();
        mydate.setFullYear(year, month - 1, day);

        var maxDate = new Date();
        maxDate.setYear(maxDate.getYear() - 21);

        if (maxDate < mydate) {
            
            $jQuery.validator.messages.verificaIdade = "Erro";

            return false;
        }

        return true;
    });

    $jQuery.validator.addMethod("telefonesIguaisConjuge", function(value, element) {

        var conjuge =  $jQuery("#conjuge_telefone").val();
        var referencia =  $jQuery("#referencia_telefone").val();
        var ativ =  $jQuery("#ativ_telefone").val();
       
        
        if (conjuge === referencia || conjuge === ativ) {
            
            $jQuery.validator.messages.telefonesIguaisConjuge = "Este número já existe";
            return false;
        }

        return true;
    });


    $jQuery.validator.addMethod("telefonesIguaisReferencia", function(value, element) {

        var conjuge =  $jQuery("#conjuge_telefone").val();
        var referencia =  $jQuery("#referencia_telefone").val();
        var ativ =  $jQuery("#ativ_telefone").val();
       
        
        if (referencia === conjuge || referencia === ativ) {
            
            $jQuery.validator.messages.telefonesIguaisReferencia = "Este número já existe";
            return false;
        }

        return true;
    });


    $jQuery.validator.addMethod("telefonesIguaisAtiv", function(value, element) {

        var conjuge =  $jQuery("#conjuge_telefone").val();
        var referencia =  $jQuery("#referencia_telefone").val();
        var ativ =  $jQuery("#ativ_telefone").val();
       
        
        if (ativ === conjuge || ativ === referencia) {
            
            $jQuery.validator.messages.telefonesIguaisAtiv = "Este número já existe";
            return false;
        }

        return true;
    });

    /* 
     * Regras validate.js
     */


    $jQuery('#form').validate({

        rules: {
            nome: { minlength: 10 },
            filiacao: { minlength: 10 },
            conjuge_nome: { minlength: 10 },
            amasiado_nome: { minlength: 10 },
            cpf: { verificaCPF: true},
            data_nasc: {verificaIdade: true},
            email: { email: true },
            sexo: {required: true},
            conjuge_telefone: {telefonesIguaisConjuge: true},
            referencia_telefone: {telefonesIguaisReferencia: true},
            ativ_telefone: {telefonesIguaisAtiv: true}
        },

        messages: {
            nome: {minlength: 'Digite seu nome completo' },
            filiacao: {minlength: 'Digite nome de sua mãe completo' },
            conjuge_nome: {minlength: 'Digite nome de seu conjugê completo' },
            amasiado_nome: {minlength: 'Digite nome de seu parceiro completo' },
            cpf: {verificaCPF: "CPF inválido, por gentileza preencha novamente"},
            data_nasc: {verificaIdade: 'Infelizmente seu cadastro será negado: Motivo menor de 21 anos'},
            referencia_telefone: {telefonesIguaisReferencia: 'Telefones precisam ser diferentes.'},
            conjuge_telefone: {telefonesIguaisConjuge: 'Telefones precisam ser diferentes.'},
            ativ_telefone: {telefonesIguaisAtiv: 'Telefones precisam ser diferentes.'}

        },

        errorPlacement: function(error, element) {
            if(element.is(":radio")){
                error.appendTo( element.parents('.erro') );

            }  else if(element.is(":checkbox")){
                   error.appendTo( element.parents('.erro') );

                }  else {
                       error.insertAfter(element);
                   }
        },

    });


    /* 
     * Mensagens padrão validate.js
     */


    $jQuery.extend($jQuery.validator.messages, {
        required: "Por gentileza preencha este campo.",
        email: "Ops, digite um e-mail válido."
    });




    /* Campos extras para quando usuário clicar em input[type:radio] 
     * : Obs Melhorar algoritmo
     */


    $jQuery(document).ready(function(){

        // Estado Civil
        var $estado_civil = $jQuery("#estado_civil > div");

        // mostrando no onload da página
        $estado_civil.hide();
        $jQuery( '#' + $jQuery("input[name='estado_civil']:checked").val() ).show('slow');

        //mostrando ao clicar no radio
        $jQuery("input[name='estado_civil']").on('click', function(){
            $estado_civil.hide('slow');
            $jQuery( '#' + $jQuery(this).val() ).show('slow');

        });

        // Atividade profissional
        var $atividades = $jQuery("#atividades > div");

        // mostrando no onload da página
        $atividades.hide();
        $jQuery( '#' + $jQuery("input[name='atividades']:checked").val() ).show('slow');

        //mostrando ao clicar no radio
        $jQuery("input[name='atividades']").on('click', function(){
            $atividades.hide('slow');
            $jQuery( '#' + $jQuery(this).val() ).show('slow');

        });

        // Endereço de entrega
        var $outro_end = $jQuery("#end_entrega > div");

        // mostrando no onload da página
        $outro_end.hide();
        $jQuery( '#' + $jQuery("input[name='end_entrega']:checked").val() ).show('slow');

        //mostrando ao clicar no radio
        $jQuery("input[name='end_entrega']").on('click', function(){
            $outro_end.hide('slow');
            $jQuery( '#' + $jQuery(this).val() ).show('slow');

        });

        var $copia_doc = $jQuery("#copia_doc > div");

        // mostrando no onload da página
        $copia_doc.hide();
        $jQuery( '#' + $jQuery("input[name='copia_doc']:checked").val() ).show('slow');

        //mostrando ao clicar no radio
        $jQuery("input[name='copia_doc']").on('click', function(){
            $copia_doc.hide('slow');
            $jQuery( '#' + $jQuery(this).val() ).show('slow');

        });
    });


    /* Média Salarial
     * by: Chris Coyer, css-tricks.com
     */


    var rangeSlider = function(){
        
        var slider = $jQuery('.range'),
        
        range = $jQuery('.range-slider'),
        value = $jQuery('.range-value');
        
        slider.each(function(){

            value.each(function(){
                var value = $jQuery(this).prev().attr('value');
                $jQuery(this).html(value);
            });

            range.on('input', function(){
                $jQuery(this).next(value).html(this.value);
            });
        });
    };

    rangeSlider();




}( document, window, 0 ));  ''
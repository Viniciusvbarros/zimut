<! DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    
    <meta http-equiv="X-UA-Co
    mpatible" content="IE=edge">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
 
    <title> ZIMUT </title>
   

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="estilo.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>

    <!-- Adicionando Javascript -->
    <script type="text/javascript" >

        $(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#endereco").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#uf").val("");
                $("#ibge").val("");
            }
            
            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#endereco").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");
                        $("#uf").val("...");
                        $("#ibge").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#endereco").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#uf").val(dados.uf);
                                $("#ibge").val(dados.ibge);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });

    </script>
  </head>
  <body>

    <div id="navegacao"> 

    <div class="container">

      <div class="page-header">
        <div class="titulo">
        <h1>ZIMUT</h1><br>
        </div>
      </div>

<div class="row">

        <div class="col-sm-8"> 
          <div class="titulo2">
            <h3>Cadastre-se:</h3>
          </div>
              <H6>(os campos marcados com * são de preenchimento obrigatório, seguindo os exemplos do preenchimento)</H6>
<form action="validarform.php" method="get">
  
    <div class="form-group"> <br>
      <label for="nome"> <strong>Nome*</strong></label>
      <input type="text" class="form-control" id="nome" placeholder="nome completo" name="nome">
    </div>

    
<div class="form-group"> 
      <label for="data"> <strong>Data de Nascimento*</strong></label>
      <input type="date" class="form-control" id="data" name="data">
    </div>


    <div class="form-group"> 
      <label for="cpf"> <strong>CPF*</strong></label>
      <input type="text" class="form-control" id="cpf" placeholder="00000000000" name="cpf">
    </div>


    <div class="form-group"> 
      <label for="cep"> <strong>CEP*</strong></label>
      <input type="text" class="form-control" id="cep" placeholder="00000-000" name="cep">
    </div>

    <div class="form-group"> 
      <label for="endereco"> <strong>Endereço*</strong></label>
      <input type="text" class="form-control" id="endereco" placeholder=" ex: Rua Zimut" name="endereco">
    </div>

    <div class="form-group"> 
      <label for="numero"> <strong>Número*</strong></label>
      <input type="number" class="form-control" id="numero" placeholder="111" name="numero">
    </div>

    <div class="form-group"> 
      <label for="complemento"> <strong>Complemento</strong></label>
      <input type="text" class="form-control" id="complemento" placeholder="ex: Casa A, bloco B, Apt 111" name="complemento">
    </div>


   <div class="form-group"> 
      <label for="estado"> <strong>Estado*</strong></label>
      <select id="etsado" name="estado">
        <option value='Acre'>Acre</option>
        <option value='Alagoas'>Alagoas</option>
        <option value='Amapa'>Amapá</option>
        <option value='Amazonas'>Amazonas</option>
        <option value='Bahia'>Bahia</option>
        <option value='Ceara'>Ceará</option>
        <option value='Distrito Federal'>Distrito Federal</option>
        <option value='Espirito Santo'>Espirito Santo</option>
        <option value='Goias'>Goiás</option>
        <option value='Maranhao'>Maranhão</option>
        <option value='Mato Grosso do Sul'>Mato Grosso do Sul</option>
        <option value='Minas Gerais'>Minas Gerais</option>
        <option value='Para'>Pará</option>
        <option value='Paraiba'>Paraíba</option>
        <option value='Parana'>Paraná</option>
        <option value='Pernambuco'>Pernambuco</option>
        <option value='Piaui'>Piauí</option>
        <option value='Rio de Janeiro'>Rio de Janeiro</option>
        <option value='Rio Grande do Norte'>Rio Grande do Norte</option>
        <option value='Rio Grande do Sul'>Rio Grande do Sul</option>
        <option value='Rondonia'>Rondonia</option>
        <option value='Roraima'>Roraima</option>
        <option value='Santa Catarina'>Santa Catarina</option>
        <option value='Sao Paulo'>São Paulo</option>
        <option value='Sergipe'>Sergipe</option>
        <option value='Tocantins'>Tocantins</option>
      </select>
    </div>


    <div class="form-group"> 
      <label for="cidade"> <strong>Cidade*</strong></label>
      <input type="text" class="form-control" id="cidade" name="cidade">
    </div>


    <div class="form-group"> 
      <label for="bairro"> <strong>Bairro*</strong></label>
      <input type="text" class="form-control" id="bairro" name="bairro">
    </div>

    <button type="submit" class="btn btn-primary"> Cadastrar </button>
   
    

</form>            
          
</div>
  </DIV>
    </div>
  

     
    
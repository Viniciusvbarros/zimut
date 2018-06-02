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

        



<?php

$nome = $_GET['nome'];
$data = $_GET['data'];
$cpf = $_GET['cpf'];
$cep = $_GET['cep'];
$endereco = $_GET['endereco'];
$numero = $_GET['numero'];
$complemento = $_GET['complemento'];
$estado = $_GET['estado'];
$cidade = $_GET['cidade'];
$bairro = $_GET['bairro'];





if($nome == '')
{
	//print 'Digite o nome completo';
	print '<div class="form-group"> 
      <label for="mensagem"> <strong>Digite o nome completo.</strong></label>      
    </div>';

}
else if($data == '')
{
	

	print '<div class="form-group"> 
      <label for="mensagem"> <strong>Digite a data de nascimento.</strong></label>      
    </div>';
}

else if($cpf == '')
{
	print '<div class="form-group"> 
      <label for="mensagem"> <strong>Digite o CPF.</strong></label>      
    </div>';
}
else if($cpf == '00000000000')
{
	print '<div class="form-group"> 
      <label for="mensagem"> <strong>CPF Inválido.</strong></label>      
    </div>';
}
else if($cep == '')
{
	print '<div class="form-group"> 
      <label for="mensagem"> <strong>Digite o CEP.</strong></label>      
    </div>';
}
else if($endereco == '')
{
	print '<div class="form-group"> 
      <label for="mensagem"> <strong>Digite o endereço.</strong></label>      
    </div>';
}
else if($numero == '')
{
	print '<div class="form-group"> 
      <label for="mensagem"> <strong>Digite o numero.</strong></label>      
    </div>';
}
else if($estado == '')
{
	print '<div class="form-group"> 
      <label for="mensagem"> <strong>Informe seu estado.</strong></label>      
    </div>';
}
else if($cidade == '')
{
	print '<div class="form-group"> 
      <label for="mensagem"> <strong>Digite a cidade.</strong></label>      
    </div>';
}
else if($bairro == '')
{
	print '<div class="form-group"> 
      <label for="mensagem"> <strong>Digite o bairro.</strong></label>      
    </div>';
}



// validar para verificar se os campos estão vazios
else if(strlen($nome) > 200)
{
	print '<div class="form-group"> 
      <label for="mensagem"> <strong> O nome deve conter no máximo 200 caracteres.</strong></label>      
    </div>';
}
	
//----------------------------------------------

//--------------------------------------------
else if(strlen($cpf) < 11 )
{
	print '<div class="form-group"> 
      <label for="mensagem"> <strong> Digite um CPF válido.</strong></label>      
    </div>';

}
//-------------------------------------------
else if(strlen($cep) < 9 )
{
	print '<div class="form-group"> 
      <label for="mensagem"> <strong> Digite um CEP válido.</strong></label>      
    </div>';
}
//------------------------------------------------
else if(strlen($endereco) > 200 )
{
	print '<div class="form-group"> 
      <label for="mensagem"> <strong> O endereço deve conter no máximo 200 caracteres.</strong></label>      
    </div>';
}
//--------------------------------------
else if(strlen($cidade) > 50  )
{
	print '<div class="form-group"> 
      <label for="mensagem"> <strong> A cidade deve conter no máximo 50 caracteres.</strong></label>      
    </div>';
}
//---------------------------------------------
else if (strlen($bairro) > 50 )
{
	print '<div class="form-group"> 
      <label for="mensagem"> <strong> O Bairro deve conter no máximo 50 caracteres.</strong></label>      
    </div>';
}
//--------------------------------------







else {


if (strlen($cpf) == 14)
{
    $cpf = ereg_replace('[^0-9]', '', $cpf);
    $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
     
    // Verifica se o numero de digitos informados é igual a 11 
  
    // Verifica se nenhuma das sequências invalidas abaixo 
    // foi digitada. Caso afirmativo, retorna falso
    if ($cpf == '00000000000' || 
        $cpf == '11111111111' || 
        $cpf == '22222222222' || 
        $cpf == '33333333333' || 
        $cpf == '44444444444' || 
        $cpf == '55555555555' || 
        $cpf == '66666666666' || 
        $cpf == '77777777777' || 
        $cpf == '88888888888' || 
        $cpf == '99999999999') 
    {
       
        print '<div class="form-group"> 
      <label for="mensagem"> <strong> CPF Inválido.</strong></label>      
    </div>';
     // Calcula os digitos verificadores para verificar se o
     // CPF é válido
     } else 
     {   
         
        for ($t = 9; $t < 11; $t++) 
        {
             
            for ($d = 0, $c = 0; $c < $t; $c++) 
            {
                $d += $cpf{$c} * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf{$c} != $d)
            {
               print 'CPF Inválido';
            }
        }

    }
}

	$conexao = mysqli_connect('localhost','root','','cadastro');


    $sqlconsulta = "SELECT * FROM formulario WHERE cpf = '".$cpf."'";
    $consulta = mysqli_query($conexao, $sqlconsulta);
    
   if(mysqli_num_rows($consulta) == 0)
   {

	$sql = "INSERT INTO formulario (nome_completo,cpf,endereco,numero,cep,bairro, cidade, estado, data_nascimento, complemento) VALUES ('".$nome."',".
	"'".$cpf."','".$endereco."', ".$numero.",'".$cep."','".$bairro."','".$cidade."','".$estado."','".$data."','".$complemento."')";


	mysqli_query($conexao, $sql);

	print mysqli_error($conexao);
	
	print '<div class="form-group"> 
      <label for="mensagem"> <strong> Cadastro efetuado com sucesso.</strong></label>      
    </div>';
   }
   else
   {
   	 

   	  print '<div class="form-group"> 
      <label for="mensagem"> <strong> O CPF '.$cpf. ' já está cadastrado.</strong></label>      
    </div>';

   }

}

?>
</div>
</div>
</div>
</div>

</body>
</html>

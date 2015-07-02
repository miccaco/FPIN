<?php
session_start(); //inicia sessão

require('php/verSessao.php'); //importa arquivo com a função "verSessao"

require('php/login.php'); //arquivo para autenticação

//inicio IF
if(!verSessao()){ //caso não haja sessão de usuário
//página de login
?>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Fpin - Projeto</title>
<link rel="stylesheet" type="text/css" href="css/960.css" />
<link rel="stylesheet" type="text/css" href="css/green.css" />
<link rel="stylesheet" type="text/css" href="css/login.css" />
</head>

<body>
<div class="container_16">
  <div class="grid_6 prefix_5 suffix_5">
   	  <h1>Tela de Acesso</h1>
    	<div id="login">
		
    	  <p class="tip">informe seu usuário e senha!</p>
		  <?php
			if(!$usrExiste)//usuario nao existe
			echo '<h3 style="color: red">Usuário ou senha inválidos</h3>';
			
  		  ?>
    	  <form id="form1" name="form1" method="post" target="_parent"  action="index.php">
    	    <p>
    	      <label><strong>Código ou CPF</strong>
<input type="text" name="usuario" class="inputText" id="textfield" />
    	      </label>
  	      </p>
    	    <p>
    	      <label><strong>Senha</strong>
<input type="password" name="senha" class="inputText" id="textfield2" />
  	        </label>
    	    </p>
    		<span><input type="submit" value="Autenticar" class="black_button" ></span>
             <label>
    	  </form>
    	  
		  <br clear="all" />
		  <strong><a href="php/cadastra_cliente.php" target="_parent"><h3 style="color: red">Cadastre-se clicando aqui<h3></a></strong>
    	</div>
        <div id="forgot">
  </div>
<br clear="all" />
</body>
</html>
<?php
}//fim do IF
else{
	$id_user = verSessao();
?>
<!DOCTYPE html>

<head>
<base href="../AgendamentoConsultas/" target="_parent">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Fpin - Projeto</title>
<link rel="stylesheet" type="text/css" href="css/960.css" />
<link rel="stylesheet" type="text/css" href="css/green.css" />
<style type="text/css">
      table
      {
        font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
        width:100%;
        border-collapse:collapse;
      }
      table td, th
      {
        border:1px solid #86B404;
        padding:3px 7px 2px 7px;
      }
      table th
      {
        font-size:1.2em;
        text-align:left;
        padding-top:5px;
        padding-bottom:4px;
        background-color:#688A08;
        color:#fff;
      }
      table tr.alt td
      {
        color:#000;
        background-color:#A5DF00;
      }
    </style>
</head>

<body>
<!-- WRAPPER START -->
<div class="container_16" id="wrapper">	
<!-- HIDDEN COLOR CHANGER -->      
      <div style="position:relative;">
      	<div id="colorchanger">
        	<a href="dashboard_red.html"><span class="redtheme">Red Theme</span></a>
            <a href="dashboard.html"><span class="bluetheme">Blue Theme</span></a>
            <a href="dashboard_green.html"><span class="greentheme">Green Theme</span></a>
        </div>
      </div>
  	<!--LOGO-->
	<div class="grid_8" id="logo">Fpin - Projeto </div>
    <div class="grid_8">
<!-- USER TOOLS START -->
     
    </div>
<!-- USER TOOLS END -->    
<div class="grid_16" id="header">
<!-- MENU START -->

<?php
	require('php/pgPersonalizada.php'); //menu personalizado
	pgPersonalizada($id_user); //função de menu		
	
	require('rodape.html');			
}
?>
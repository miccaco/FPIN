<?php
	require('../cabecalho.html');
?>
</div>
<div class="grid_16">
<!-- TABS START -->
    <div id="tabs">
         <div class="container">
            
			<ul>
				                      
        </div>
    </div>
<!-- TABS END -->    
</div>
<!-- HIDDEN SUBMENU START -->

<!-- HIDDEN SUBMENU END -->  

<!-- CONTENT START -->
<div class="grid_16" id="content">
    <!--  TITLE START  -->  <div class="grid_9">
    <h1 class="content_edit">Cadastre-se</h1>
    </div>
    <div class="grid_15" id="textcontent">
    
<?php
	
@$usr['nome'] = $_POST['nome'];
@$usr['cpf'] = $_POST['cpf'];
@$usr['fone'] = $_POST['fone'];
@$usr['email'] = $_POST['email'];
@$usr['senha1'] = $_POST['senha1'];
@$usr['senha2'] = $_POST['senha2'];

$preenchido = TRUE;

foreach($usr as $value){
	if(!$value)
		$preenchido = FALSE;
}
//se tudo foi preenchido
if($preenchido){
	if($usr['senha1'] != $usr['senha2'])
		echo "<h4>As senhas nas correspondem</h4>";
	else{	

	require('mysql/cad_user.php');
	
	$cod_cliente = cad_user($usr['cpf'], $usr['nome'], $usr['senha1'], 1);
	cad_cliente($cod_cliente, $usr['fone'], $usr['email']);
	echo "<h2>Você foi Cadastrado\nSeu codigo de acesso é $cod_cliente</h2>\n";
	echo "<h2><a href=\"index.php\">Click aqui para acessar o sistema</a></h2>";
	}
}
if(!$preenchido){
?>
<section>

<form method="POST" action="php/cadastra_cliente.php">
Nome<input type="text" name="nome" maxlength="50">
CPF <input type="text" name="cpf" maxlength="11">
TELEFONE:<input type="text" name="fone" maxlength="11">
E-MAIL: <input type="text" name="email" maxlength="50">
SENHA: <br><input type="password" name="senha1" maxlength="10"><br>
REPITA A SENHA:<br><input type="password" name="senha2" maxlength="10">
<br><br><input type="submit" value="CONFIRMAR">
 
</form>

</section>

<?php
}
require('../rodape.html');
?>
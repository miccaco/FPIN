<?php
	session_start();
	require('naoAutenticado.php'); //verifica se usuário foi ou n	
	require('../cabecalho.html');
	require('pgPersonalizada.php'); 
	
	$id_user = verSessao(); //ver tipo de usuário
	pgPersonalizada($id_user);
	
	require('submenu_paciente.php'); 
	require('titulo_paciente_reg.php'); 
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
	echo "<h2>Cliente Cadastrado\nO codigo de acesso é $cod_cliente</h2>\n";
	}
}
if(!$preenchido){
?>
<section>

<form method="POST" action="php/paciente_registra.php">
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
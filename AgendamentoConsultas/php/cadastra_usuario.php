<?php
require('mysql/banco.php');
require('mysql/cad_user.php');

@$usr['nome'] = $_POST['nome'];
@$usr['cpf'] = $_POST['cpf'];
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
		
	//cadastro usuário
	$cod = cad_user($usr['cpf'], $usr['nome'], $usr['senha1'], 3);
	echo "<h2>Usuário cadastrado\nCódigo para acesso $cod</h2>";
	exit;
	}
}
	 
?>
<section>

<form method="POST" action="cadastra_usuario.php">
Nome<input type="text" name="nome" maxlength="50"><br><br>

CPF <input type="text" name="cpf" maxlength="11"><br><br>

SENHA: <input type="password" name="senha1" maxlength="10"><br><br>

REPITA A SENHA: <input type="password" name="senha2" maxlength="10"><br><br>

<input type="submit" value="Cadastrar-se">
 
</form>

</section>

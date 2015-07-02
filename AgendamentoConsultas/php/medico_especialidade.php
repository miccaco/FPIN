<?php
session_start(); //inicia sessão
require('../cabecalho.html');

require('verSessao.php'); //importa arquivo com a função "verSessao"
require('pgPersonalizada.php');
$id_user = verSessao();
pgPersonalizada($id_user); //função de menu

require('submenu_medico.php');
require('titulo_especialidade.php');
@ $nome = $_POST['nome'];
if(!$nome){
?>
<form action="php/medico_especialidade.php" method="POST">
	Nome Especialide: <input type="text" maxlength="20" name="nome">
	<br>
	<input type="submit" value="Cadastrar">
</form>
<?php
}
else{//realiza o cadastro da especialide
	require('mysql/cad_med.php');
	$cod = cad_especialidade($nome);
	if($cod)
		echo "<h2>Especialidade <strong>$nome</strong> foi cadastrada</h2>";
	else
		echo "<h2>Cadastro não realizado</h2>";
}
require('../rodape.html');
?>


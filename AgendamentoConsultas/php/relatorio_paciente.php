<?php
	session_start();
	require('naoAutenticado.php'); //verifica se usuário foi ou n	
	require('relatorios/funcao_relatorios.php');
	require('../cabecalho.html');
	
	require('pgPersonalizada.php'); 
	
	$id_user = verSessao(); //ver tipo de usuário
	pgPersonalizada($id_user);
	
	require('submenu_relatorio.php'); 
	require('titulo_relatorio.php'); 
	todos_clientes();
?>

<?php
require('../rodape.html');
?>
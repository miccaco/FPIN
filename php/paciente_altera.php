<?php
	session_start();
	require('naoAutenticado.php'); //verifica se usuário foi ou n	
	require('../cabecalho.html');
	require('pgPersonalizada.php'); 
	
	$id_user = verSessao(); //ver tipo de usuário
	pgPersonalizada($id_user);
	
	require('submenu_paciente.php'); 
	require('titulo_paciente.php'); 
?>

<?php
require('../rodape.html');
?>
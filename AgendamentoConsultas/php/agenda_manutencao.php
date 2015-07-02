<?php
	session_start();
	require('naoAutenticado.php'); //verifica se usuário foi ou n	
	require('../cabecalho.html');
	require('pgPersonalizada.php'); 
	
	$id_user = verSessao(); //ver tipo de usuário
	pgPersonalizada($id_user);
	
	require('submenu_agenda.php'); 
	require('titulo_agenda.php'); 
?>

<?php
require('../rodape.html');
?>
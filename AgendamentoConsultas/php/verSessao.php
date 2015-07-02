<?php
//usuário não foi autenticado
function verSessao(){
	if(!isset($_SESSION['valida_user'])){
		//nao existe sessão de usuario
		return false;		
	}
	//usuario
	$usuario = $_SESSION['valida_user'];
	$tipo = substr((strstr($usuario, '|')), 1);
	$tipo = intval($tipo);//tipo usuário	
	
	return $tipo;
}

?>
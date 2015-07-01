<?php
require('mysql/banco.php');
@ $user = $_POST['usuario'];
@ $senha = $_POST['senha'];
@ $usrExiste = true;

//funcao
function autenticaUser($user, $senha){
	$db = banco();
	if($db->connect_errno)
		return FALSE;
		$query = "SELECT cod, cpf, name, tipo
				FROM user
				WHERE (cod= $user or
					   cpf = $user) and
					   senha like('$senha')";
	if($res = $db->query($query)){
	$dados = $res->fetch_row();
		return $dados[3];
	}
	else
		return FALSE;
}

if($user || $senha){
	$senha = sha1($senha); //criptográfa senha
		
	$logou = autenticaUser($user, $senha);
	
	if($logou){
		$_SESSION['valida_user'] = "$user|".$logou;						
	}
	else{
		$usrExiste = false;
	}
}	
?>
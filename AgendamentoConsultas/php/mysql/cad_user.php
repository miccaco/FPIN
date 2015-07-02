<?php
require_once('banco.php');
function cad_user($cpf, $name, $senha, $tipo){
	
	$cpf = "".$cpf."";
	@ $usr ['nome'] = strval($name);
	@ $usr['senha'] = strval($senha);
	@ $usr['id'] = strval($tipo);
	
	
	//verifica se dados preenchidos
	foreach($usr as $val){
		if (!$val)
			return FALSE;
	}	
	
	//verifica dados
	@ $usr['cpf'] = trim($usr['cpf']); $usr['cpf'] = intval($usr['cpf']);
	@ $usr ['name'] = trim ($usr ['nome']); $usr ['nome'] = strval($usr ['nome']);
	@ $usr['senha'] = strval($usr['senha']);	
	
	
	//conecta ao banco
	$db = banco();
	if($db->connect_errno){//erro na conexao
		echo "<h2>Não foi possível conectar a banco de dados</h2>";
		exit;
	}
	$query = "INSERT INTO user (cod, cpf,  name, senha, tipo)
			  VALUES (NULL, '".$cpf."', '".$usr['nome']."', sha1('".$usr['senha']."'),
			  	".$usr['id'].")";
	
	//insere no banco
	if($db->query($query)){		
		$cod = $db->query("select cod	
				  from user
				  where cpf like  '$cpf'");
		$codigo = $cod->fetch_row();
		return $codigo[0];
	}
	else{
		return false;
	}	

}

function cad_cliente($cod, $fone, $email){
	$db = banco(); //funcao de conexao ao banco
	if($db->connect_errno)
		return FALSE;
	$fone = "".$fone."";	
	$email = strval($email);
	
	$query = "INSERT INTO cliente (cod_clien, fone, email) VALUES ($cod, '$fone', '$email')";
		
	if($db->query($query))
	   return $cod; 
}

?>
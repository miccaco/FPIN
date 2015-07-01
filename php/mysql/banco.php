<?php
    function banco(){
		@ $db = new mysqli ('localhost', 'root', '', 'agconsulta'); 
		return $db;

	}
	//funcao para consultar usuário
	//valor (pesquisa), atributo (coluna existente), retonar (escolher atributos para retornar)
	function query_usr ($dado, $atributo, $retornar){
		$db = banco();
		
		$query = "SELECT $retornar
				  FROM user
				  WHERE $atributo = $dado";
		$row = FALSE;
		
		if($result = $db->query($query)){
			$row = $result->fetch_assoc();
			$result->close();
		}
		$db->close();		
		return $row;		
	}	
?>

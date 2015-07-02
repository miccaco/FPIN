<?php

	function cad_med_crm ($id, $crm){
		$db = banco();
		
		$query = "INSERT INTO medico (cod_medic, crm)
				  VALUES ($id, '$crm')";
		
		if($db->query($query)){
			$db->close();
			return TRUE;			
		}
		else 
			$db->close();
			return FALSE;		 
	}	
	function cad_med_esp ($id_med, $id_espe){
		$db = banco();
		
		$query = "INSERT INTO medico_especialidade (cod_medic, cod_espec)
				 VALUES ($id_med, $id_espe)";				 
	
		if($db->query($query)){
			$db->close();
			return TRUE;			
		}
		else 
			$db->close();
			return FALSE;	
	}
	
function cad_especialidade($nome){
		require('banco.php');
		
		$db = banco();
		
		$nome = trim($nome);
		$nome = strval($nome);
		
		
		$query = "INSERT INTO especialidade
				 VALUES (null, '$nome')";
		//insere no banco
		if($db->query($query)){	
			$cod = $db->query("select cod_espec from especialidade where nom_espec like '$nome'");
			$codigo = $cod->fetch_row();
		return $codigo[0];
	}
	else{
		return false;
	}	
}

	
?>
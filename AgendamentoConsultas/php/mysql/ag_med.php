<?php
	function ag_med ($cod_med, $cod_esp, $data, $vagas){
		$db = banco();
		
		$cod_med = intval($cod_med);
		$cod_esp = intval($cod_esp);		
		$vagas = intval($vagas);		
		
		$query = "INSERT INTO medico_agenda (cd_med, cd_esp, data_disponivel, vagas)
				  VALUES ($cod_med, $cod_esp, '$data', $vagas)";
				  
		if($db->query($query))
			return TRUE;
		else
			return FALSE;
	}
?>

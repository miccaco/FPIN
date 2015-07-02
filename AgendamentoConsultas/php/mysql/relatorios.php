<?php	
	require_once('banco.php');
	function rel_medico_ag ($cod_med){//retorna um resource para cada tupla
		$db = banco();
		if($cod_med == '*')
		$query = "SELECT DISTINCT user.cod, user.name, especialidade.cod_espec, especialidade.nom_espec, medico_agenda.data_disponivel, medico_agenda.vagas
				  FROM user, medico, medico_agenda, medico_especialidade, especialidade
				  WHERE user.cod = medico.cod_medic AND
				  	 	medico.cod_medic = medico_especialidade.cod_medic AND
				  	 	medico_agenda.cd_med = medico_especialidade.cod_medic AND
				  	 	medico_agenda.cd_esp = medico_especialidade.cod_espec AND
				  	 	especialidade.cod_espec = medico_especialidade.cod_espec
				  ";
		else{
			$query = "SELECT DISTINCT user.cod, user.name, especialidade.cod_espec, especialidade.nom_espec, medico_agenda.data_disponivel, medico_agenda.vagas
				  FROM user, medico, medico_agenda, medico_especialidade, especialidade
				  WHERE user.cod = medico.cod_medic AND
				  	 	medico.cod_medic = medico_especialidade.cod_medic AND
				  	 	medico_agenda.cd_med = medico_especialidade.cod_medic AND
				  	 	medico_agenda.cd_esp = medico_especialidade.cod_espec AND
				  	 	especialidade.cod_espec = medico_especialidade.cod_espec AND
				  	 	user.cod = $cod_med
				  ";
	
		}
		
		$row = $db->query($query);		
		$db->close();
		
		return $row;		
	}
	
	
	
	function rel_medico_esp($cod_med, $cod_esp, $exibir, $nome_cod, $nome_desc){
		$db = banco();
		
		
		$query = "SELECT DISTINCT user.cod, user.name, especialidade.cod_espec, especialidade.nom_espec
				  FROM user, medico, medico_especialidade, especialidade
				  WHERE user.cod = medico.cod_medic AND
				  	 	medico.cod_medic = medico_especialidade.cod_medic AND			  	 				
				  	 	especialidade.cod_espec = medico_especialidade.cod_espec and
				  	 	especialidade.cod_espec = $cod_esp
				  ";

		$row = $db->query($query);
		if(!$cod_med)
			while($val = $row->fetch_row()){
				$nova = str_replace($nome_cod, $val[0],$exibir);
				$nova = str_replace($nome_desc, $val[1],$nova);
				echo "$nova\n";
			}
		else
			while($val = $row->fetch_row()){
				if($val[0] == $cod_med){
					$nova = str_replace($nome_cod, $val[0],$exibir);
					$nova = str_replace($nome_desc, $val[1],$nova);
					echo "$nova\n";
				}
			}
			
		
		$db->close();
	}	
	
	
	
	//retorna um array com as consultas dos clientes
	function rel_cliente_ag(){
		$db = banco();
		
		$query ="SELECT user.cod, user.name, user.cpf, cliente.fone, especialidade.nom_espec, consulta.dt_consul, consulta.aprovado, consulta.presente
				FROM user, cliente, consulta, especialidade
				WHERE user.cod = cliente.cod_clien AND
					  user.cod = consulta.cod_clien AND
					  consulta.cd_esp = especialidade.cod_espec
					  
				";
		$row = $db->query($query);
		$db->close();
		return $row;	
	}		  
	
	function rel_especialidade($cod_esp, $exibir, $nome_cod, $nome_desc){
				
		$db = banco();
		
		if($cod_esp == '*'){
			$query ="SELECT * FROM especialidade";
		
		}
		else{$query ="SELECT *  FROM especialidade						
					  WHERE  cod_espec = $cod_esp";
		}		
		$row = $db->query($query);
		while($val = $row->fetch_row()){
			$nova = str_replace($nome_cod, $val[0],$exibir);
			$nova = str_replace($nome_desc, $val[1],$nova);
			echo "$nova\n";
		}
		$db->close();		
	}
	function rel_medico_vaga($med, $esp, $time){
		$db = banco();
		
		$query = "SELECT count(cod_clien)
				FROM  consulta as c, medico_agenda as ag
				WHERE c.cd_med = ag.cd_med AND
					c.cd_med = $med AND
					c.cd_esp = $esp AND
					c.cd_esp = ag.cd_esp AND	
					c.dt_consul = ag.data_disponivel AND
					c.dt_consul = '$time'";
		$res = $db->query($query);
		if($res->num_rows){
			$array = $res->fetch_row();
			return $array[0];
		}
		return FALSE;
	
	}
?>
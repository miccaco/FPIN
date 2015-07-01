<?php
	function consulta_ag($cd_cliente, $cd_med, $cd_esp, $dt_consul){
		$db = banco();
		
		$cd_cliente = intval($cd_cliente);
		$cd_med = intval($cd_med);
		$cd_esp = intval($cd_esp);
		
		$query = "INSERT INTO consulta (cod_clien, cd_med, cd_esp, dt_consul)
				VALUES ($cd_cliente, $cd_med, $cd_esp, '$dt_consul')";
		
		
		$db->query($query);
		if($db->affected_rows == 1){
			return TRUE;
		}
		else
			return FALSE;
		
		
		
	}
	
	function consulta_ap($cd_cliente, $cd_med, $cd_esp, $dt_consul, $aprov){
		$db = banco();
		
		$cd_cliente = intval($cd_cliente);
		$cd_med = intval($cd_med);
		$cd_esp = intval($cd_esp);		
		$dt_consul = date('Y-m-d H:i:s', $dt_consul);
		
		$query = "UPDATE consulta SET  aprovado = '$aprov'
				  WHERE cod_clien = $cd_cliente AND
				   		cd_med = $cd_med AND
				   		cd_esp = $cd_esp AND
				   		dt_consul = '$dt_consul'";
		echo $query;
		if($db->query($query))
			return TRUE;
		else
			return FALSE;
	}
	
	function consulta_pr($cd_cliente, $cd_med, $cd_esp, $dt_consul, $presente){
		$db = banco();
		
		$cd_cliente = intval($cd_cliente);
		$cd_med = intval($cd_med);
		$cd_esp = intval($cd_esp);		
		$dt_consul = date('Y-m-d H:i:s', $dt_consul);
		
		$query = "UPDATE consulta SET  presente = '$presente'
				  WHERE cod_clien = $cd_cliente AND
				   		cd_med = $cd_med AND
				   		cd_esp = $cd_esp AND
				   		dt_consul = '$dt_consul'";
		echo $query;
		if($db->query($query))
			return TRUE;
		else
			return FALSE;
	}
	
	//$dt = mktime(10, 49, 0, 05, 14, 2015); 
	
	//$a = consulta_pr(1, 2, 1, $dt, TRUE);
	
	//echo var_dump($a);
	//$a = consulta_ag(75, 71, 20, '2015-01-06 23:59:00');
	
?>
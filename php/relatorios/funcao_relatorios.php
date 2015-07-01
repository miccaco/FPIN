<?php
require_once('mysql/banco.php');
require('mysql/relatorios.php');
function todos_clientes(){
	$db = banco();	
	
	$q = "
		SELECT DISTINCT u.cod, u.name, u.cpf, c.fone, c.email
		FROM user as u, cliente as c
		WHERE u.cod = c.cod_clien order by (u.cod)
	";
	
	$res = $db->query($q);
	$db->close();
	if($res->num_rows){
		echo "<table>\n<tr><th>Código</th><th>Nome</th><th>CPF</th><th>Telefone</th><th>E-mail</th></tr>\n";
		while($row = $res->fetch_row()){
			echo "<tr>";
			foreach($row as $info)
				echo "<td>$info</td>";
			echo "</tr>\n";
		}
		unset($row);
		echo "</table>\n";
		$res->close();
	}

}

function todos_medicos(){
	$db = banco();	
	
	$q = "
		SELECT DISTINCT u.cod, u.name, u.cpf, m.crm, e.nom_espec
		FROM user as u, medico as m, medico_especialidade as me, especialidade as e
		WHERE u.cod = m.cod_medic and 
			m.cod_medic = me.cod_medic AND
			me.cod_espec = e.cod_espec  order by (u.cod)
	";
	
	$res = $db->query($q);
	$db->close();
	if($res->num_rows){
		echo "<table>\n<tr><th>Código</th><th>Nome</th><th>CPF</th><th>CRM</th><th>Especialidade</th></tr>\n";
		while($row = $res->fetch_row()){
			echo "<tr>";
			foreach($row as $info)
				echo "<td>$info</td>";
			echo "</tr>\n";
		}
		unset($row);
		echo "</table>\n";
		$res->close();
	}
}
function clientes_agenda(){
	$res = rel_cliente_ag();
	date_default_timezone_set('America/Sao_Paulo');
	$dt = date('dmY');
	$dt = floatval($dt);
	if($res->num_rows){
		echo "<table>\n<tr><th>Código</th><th>Nome</th><th>CPF</th><th>Telefone</th><th>Especialidade</th><th>Horário</th></tr>\n";
		while($row = $res->fetch_row()){
			echo "<tr>";
			$data = strtotime($row[5]);
			$data = date('d-m-Y');			
			
			//$data = date('dmY', $data);
			$data = floatval($data);
			if ($dt <= $data){			
			foreach($row as $info)
				echo "<td>$info</td>";
			}
			echo "</tr>\n";
		}
		unset($row);
		echo "</table>\n";
		$res->close();
	}
	
}

?>
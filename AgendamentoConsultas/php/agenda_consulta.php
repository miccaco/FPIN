<?php
require('mysql/banco.php');
require('mysql/relatorios.php');

//agenda
session_start();
require('naoAutenticado.php'); //verifica se usuário foi ou n	
require('../cabecalho.html');
require('pgPersonalizada.php'); 
$id_user = verSessao(); //ver tipo de usuário
pgPersonalizada($id_user);
	
require('submenu_agenda.php'); 
require('titulo_agenda_pesq.php'); 
//fim agenda
date_default_timezone_set('America/Sao_Paulo');
@$hoje = $_POST['hoje'];


if(!$hoje){
?>
<form action="php/agenda_consulta.php" method="post">
	Data <input type="text" maxlength="10" name="hoje">
	<br>
	<input type="submit" value="Pesquisar">
</form>
<?php
}
else{
	@$hoje = ereg_replace('[\/\-\.]', '/', $hoje);
	
	@$dia = strtok($hoje, '/');
	@$hoje = strstr($hoje, '/');
	@$hoje = substr($hoje, 1);
	@$mes = strtok($hoje, '/');
	@$hoje = strstr($hoje, '/');
	@$hoje = substr($hoje, 1);
	@$ano = strtok($hoje, ' ');
	
	$hoje = $ano.'-'.$mes.'-'.$dia;
	$hoje = strtotime($hoje);
	if (time() > $hoje){
		echo "<h2>Verifique a data digitada</h2>";
		echo "<h2>Deve ser igual ou posterior a data de hoje</h2>";
	}
	else{
	$hoje = date('Y-m-d', $hoje);
	

	
	$agenda = FALSE;
	//SELECT user.cod, user.name, user.cpf, cliente.fone, especialidade.nom_espec, consulta.dt_consul, consulta.aprovado, consulta.presente 
$res = rel_cliente_ag();

echo "<table>\n";
echo "<tr><th>Código</th><th>Nome</th><th>CPF</th><th>Telefone</th><th>Especialidade</th><th>Horário</th><th>Aprovado</th><th>Presente</th></tr>\n";
while($row = $res->fetch_row()){
	$time = substr($row[5], 0, 10);
	if($hoje == $time){
	$agenda = TRUE;	
	echo "<tr>\n";
	for($i = 0; $i < 8; $i++)
		echo "<td>$row[$i]</td>";
		echo "\n";
	}
}
echo "</table>";
if(!$agenda){
	echo "<h2>Não há agendamento para hoje \"$hoje\"</h2>";
}
}
}
require('../rodape.html');
?>
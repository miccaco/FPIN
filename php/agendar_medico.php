<?php
require_once('mysql/banco.php');
require_once('mysql/ag_med.php');
require_once('mysql/relatorios.php');

//página médico
session_start(); //inicia sessão
require('../cabecalho.html');

require('verSessao.php'); //importa arquivo com a função "verSessao"
require('pgPersonalizada.php');
$id_user = verSessao();
pgPersonalizada($id_user); //função de menu

require('submenu_medico.php');
require('titulo_medico_agendar.php');
//fim página médico

@ $cod_med = $_POST['cod_med']; 
@ $cod_esp = $_POST['cod_esp'];
@ $data = $_POST['data'];
@ $hora = $_POST['hora'];
@ $vagas = $_POST['vagas'];

//se tudo estiver preenchido
if($cod_esp && $data && $vagas){
	@date_default_timezone_set('America/Sao_Paulo');
	@$data = ereg_replace('[\/\-\.]', '/', $data);
	@$data = $data." ".$hora;
	@$dia = strtok($data, '/');
	@$data = strstr($data, '/');
	@$data = substr($data, 1);
	@$mes = strtok($data, '/');
	@$data = strstr($data, '/');
	@$data = substr($data, 1);
	@$ano = strtok($data, ' ');
	@$hora = strstr($data, ' ');
	
	$data = $ano.'-'.$mes.'-'.$dia.' '.$hora;
	
	if(isset($cod_med)){
		if(time() < strtotime($data)){
		
		
			if(ag_med ($cod_med, $cod_esp, $data, $vagas)){
				echo "<h2>AGENDAMENTO EFETUADO</h2>\n";
			}
			else{
				echo "<h2>Não foi possível agendar</h2>\n";
				echo "<h2>Tente outro horário</h2>\n";
			}
		}
		else{
			echo "<h2>A data está menor que a atual</h2>";
		}
	}
	
	
}
else{
	echo "<form method=\"POST\" action=\"php/agendar_medico.php\">\n";
	//especialidade
	echo "Especialidade";	
	if(!$cod_esp){
		echo "<select name=\"cod_esp\">\n";
		echo "<option value=\"\"></option>\n";
		rel_especialidade('*', '<option value="cod">nome</option>', 'cod', 'nome');
		echo "</select>\n";
	}
	else{//se já estiver selecionado
		echo "<select name=\"cod_esp\">\n";
			rel_especialidade($cod_esp, '<option value="cod">nome</option>', 'cod', 'nome');
		echo "</select>\n";
		
		//exibe médico
		if(!$cod_med){
			echo "<br><br>Medico: <select name=\"cod_med\">\n";
				rel_medico_esp(null,$cod_esp, '<option value="cod">nome</option>', 'cod', 'nome');
			echo "</select>\n";
			
		
?>
<br><br>
Data [ dia/mes/ano ]
<input type="text"  name="data" maxlength="10"/>
<br>
Horário [ hora:minuto ]<input type="text"  name="hora"/>
<br>
Vagas <input type="text"  name="vagas"/>	
<?php	
		}
	
	}
	

	
?>	
<input type="submit" value="CONFIRMAR" />
</form>
<?php
}
	

require('../rodape.html');
?>

<?php
//variáveis de formulário
@ $espec = $_POST['espec'];	
@ $medico = $_POST['medico'];
@ $horario = $_POST['horario'];
@ $cliente = $_POST['cliente'];
//funcoes de relatorios
require_once('mysql/banco.php');
require_once('mysql/relatorios.php');
require_once('mysql/consulta.php');

//pagina de agendamento
session_start();
require('naoAutenticado.php'); //verifica se usuário foi ou n	
require('../cabecalho.html');
require('pgPersonalizada.php'); 
$id_user = verSessao(); //ver tipo de usuário
pgPersonalizada($id_user);
	
require('submenu_agenda.php'); 
require('titulo_agenda_realizar.php'); 

?>

<?php	
if($espec and $medico and $horario){
	$agendou = consulta_ag($cliente, $medico, $espec, $horario);//realiza consulta
	if($agendou)
		echo "<h1>Consulta agendada!</h1>";
	else
		echo "<h1>Não foi possível agendar!</h1>";
	
	exit;
}
	
	//início formulário

	echo "<form method=\"POST\" action=\"php/agendar_consulta.php\">\n";		
	
	if(!$espec){
		echo "Especialidade<select name=\"espec\">\n";
		echo "<option value=\"\"></option>\n";
		rel_especialidade('*', '<option value="cod">nome</option>', 'cod', 'nome');
		echo "</select>\n";
	}
	else{
		//se Especialidade já estiver selecionado
		echo "Especialidade<select name=\"espec\">\n";
		rel_especialidade($espec, '<option value="cod">nome</option>', 'cod', 'nome');
		echo "</select>\n";
		//exibe médico
		if(!$medico){
			echo "<select name=\"medico\">\n";
			rel_medico_esp(null, $espec, '<option value="cod">nome</option>', 'cod', 'nome');
			echo "</select>\n";
		}
		else{
			//médico foi selecionado
			echo "<select name=\"medico\">\n";
			rel_medico_esp($medico, $espec, '<option value="cod">nome</option>', 'cod', 'nome');
			echo "</select>\n";
			
			$med = rel_medico_ag ($medico);
			if($med->num_rows){
				while($m = $med->fetch_row()){
					//verifica se há vagas
					if($m[5] > rel_medico_vaga($medico, $espec, $m[4])){
						$disponivel[] = "<option value=\"$m[4]\">$m[4]</option>\n";
					}
					
				}
				if(isset($disponivel)){
					echo "Dia e horário<select name=\"horario\">\n";
					//exibe dia e horário disponível
					foreach($disponivel as $sel)
						echo $sel;
					echo "</select>\n";								
					echo "Informe o codigo do cliente<input type=\"text\" name=\"cliente\">\n";
				}
				else{
					echo "Nao há agenda para este médico";
				}
				
				
			}
			else{
				echo "Nao há agenda para este médico";
			}
		}
	}

	echo "<input type=\"submit\" value=\"Confirmar\">\n";
	echo "</form>\n"; 
	require('../rodape.html');
?>
<?php
	session_start();
	require('naoAutenticado.php'); //verifica se usuário foi ou n	
	require('../cabecalho.html');
	require('pgPersonalizada.php'); 
	
	$id_user = verSessao(); //ver tipo de usuário
	pgPersonalizada($id_user);
	
	require('submenu_relatorio.php'); 
	require('titulo_relatorio.php'); 
?>

      <div class="portlet">            
            <div class="portlet-content">
            <!--THIS IS A PLACEHOLDER FOR FLOT - Report & Graphs -->
            <a href="php/relatorio_paciente.php">Pacientes</a>
			</br>
			  <a href="php/relatorio_medico.php">Medicos</a>
			  </br>
			    <a href="php/relatorio_usuario.php">Usuários</a>
				</br>
				  <a href="php/relatorio_consultasag.php">Consultas agendadas</a>
				  
				  
            </div>
        </div>      
 
 <?php
 require('../rodape.html');
 ?>
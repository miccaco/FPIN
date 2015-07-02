<?php
function pgPersonalizada($id_user){	
echo "<div id=\"menu\">\n";
echo "<ul class=\"group\" id=\"menu_group_main\">\n";

if($id_user){
	echo "<li class=\"item first\" id=\"one\"><a href=\"php/agenda.php\" target=\"_parent\" ><span class=\"outer\"><span class=\"inner dashboard\">Agenda</span></span></a></li>\n";
	if($id_user == 3){
		echo '<li class="item middle" id="two"><a href="php/paciente.php" target="_parent" class="main"><span class="outer"><span class="inner content">Pacientes</span></span></a></li>';
		echo '<li class="item middle" id="three"><a href="php/medico.php" target="_parent"><span class="outer"><span class="inner reports png">Medicos</span></span></a></li>';
	}    					
?>
	<li class="item middle" id="five"><a href="php/relatorio.php" target="_parent" class="main"><span class="outer"><span class="inner media_library">Relátorios</span></span></a></li>        
	<li class="item middle" id="six"><a href="php/ajuda.php" target="_parent" class="main"><span class="outer"><span class="inner event_manager">Ajuda</span></span></a></li>        
	<li class="item last" id="eight"><a href="php/logout.php" target="_parent" class="main"><span class="outer"><span class="inner settings">Sair</span></span></a></li>
		
<?php
echo "</div>\n<!-- MENU END -->\n";
}
?>
	
<?php
	
}

?>
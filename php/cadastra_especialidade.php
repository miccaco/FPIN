<?php
require('../theader.html');
@$nome = $_POST['nome'];

//se tudo foi preenchido
if($nome){
	require('mysql/cad_med.php');
	
	echo cad_especialidade($nome);
	
	exit;

}
	 
?>
<section>

<form method="POST" action="cadastra_especialidade.php">
Nome Especialidade <input type="text" name="nome" maxlength="20"><br><br>

<input type="submit" value="Cadastrar-se">
 
</form>

</section>

<?php
require('../tfooter.html');
?>

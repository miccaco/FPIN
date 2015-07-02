<?php
require_once('mysql/banco.php');	
require_once('mysql/cad_user.php');	
require_once('mysql/cad_med.php');
require_once('mysql/relatorios.php');

//pagina médico
session_start(); //inicia sessão
require('../cabecalho.html');

require('verSessao.php'); //importa arquivo com a função "verSessao"
require('pgPersonalizada.php');
$id_user = verSessao();
pgPersonalizada($id_user); //função de menu

require('submenu_medico.php');
require('titulo_medico_cadastra.php');
//fim página médico

@$usr['nome'] = $_POST['nome'];
@$usr['cpf'] = $_POST['cpf'];
@$usr['crm'] = $_POST['crm'];
@$usr['espec'] = $_POST['espec'];
@$usr['senha1'] = $_POST['senha1'];
@$usr['senha2'] = $_POST['senha2'];

$preenchido = TRUE;

foreach($usr as $value){	
	if(!$value)
		$preenchido = FALSE;

}
//se tudo foi preenchido
if($preenchido){
	if($usr['senha1'] != $usr['senha2'])
		echo "<h4>As senhas nas correspondem</h4>";
	else{	
		
	//cadastro usuário
	$cod = cad_user($usr['cpf'], $usr['nome'], $usr['senha1'], 2);
	
	//cadastra crm
	cad_med_crm ($cod, $usr['crm']);
	
	//cadastra especialidade
	cad_med_esp ($cod, $usr['espec']);
	if($cod){
		echo "<h2>Medico cadastrado</h2>\n";
		echo "<h2>O codigo de acesso é <strong>$cod<strong></h2>\n";
	}
	else{
		echo "<h2>Cadastro não pode ser realizado</h2>";
		echo "<h2>Saia e entre novamente no sistema para efetuar o cadastro</h2>";
	}
	exit;
	}
}
	 
?>
<section>

<form method="POST" action="php/cadastra_medico.php">
Nome<input type="text" name="nome" maxlength="50" >

CPF <input type="text" name="cpf" maxlength="11">

CRM:<input type="text" name="crm" maxlength="11">
<br>
ESPECIALIDADE <select name="espec">

<?php
	rel_especialidade('*', '<option value="codigo">nome</option>', 'codigo', 'nome')		
?>
</select><br><br>
SENHA:<br><input type="password" name="senha1" maxlength="10"><br><br>

REPITA A SENHA:<br><input type="password" name="senha2" maxlength="10">
<br>
<input type="submit" value="Cadastrar-se">
 
</form>

</section>
<?php
require('../rodape.html');
?>

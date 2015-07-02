<?php
	require('../cabecalho.html');
	require('../menucliente.html');
?>

<div class="grid_16">
<!-- TABS START -->
    <div id="tabs">
         <div class="container">
            <ul>
                      <li><a href="usuario.html"  ><span>Pesquisar usuário</span></a></li>
                      <li><a href="registrarusuario.html" class="current"><span>Registrar usuário</span></a></li>                                                                           
					  <li><a href="registrarmedico.html" class=""><span>Manutenção de usuário</span></a></li>
           </ul>
        </div>
    </div>
<!-- TABS END -->    
</div>
<!-- HIDDEN SUBMENU START -->

<!-- HIDDEN SUBMENU END -->  

<!-- CONTENT START -->

    <div class="grid_16" id="content">
    <!--  TITLE START  -->  <div class="grid_9">
    <h1 class="content_edit">Registro de usuário</h1>
    </div>
    <div class="grid_15" id="textcontent">
    
</span></a></form>	
<form id="edit" action="" method="post">
		<label>CPF</label>
        <input class="smallInput wide" type="text" maxlength="11" name="cpf"/>
    	<label>Nome</label>
        <input class="smallInput wide" type="text" maxlength="50" name="nome"/>
		<label>E-mail</label>
        <input type="text" class="smallInput wide" name="email" />
		<label>Senha</label>
        <input type="password" class="smallInput wide" name="senha" />		
		<label>Repita a Senha</label>
        <input type="password" class="smallInput wide" name="senha1" />		
		
        <label>Informe a operação que deseja realizar</label>
       <!-- BUTTONS -->
        <a class="button"><span>Novo</span></a>
        <a class="button_grey"><span>Alterar</span></a>
        <a class="button_ok"><span>Salvar</span></a>
        <a class="button_notok"><span>Deletar</span></a>        
    </form><br />


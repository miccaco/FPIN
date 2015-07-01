<!DOCTYPE html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Fpin - Projeto</title>
<link rel="stylesheet" type="text/css" href="css/960.css" />
<link rel="stylesheet" type="text/css" href="css/green.css" />
</head>

<body>
<!-- WRAPPER START -->
<div class="container_16" id="wrapper">	
<!-- HIDDEN COLOR CHANGER -->      
      <div style="position:relative;">
      	<div id="colorchanger">
        	<a href="dashboard_red.html"><span class="redtheme">Red Theme</span></a>
            <a href="dashboard.html"><span class="bluetheme">Blue Theme</span></a>
            <a href="dashboard_green.html"><span class="greentheme">Green Theme</span></a>
        </div>
      </div>
  	<!--LOGO-->
	<div class="grid_8" id="logo">Fpin - Projeto </div>
    <div class="grid_8">
<!-- USER TOOLS START -->
     
    </div>
<!-- USER TOOLS END -->    
<div class="grid_16" id="header">
<!-- MENU START -->
<div id="menu">
	<ul class="group" id="menu_group_main">
		<li class="item first" id="one"><a href="agenda.html" class="main"><span class="outer"><span class="inner dashboard">Agenda</span></span></a></li>
        <li class="item middle" id="two"><a href="paciente.html" class="main"><span class="outer"><span class="inner content">Pacientes</span></span></a></li>
        <li class="item middle" id="three"><a href="medico.html" class="main current"><span class="outer"><span class="inner reports png">Medicos</span></span></a></li>
        <li class="item middle" id="four"><a href="usuario.html" class="main"><span class="outer"><span class="inner users">Usuários</span></span></a></li>
		<li class="item middle" id="five"><a href="relatorio.html" class="main"><span class="outer"><span class="inner media_library">Relátorios</span></span></a></li>        
		<li class="item middle" id="six"><a href="ajuda.html" class="main"><span class="outer"><span class="inner event_manager">Ajuda</span></span></a></li>        
		<li class="item middle" id="seven"><a href="#" class="main"><span class="outer"><span class="inner newsletter">Configurações</span></span></a></li>        
		<li class="item last" id="eight"><a href="index.html" class="main"><span class="outer"><span class="inner settings">Sair</span></span></a></li>        
    </ul>
</div>
<!-- MENU END -->
</div>
<div class="grid_16">
<!-- TABS START -->
    <div id="tabs">
         <div class="container">
            <ul>
                      <li><a href="medico.html"  ><span>Pesquisar medico</span></a></li>
                      <li><a href="registrarmedico.html" class="current"><span>Registrar medico</span></a></li>                                                                           
					  <li><a href="registrarmedico.html" class=""><span>Manutenção de medico</span></a></li>
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
    <h1 class="content_edit">Registro de medico</h1>
    </div>
    <div class="grid_15" id="textcontent">
    


</span></a></form>	
<form id="edit" action="" method="post">
    	<label>Nome</label>
        <input type="text" class="smallInput wide" />
		<label>E-mail</label>
        <input type="text" class="smallInput wide" />
		<label>Crm</label>
        <input type="text" class="smallInput wide" />
		<label>Especialidade</label>
        <select name="time" class="smallInput wide" />
		<option value="bota">Cirugião</option>
		<option value="fla">Dermatologista</option>	
		<option value="fla">Urologista</option>	
		</select>	
		<label>Sexo</label>
        <select name="time" class="smallInput wide" />
		<option value="bota">Masculino</option>
		<option value="fla">Feminino</option>	
		</select>		
		<label>Telefone</label>
        <input type="text" class="smallInput wide" />
		<label>Celular</label>
        <input type="text" class="smallInput wide" />
		<label>Estado</label>
        <input type="text" class="smallInput wide" />
		<label>Cidade</label>
        <input type="text" class="smallInput wide" />
		<label>Bairro</label>
        <input type="text" class="smallInput wide" />
		<label>Logradouro</label>
        <input type="text" class="smallInput wide" />
		<label>Cep</label>
        <input type="text" class="smallInput wide" />
		<label>Data de nascimento :<input type='text' class='calendarSelectDate' size='10' name='calendario'/> </label>
		<div id='calendarDiv'></div>
		<label>Cpf</label>
        <input type="text" class="smallInput wide" />
		<label>Rg</label>
        <input type="text" class="smallInput wide" />
		<label>Estado civil</label>
        <input type="text" class="smallInput wide" />
		</select>
        <label>Observação</label>
        <textarea id="wysiwyg" class="smallInput wide" rows="7" cols="30"></textarea>               
        <label>Informe a operação que deseja realizar</label>
       <!-- BUTTONS -->
        <a class="button"><span>Novo</span></a>
        <a class="button_grey"><span>Alterar</span></a>
        <a class="button_ok"><span>Salvar</span></a>
        <a class="button_notok"><span>Deletar</span></a>        
    </form><br />

    
   </div>
    <div class="clear"> </div>
<!-- END CONTENT-->    
  </div>
<div class="clear"> </div>


</div>
<!-- FOOTER START -->
<div class="container_16" id="footer">Desenvolvido para <a href="../index.html">Disciplina de FPIN</a></div>
<!-- FOOTER END -->
</body>
</html>

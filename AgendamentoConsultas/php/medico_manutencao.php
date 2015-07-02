<?php
session_start(); //inicia sessão
require('../cabecalho.html');

require('verSessao.php'); //importa arquivo com a função "verSessao"
require('pgPersonalizada.php');
$id_user = verSessao();
pgPersonalizada($id_user); //função de menu

require('submenu_medico.php');
require('titulo_medico.php');
require('../rodape.html');
?>


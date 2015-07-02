<?php
	require('verSessao.php');
	if(!verSessao()){
		echo '<meta http-equiv="refresh" content="0; url=../index.php">';
	}
?>
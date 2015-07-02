<?php
	require('banco.php');
	$query = "SELECT cod, cpf, name, tipo
			  FROM user
			  WHERE (cod= $user or
					cpf = $user) and
					senha like('$senha')";
	$result = mysqli_query($banco, $query);
	
	$id = mysqli_fetch_assoc($result);
	$id = intval($id['tipo']);
	@ mysqli_close();
?>
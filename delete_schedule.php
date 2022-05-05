<?php 
	require_once('conexao.php');
	if(!isset($_GET['id'])){
	    echo "<script> alert('ID INVÁLIDO!.'); location.replace('./') </script>";
	    $conexao->close();
	    exit;
	}
 
	$delete = $conexao->query("DELETE FROM `agenda` where id = '{$_GET['id']}'");
	if($delete){
	    echo "<script> alert('Tarefa deletada com sucesso!.'); location.replace('./') </script>";
	}else{
	    echo "<pre>";
	    echo "Um erro ocorreu!.<br>";
	    echo "Error: ".$conexao->error."<br>";
	    echo "SQL: ".$sql."<br>";
	    echo "</pre>";
	}
	$conexao->close();
 
	?>
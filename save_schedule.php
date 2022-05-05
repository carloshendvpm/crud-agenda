<?php 
require_once('conexao.php');
if($_SERVER['REQUEST_METHOD'] !='POST'){
    echo "<script> alert('Erro: Sem datos para salvar.'); location.replace('./') </script>";
    $conexao->close();
    exit;
}
extract($_POST);
$allday = isset($allday);
 
if(empty($id)){
    $sql = "INSERT INTO `agenda` (`title`,`description`,`start_datetime`,`end_datetime`) VALUES ('$title','$description','$start_datetime','$end_datetime')";
}else{
    $sql = "UPDATE `agenda` set `title` = '{$title}', `description` = '{$description}', `start_datetime` = '{$start_datetime}', `end_datetime` = '{$end_datetime}' where `id` = '{$id}'";
}
$save = $conexao->query($sql);
if($save){
    echo "<script> alert('Tarefa salva com sucesso!.'); location.replace('./') </script>";
}else{
    echo "<pre>";
    echo "Um erro aconteceu :(.<br>";
    echo "Error: ".$conexao->error."<br>";
    echo "SQL: ".$sql."<br>";
    echo "</pre>";
}

?>
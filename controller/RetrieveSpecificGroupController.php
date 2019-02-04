<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//jsonObjectGroupId

include '../config.php';
$groupTask = new GroupTask();
$conexao = new ConectionFactory();
$query = new Queryes();

$idTaskGroup = $_POST['jsonObjectGroupId'];
$groupTask->setIdTaskGroup($idTaskGroup);
try {
    
    $result = $conexao->getConectionLocal()->query($query->retrieveSpecificGroupTask($groupTask));
    
    echo json_encode($result->fetchAll());
    
} catch (PDOException $exc) {
    echo $exc->getMessage();
    
}

<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include '../config.php';


$groupTask = new GroupTask();
$conexao = new ConectionFactory();
$query = new Queryes();

$nameGroup = $_POST['nameGroup'];
$groupTask->setNameGroup($nameGroup);

try {
    
    $result = $conexao->getConectionLocal()->query($query->createGroupTask($groupTask));
    $lastIdInsertedSttm = $conexao->getConectionLocal()->query($query->retrieveLastIdInserted());
    
    $lastIdInserted = $lastIdInsertedSttm->fetchAll();
    echo json_encode($lastIdInserted);
  
} catch (PDOException $exc) {
    echo $exc->getMessage();
    
}
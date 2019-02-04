<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include '../config.php';

$task = new Task();
$conexao = new ConectionFactory();
$query = new Queryes();

$contentTask = $_POST['contentTask'];
$task->setContentTask($contentTask);

$idTask = $_POST['idTask'];
$task->setIdTask($idTask);

try {
    
    $result = $conexao->getConectionLocal()->query($query->updateTask($task));
    
    $result->fetchAll();
    
} catch (PDOException $exc) {
    echo $exc->getMessage();
    
}

<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * 
 * 2019
 * @author Paulo Machado
 */

include '../config.php';

$task = new Task();
$groupTask = new GroupTask();
$conexao = new ConectionFactory();
$query = new Queryes();

$contentTask = $_POST['contentTask'];
$task->setContentTask($contentTask);

$idTaskGroup = $_POST['idTaskGroup'];
$groupTask->setIdTaskGroup($idTaskGroup);

try {
    
    $result = $conexao->getConectionLocal()->query($query->createTask($task,$groupTask));
    
    $result->fetchAll();
    
} catch (PDOException $exc) {
    echo $exc->getMessage();
    
}

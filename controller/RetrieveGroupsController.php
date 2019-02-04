<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * 2019
 * @ author Paulo Machado
 */

include '../config.php';

$conexao = new ConectionFactory();
$query = new Queryes();


try {
    
    $result = $conexao->getConectionLocal()->query($query->retrieveGroupTasks());
    
    echo json_encode($result->fetchAll());
    
} catch (PDOException $exc) {
    echo $exc->getMessage();
    
}

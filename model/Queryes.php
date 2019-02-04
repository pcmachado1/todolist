<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Queryes
 * Classe para definição de queryes. 
 * @author Paulo Machado
 */

class Queryes {
    private $query;
    
    function __construct() {
        
    }
    
    // Definição das funções do crud
    
    public function createTask(Task $task, GroupTask $groupTask) {
        $this->query = "INSERT INTO task (content_task,fk_task_group) values ".
                    "('".$task->getContentTask()."','".$groupTask->getIdTaskGroup()."');";
        
        return $this->query;
    }
    public function retrieveTasks() {
        $this->query = "SELECT * FROM task";
        
        return $this->query;
    }
    public function updateTask(Task $task) {
        $this->query = "UPDATE task set content_task = '".$task->getContentTask().
                        "' where id_task = ".$task->getIdTask()." ";
        return $this->query;
    }
    public function deleteTask(Task $task) {
        $this->query = "DELETE FROM task WHERE id_task = ".$task->getIdTask()."";
        
        return $this->query;
    }
    public function updateCurrentStatus(Task $task) {
        $this->query = "UPDATE task SET status_task = '".$task->getStatusTask()."' WHERE id_task = ".$task->getIdTask().";";
        
        return $this->query;
    }
    
    public function retrieveTasksWithGroup(GroupTask $groupTask) {
        //SELECT * FROM task JOIN task_group WHERE task.fk_task_group = task_group.id_task_group
        
        $this->query = "SELECT * FROM task JOIN task_group on task.fk_task_group = task_group.id_task_group WHERE task_group.id_task_group=".$groupTask->getIdTaskGroup()."";
        
        return $this->query;
        
    }
    public function createGroupTask(GroupTask $groupTask) {
        $this->query = "INSERT INTO task_group (name_group) VALUES ('".$groupTask->getNameGroup()."') ;";
        
        return $this->query;
    }
    public function retrieveLastIdInserted() {
        $this->query = "SELECT MAX(id_task_group) as idTaskGroup FROM task_group";
        
        return $this->query;
    }
    public function retrieveSpecificGroupTask(GroupTask $groupTask) {
        $this->query = "SELECT * FROM task_group WHERE id_task_group = ".$groupTask->getIdTaskGroup()."";
        
        return $this->query;
    }
    public function retrieveGroupTasks() {
        $this->query = "SELECT * FROM task_group;";
        
        return $this->query;
    }
    
    //select * from usuario join usuarioperfil on usuario.id = usuarioperfil.fk_usuario JOIN perfil on perfil.id = usuarioperfil.fk_perfil WHERE usuario.login='pcmachado' and usuario.senha='12345678';
    public function efetuarLogin(Usuario $usuario) {
        $this->query = "SELECT * FROM usuario WHERE "
                . "login ='".$usuario->getUsuario()."'"
                . " and senha='".$usuario->getSenha()."';";
        return $this->query;
    }
    public function atualizarPerfil(Usuario $usuario) {
        $this->query = "UPDATE usuario set nome = '".$usuario->getNome().
                        "' , sobrenome = '".$usuario->getSobrenome().
                        "' , email = '".$usuario->getEmail().
                        "' , login = '".$usuario->getUsuario().
                        "' , senha = '".$usuario->getSenha().
                        "' where id = ".$usuario->getId()." ";
        return $this->query;
    }
    public function novoCadastro(Usuario $usuario) {
        $this->query = "INSERT INTO usuario (nome,sobrenome,email,login,senha) values ".
                    "('".$usuario->getNome().
                    "','".$usuario->getSobrenome().
                    "','".$usuario->getEmail().
                    "','".$usuario->getUsuario().
                    "','".$usuario->getSenha()."');";
        
        return $this->query;
    }
    public function getIdNewUser(Usuario $usuario){
        $this->query = "SELECT * FROM usuario where nome='".$usuario->getNome().
                "' and sobrenome='".$usuario->getSobrenome().
                "' and email='".$usuario->getEmail()."' ;";
        
        return $this->query;
    }
    public function atualizarImagem(Usuario $usuario) {
        $this->query = "UPDATE usuario set image = '".$usuario->getImage().
                        "' where id = ".$usuario->getId()." ";
        return $this->query;
                           
    }
    public function listarUsuariosSimples() {
        $this->query = "SELECT * FROM usuario";
        
        return $this->query;
    }
    public function listarUsuarios() {
       $this->query = "SELECT usuario.*,perfil.perfilnome FROM usuario JOIN usuarioperfil ON usuario.id = usuarioperfil.fk_usuario JOIN perfil ON perfil.id = usuarioperfil.fk_perfil";
       
       return $this->query;
    }
    public function desativarUsuario(Usuario $usuario) {
        $this->query = "UPDATE usuario set status = '".$usuario->getStatus()."' where id = ".$usuario->getId()."" ;
        
        return $this->query;
    }
    public function perfilInicial(Usuario $usuario) {
        
        $this->query = "INSERT into usuarioperfil (fk_usuario,fk_perfil) VALUES (".$usuario->getId().",2)";
        
        return $this->query;
    }

}

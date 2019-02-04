<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Task
 *
 * @author paulo machado
 */
class Task {
    private $idTask;
    private $contentTask;
    private $statusTask;
    
    public function __construct() {
        
    }
    
    //getters
    
    public function getIdTask() {
        return $this->idTask;
    }

    public function getContentTask() {
        return $this->contentTask;
    }
    
    public function getStatusTask() {
        return $this->statusTask;
    }

        
    //setters
    
    public function setIdTask($idTask) {
        $this->idTask = $idTask;
    }

    public function setContentTask($contentTask) {
        $this->contentTask = $contentTask;
    }
    
    public function setStatusTask($statusTask) {
        $this->statusTask = $statusTask;
    }



}

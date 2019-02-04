<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GroupTask
 *
 * @author paulo machado
 */
class GroupTask {
    private $idTaskGroup;
    private $nameGroup;
    
    //getters
    
    public function getIdTaskGroup() {
        return $this->idTaskGroup;
    }

    public function getNameGroup() {
        return $this->nameGroup;
    }

    //setters
    
    public function setIdTaskGroup($idTaskGroup) {
        $this->idTaskGroup = $idTaskGroup;
    }

    public function setNameGroup($nameGroup) {
        $this->nameGroup = $nameGroup;
    }


}

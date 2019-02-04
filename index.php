<?php
        session_start();
       
    switch ($_GET['page']) 
    {
        case '':
            
            include 'view/header.html';
            include 'view/CreateTaskView.html';
            include 'view/footer.html';
            
        break;

        
        case 'tarefas':
            
            include 'view/header.html';
            include 'view/CreateTaskView.html';
            include 'view/footer.html';
            
        break;
        
        default:
            
        break;
    }
        
    
        
        
            
?>

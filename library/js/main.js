$(document).ready(function(){
    //works 12/01/2019
        var usersTable;
        
    //
    //
    //works 26/01/2019
    
   $(document).on('click', '.btn', function(){
    	
    			var idTask  = $(this)                       
                            .parent()              // Navega para o elemento pai (td)
                            .parent()              // Navega para o pai de td (tr)
                            .find(':nth-child(1)') // Encontra o elemento do seletor
                            .html();               // Retorna o html do elemento 

                        var contentTask  = $(this)                       
                            .parent()              // Navega para o elemento pai (td)
                            .parent()              // Navega para o pai de td (tr)
                            .find(':nth-child(2)') // Encontra o elemento do seletor
                            .html();               // Retorna o html do elemento 
                          
                          if(this.tagName === 'SELECT'){
                              idTask = this.getAttribute('id');
                              var statusTask = this.value;
                              
                              $.post('../todolist/controller/UpdateStatus.php',{idTask:idTask,statusTask:statusTask},function(data){
                                  console.log(data);
                              });
                          }
        		
        		 $("#idTask").val(idTask);
                         $("#txtTask").val(contentTask);
    		
    
		});
    $("#btnUpdateTask").click(function(){
        console.log($("#idTask").val());
        console.log($("#txtTask").val());
        updateTasks($("#txtTask").val(),$("#idTask").val());
    });            
    $("#btnNewGroup").click(function(){
        
        var nameGroup = $('#txtGrupo').val();
        if(nameGroup === ""){
            $("#errorTask").css('display','block');
        }else{
            CreateGroupTask(nameGroup); 
        }
        //retrieveGroups();
    });
    
    
    $("table").sortable();

    
    
    
});

function deleteTasks(htmlElement){
   
    var idTask = htmlElement.getAttribute('id');
    console.log();
    $.post('../todolist/controller/DeleteTaskController.php',{idTask:idTask},function(data){
            console.log();
            location.reload();
        })
}
function updateTasks(contentTask,idTask){
    
    $.post('../todolist/controller/UpdateTaskController.php',{contentTask:contentTask,idTask:idTask},function(data){;
        console.log(data);
        location.reload();
    });
}
function retrieveGroupsAndTasks() {
    $.post('../todolist/controller/RetrieveGroupsController.php',{},function (data) {
           
           
           var jsonObjectGroup = JSON.parse(data);
           for(i=0;i<jsonObjectGroup.length;i++){
                $('#groups').append("<div >"+
                            "<span>"+jsonObjectGroup[i].name_group+"</span>"+
                            "</div>")+
                            "<div class=\"form-group\">";
                $('#groups').append("<div class=\"form-group\">"+
                            "<label for=\"comment\">Tarefa:</label>"+
                            "<textarea class=\"form-control noresize\" rows=\"5\" id=\"contenttask"+jsonObjectGroup[i].id_task_group+"\"></textarea>"+
                            "</div>"+
                            "<div  id=\"errorTaskGroup\" style=\"display: none\" class=\"row alert\">"+
                                "<small> <strong>Favor Preencher o campo para adicionar a tarefa !!</strong></small>"+
                            "</div>"+
                            "<div class=\"form-group\">"+
                                "<button class=\"form-control btn btn-primary\" id=\""+jsonObjectGroup[i].id_task_group+"\" onClick=\"createTask(this,document.getElementById('contenttask"+jsonObjectGroup[i].id_task_group+"'))\">Add Tarefa</button>"+
                            "</div>");
                $('#groups').append("<table id=\"table"+jsonObjectGroup[i].id_task_group+"\" class=\"table\">"+
                            "<thead>"+
                            "<tr>"+
                                "<th>ID</th>"+
                                "<th>Tarefa</th>"+
                                "<th>Status</th>"+
                                "<th>Tarefa</th>"+
                                "<th>Deletar</th>"+
                            "</tr>"+
                            "</thead>");
                    var idTaskGroup = jsonObjectGroup[i].id_task_group;
                    //console.log('grupo ID:'+idTaskGroup);
            $.post('../todolist/controller/retrieveTasksWithGroupsController.php',{idTaskGroup:idTaskGroup},function (data) {
                    //console.log(JSON.parse(data));
                    var jsonObject = JSON.parse(data);
                    for(i=0;i<jsonObject.length;i++){
                           //var table = $().val();
                           var elementTable = "#table"+jsonObject[i].fk_task_group+"";
                           $(""+elementTable+"").append("<tr id="+jsonObject[i].id_task+">"+
                                                            "<td id=\"\">"+jsonObject[i].id_task+"</td>"+
                                                            "<td id=\"\">"+jsonObject[i].content_task+"</td>"+
                                                            "<td id=\"\"><div class=\"dropdown\">"+
                                                            "<select id=\""+jsonObject[i].id_task+"\" name=\"options"+jsonObject[i].id_task+"\" class=\"btn btn-primary\">"+
                                                             "<option value=\"ativo\">Ativo</option>"+
                                                             "<option value=\"inativo\">Inativo</option>"+
                                                            "</select>"+
                                                            "</div></td>"+
                                                            "<td><button id=\"\" class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#myModal\"><span class=\"glyphicon glyphicon-edit\"></span> Editar</button></td>"+
                                                            "<td><button id=\""+jsonObject[i].id_task+"\" onclick=\"deleteTasks(this)\" class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"\"><span class=\"glyphicon glyphicon-plus\"></span> Excluir</button></td>"+
                                                            "</tr>");
//                            if(idTaskGroup == jsonObject[i].fk_task_group){
//                                console.log(jsonObject[i].content_task);
//                            }
                                
                                
                                    
                                }
                });
                
                $('#groups').append("</table>");
           }
            
        });
}
function CreateGroupTask(nameGroup){
    
    
    $.post('../todolist/controller/CreateGroupController.php',{nameGroup:nameGroup},function(data){
        
        var jsonObjectGroup = JSON.parse(data);
        var jsonObjectGroupId = jsonObjectGroup[0].idTaskGroup;
        
        location.reload();
        
        
    });
    
    
}
function updateCurrentStatus(statusTask,idTask){
    var statusTask = statusTask;
    var idTask = idTask;
}
function createTask(groupId,text){
    
    var contentTask = text.value;
    var idTaskGroup = groupId.getAttribute('id');
    
//    $(document).on('click', 'this', function(e){
//    	
//            
//        var contentTask = $("#contentTask").val();
//        var idTaskGroup = $("#idTaskGroup").val();
//        
        if(contentTask === ''){
            $("#errorTaskGroup").css('display','block');
        }else{
            $.post('../todolist/controller/CreateTaskController.php',{contentTask:contentTask,idTaskGroup:idTaskGroup},function (data) {
            console.log(data);
            location.reload();
            })
        }
        
       
        
		
}


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <!-- Bootstrap CSS -->
    <link href="../Ressource/Bootstrap/css/bootstrap.css" rel="stylesheet" />
    <link href="../View/CSS/index.css" type="text/css" rel="stylesheet" />
    <link href="../View/CSS/ToDoList.css" type="text/css" rel="stylesheet" />
    <title>ToDoList</title>
  </head>
  <body>
  <?PHP
    if(isset($list)){
        echo " 
        <div id=\"list\" class=\"container \">
            <h1 class=\"p-5\">{$list->getName()}</h1>"
        ;
        if(isset($tasks)){

            echo"<div id=\"afaire\" class=\"container-fluid mb-5\"><ul>";

            echo "<form class=\"mb-5\" id=\"checkForm\" action=\"?action=updateTask&id={$list->getId()}\" method=\"POST\">";
            foreach($tasks as $task){
                echo "<li class=\"mb-3\">";
                if($task->getIsMade() == TRUE){
                    echo "<del>{$task->getContent()}</del> <input name=\"{$task->getId()}\" type=\"hidden\" value=\" \"/>"
                    . "<input name=\"{$task->getId()}\" type=\"checkbox\" class=\"ml-3\" checked>";
                } else {
                    echo "{$task->getContent()} <input name=\"{$task->getId()}\" type=\"hidden\" value=\" \"/>"
                        . "<input name=\"{$task->getId()}\" type=\"checkbox\" class=\"ml-3\">";
                }
                echo "<a href=\"?action=delTask&id={$list->getId()}&idTask={$task->getId()}\" class=\"btn btn-outline-danger ml-3\">Supprimer</a></li>";
            }
            echo "</form></ul></div>";
        }
    }
    echo "<form class=\"mb-2\" action=\"?action=addInList&id={$list->getId()}\" method=\"POST\"> "
    . "<div class=\"d-inline-flex p-2\"> <input class=\"form-control\" name=\"taskfield\" type=\"text\" placeHolder=\"Nom de la tâche\" required> "
    . "</div> <button type=\"submit\" class=\"btn btn-outline-primary\">Ajouter tâche</button></form>";
    
    echo "<button form=\"checkForm\" type=\"submit\" class=\"btn btn-outline-success mb-5\">Valider les checkbox</button>";
  ?>
  </body>
  <script src="JS/app.js"></script>
</html>

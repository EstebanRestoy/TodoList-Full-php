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
    <title>ToDoList</title>
  </head>
  <body>
  <nav class="navbar navbar-white bg-white">
    <a>ToDoList</a>
    <div class="mr">
        <?PHP
        if(isset($user)){
            echo"<a  class=\"log\" href=?action=logoutRequest>Logout</a>";
        }else{
            echo"<a class=\"log\" href=?action=loginView>Login</a>";
        }
        ?>
    </div>
  </nav>
  <a href="?action=addListView" class="btn btn-outline-light m-5 btn-lg">Ajouter</a>
  <center class="mt-5"> 
    <h1>
        Listes Publiques :
    </h1>
  </center>
  
      <?php
      echo "<div class=\"row mt-5 p-5\">";
      
      if (isset($tabPublicList)){ 
        foreach($tabPublicList as $list){
       
            echo "  <div class=\"col-sm-6 col-lg-4 mt-5\">
            <div class=\"card\" style=\"width: 18rem;\">
            <div class=\"card-body\">
              <h5 class=\"card-title\">{$list->getName()}</h5>
              <a href=\"?action=viewList&id={$list->getId()}\" class=\"btn btn-primary\">Voir</a>
              <a href=\"?action=deleteList&id={$list->getId()}\" class=\"btn btn-danger\">Supprimer</a>
            </div>
          </div>
          </div>";
        }
      }else{
          echo "<p>Pas de liste public</p>";
      }
      echo "</div><center class\"mt-5\"> 
      <h1 class=\"mt-5\">
          Listes Privées :
      </h1>
    </center><div class=\"row mt-5 p-5 mt-5\">";
          if(isset($tabPrivateList)){
                 foreach($tabPrivateList as $list){
                  echo "  <div class=\"col-sm-6 col-lg-4\">
                  <div class=\"card\" style=\"width: 18rem;\">
                  <div class=\"card-body\">
                    <h5 class=\"card-title\">{$list->getName()}</h5>
                    <a href=\"?action=viewList&id={$list->getId()}\" class=\"btn btn-primary\">Voir</a>
                    <a href=\"?action=deleteList&id={$list->getId()}\" class=\"btn btn-danger\">Supprimer</a>
                  </div>
                </div>
                </div>";
          }
          echo "</div>";
        }
      else{
          echo "<p>Pas de liste privées</p>";
      }
      ?>
        </div>
  </body>
</html>

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
    <div class="container">
      <center>
        <h1 class="mt-5 p-5">Ajouter une liste :</h1>
      </center>
      <form action="?action=addList" method="POST">
        <div class="form-group p-5">
        <div class="input-group  p-5">
          <div class="input-group-prepend ">
          <label class="input-group-text " for="inputGroupSelect01">Visibilité</label>
        </div>
      <select name="visible" class="custom-select" id="inputGroupSelect01">
        <?php
        if(isset($user)){
          echo "<option value=\"privée\">Privée</option>";
        
        }
          echo " <option selected value=\"public\">Public</option>";
        ?>  
      </select>
    </div>
    <div class="form-group p-5">
      <input type="text" class="form-control " id="title" name="title" aria-describedby="emailHelp" placeholder="Enter title" required>
    </div>
    </div>
      </div>
      <center>
      <button type="submit" class="btn btn-success p-2">Valider</button>
      <center>
      </form>
  </body>
</html>

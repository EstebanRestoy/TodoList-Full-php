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
    <link href="../../Ressource/Bootstrap/css/bootstrap.css" rel="stylesheet" />
    <link href="../CSS/index.css" type="text/css" rel="stylesheet" />
    <title>ToDoList</title>
  </head>
  <body>
      <?php
      if (isset($tabList)){
        foreach($tablist as $item){
            echo "<a href=$item->url><li>$item->getName</li></a>";
        }
      }else{
          echo "<p>Liste pas trouvée</p>";
      }
      echo "<a href=\"?action=login\">Login</a>"
      ?>
  </body>
</html>

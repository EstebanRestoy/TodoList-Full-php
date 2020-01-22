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
     
    <div class=" p-5" id="login">
         <?PHP
      if(isset($fail))
          echo "<p> $fail </p>";
      ?>
      <div class="todo mb-5"><h1>TODOLIST</h1></div>
      <form action="?action=loginRequest" method="POST">
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input
            type="email"
            class="form-control"
            id="exampleInputEmail1"
            aria-describedby="emailHelp"
            placeholder="Enter email"
            name="email"
            required
          />
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input
            type="password"
            class="form-control"
            id="exampleInputPassword1"
            placeholder="Password"
            name="pass"
            required
          />
         
        </div>
        <center class="mt-5">

                <button type="submit"  class="center btn  btn-outline-primary btn-lg">
                Valider
                </button>
     
        </center>
        <p>   
          <a href="?action=registerView" class="ml-0 register">Pas encore inscrit ?</a>
        </p>
      </form>
    </div>
  </body>
</html>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Popper :: edit</title>
  </head>
  <body>
    <?php 
    include '../include/header.php'; 
    include '../include/crud.php'; 
    ?>
       
    <p>You are looking at add/update employee page.</p>

    <?php
    global $employee; 
    $method = $_SERVER['REQUEST_METHOD'];
    if ($method == "GET")
    {      
      if (validate_load() ) 
      {        
        $employee = load() ;        
      }
      include '../include/form.php';
    }
    elseif ($method == "POST") 
    {
      if(validate_save())
      {
        save();
      }
      else
      {
        echo "<b>Last name is required</b>" ;
        include '../include/form.php';
      }
    } 
    elseif ($method == "DELETE") 
    {
      if(validate_delete())
      {
        delete();
      }
    } 
    ?>    
    
    <p>
    Check out the below links <br/>
    <a href="search.php">search employees</a>|  
    </p>
    <?php include '../include/footer.php'; ?>
  </body>
</html>

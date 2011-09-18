<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Popper :: search</title>
  </head>
  <body>
    <?php
    include '../include/header.php';
    include '../include/crud.php';
    ?>

    <p>You are looking at employees page.</p>

    <table border="1">
      <?php
      $employees = load_all();
      foreach ($employees as $employee) {
        echo "<tr>\n";
        foreach ($employee as $col_value) {
          echo "<td>$col_value</td>";
        }
        echo "<td> <sub><a href=\"edit.php?employee_id=" . $employee['id'] . "\">edit</a></sub> </td>";
        echo "</tr>\n";
      }
      ?>
    </table>

    <p>
      Check out the below links <br/>
      <a href="edit.php">add employee</a>
    </p>
    <?php include '../include/footer.php'; ?>
  </body>
</html>

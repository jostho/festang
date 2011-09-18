<form name="employee" action="edit.php" method="post">
  <table border="1">
    <tr>
      <td>Employee id </td> 
      <td> <input name="id" readonly="readonly" value="<?php echo $employee['id']; ?>"></td>
      <td> <i>auto-generated</i> </td> 
    </tr>
    <tr>
      <td>First name </td> 
      <td> <input name="first_name" value="<?php echo $employee['first_name']; ?>"/></td>
      <td> </td> 
    </tr> 
    <tr>
      <td>Last name </td> 
      <td> <input name="last_name" value="<?php echo $employee['last_name']; ?>" /></td>
      <td> </td>  
    </tr>
    <tr>
      <td>Email </td> 
      <td> <input name="email" value="<?php echo $employee['email']; ?>" /></td>
      <td> <i>user@domain.com</i> </td>  
    </tr>  
    <tr>
      <td>Designation </td> 
      <td> <input name="designation" value="<?php echo $employee['designation']; ?>" /></td>
      <td> </td>  
    </tr>  
    <tr>
      <td>Date of joining  </td> 
      <td> <input name="date_of_joining" value="<?php echo $employee['date_of_joining']; ?>" /></td>
      <td> <i>yyyy-mm-dd</i> </td>   
    </tr>  
    <tr>
      <td> </td> 
      <td> <input type="submit" name="save" value="Save" /></td>
      <td> </td>           
    </tr>  
  </table>
</form>

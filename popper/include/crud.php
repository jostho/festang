<?php

// Returns true if good to save 
function validate_save() {
  if (strlen(trim($_POST['last_name'])) == 0) {
    return FALSE;
  }
  return TRUE;
}

// Returns true if good to load
function validate_load() {
  if ((int) $_GET['employee_id'] > 0) {
    return TRUE;
  }
  return FALSE;
}

// Returns true if good to delete
function validate_delete() {
  if ((int) $_REQUEST['employee_id'] > 0) {
    return TRUE;
  }
  return FALSE;
}

// read in the ini file
function get_ini_array() {
  return parse_ini_file("../config/popper.ini");
}

// connect & select the db
function connect_to_db() 
{
  $ini_array = get_ini_array();
  // Connecting, selecting database
  $link = mysql_connect($ini_array['db_server'], $ini_array['db_user'], $ini_array['db_password'])
          or die('Could not connect: ' . mysql_error());
  mysql_select_db($ini_array['db_name']) or die('Could not select database');
  
}

// saves the user record
function save() {
  echo "Trying to save .. ";
  connect_to_db();
  $emp_id = $_POST['id'];

  if ($emp_id > 0) {
    // update 
    $sql = "UPDATE employees SET first_name = '$_POST[first_name]', 
    last_name = '$_POST[last_name]', email = '$_POST[email]', 
    designation = '$_POST[designation]', date_of_joining = '$_POST[date_of_joining]' 
    WHERE id = " . $emp_id;
  } else {
    // insert 
    $sql = "INSERT INTO employees (first_name, last_name, email, designation, 
      date_of_joining)  VALUES  ('$_POST[first_name]', '$_POST[last_name]', 
      '$_POST[email]', '$_POST[designation]', '$_POST[date_of_joining]')";
  }

  //echo "sql is " . $sql;
  $result = mysql_query($sql) or die('Sql failed: ' . mysql_error());

  if ($emp_id == NULL) {
    $emp_id = mysql_insert_id(); // get the generated pk id
  }

  if(mysql_affected_rows() == 1) {
    echo " record " . $emp_id . " saved successfully";
  }

}

// loads the user record
function load() {
  $emp_id = $_GET['employee_id'];
  echo "Trying to load " . $emp_id . " ..";
  connect_to_db();
  
  $query = "SELECT id, first_name, last_name, email, designation, 
        date_of_joining FROM employees WHERE id = " . $emp_id;
  $result = mysql_query($query) or die('Query failed: ' . mysql_error());

  $line = mysql_fetch_array($result, MYSQL_ASSOC);
  if ($line) {
    $employee = $line;
  } else {
    echo " <b>record not found</b>";
  }

  // Free resultset
  mysql_free_result($result);
  
  return $employee;
}

// loads all the user records
function load_all() {
  connect_to_db();
  
  // Performing SQL query
  $query = 'SELECT id, first_name, last_name, email, designation, date_of_joining FROM employees';
  $result = mysql_query($query) or die('Query failed: ' . mysql_error());

  // Printing results in HTML
  while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
    $employees[] = $line ; 
  }

  // Free resultset
  mysql_free_result($result);
  
  return $employees;
}

// saves the user record
function delete() {
  $emp_id = $_REQUEST['employee_id'];
  echo "Trying to delete " . $emp_id . " ..";
  
  connect_to_db();
  
  $sql = "DELETE FROM employees WHERE id = " . $emp_id;

  //echo "sql is " . $sql;
  $result = mysql_query($sql) or die('Sql failed: ' . mysql_error());

  if (mysql_affected_rows() == 1) {
    echo " record " . $emp_id . " deleted successfully";
  }

}

?>
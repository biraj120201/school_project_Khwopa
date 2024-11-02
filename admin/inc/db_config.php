<?php

$hname = 'localhost';
$uname = 'root';
$pass = '';
$db = 'hrswebsite';

$con = mysqli_connect($hname, $uname, $pass, $db);

if (!$con) {
  die("Cannot connect to database: " . mysqli_connect_error());
}

function filtration($data)
{
  foreach ($data as $key => $value) {
    $value = trim($value);
    $value = stripslashes($value);
    $value = strip_tags($value);
    $value = htmlspecialchars($value);
    $data[$key] = $value;
  }
  return $data;
}

function selectAll($table) {
  $con = $GLOBALS['con'];

  $res = mysqli_query($con, "SELECT * FROM $table");

  return $res;
}


function select($sql, $values, $datatypes)
{
  $con = $GLOBALS['con'];
  if ($stmt = mysqli_prepare($con, $sql)) {
    mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
    if (mysqli_stmt_execute($stmt)) {
      $res = mysqli_stmt_get_result($stmt);
      return $res;
    } else {
      mysqli_stmt_close($stmt);
      die("query cannot be executed -select");
    }
  } else {
    die("query cannot be prepared -select");
  }
}
// update query

function update($sql, $values, $datatypes)
{
  $con = $GLOBALS['con'];
  if ($stmt = mysqli_prepare($con, $sql)) {
    mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
    if (mysqli_stmt_execute($stmt)) {
      $res = mysqli_stmt_affected_rows($stmt);
      return $res;
    } else {
      mysqli_stmt_close($stmt);
      die("query cannot be executed -update");
    }
  } else {
    die("query cannot be prepared -update");
  }
}


function insert($sql, $values, $datatypes)
{
    $con = $GLOBALS['con'];

    // Prepare the statement
    if ($stmt = mysqli_prepare($con, $sql)) {
        // Bind parameters
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            $res = mysqli_stmt_affected_rows($stmt);
            mysqli_stmt_close($stmt); // Close the statement
            return $res; // Return number of affected rows
        } else {
            // Execution failed
            mysqli_stmt_close($stmt);
            throw new Exception("Query cannot be executed - insert: " . mysqli_error($con));
        }
    } else {
        // Preparation failed
        throw new Exception("Query cannot be prepared - insert: " . mysqli_error($con));
    }
}

function delete($sql, $values, $datatypes)
{
  $con = $GLOBALS['con'];
  if ($stmt = mysqli_prepare($con, $sql)) {
    mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
    if (mysqli_stmt_execute($stmt)) {
      $res = mysqli_stmt_affected_rows($stmt);
      return $res;
    } else {
      mysqli_stmt_close($stmt);
      die("query cannot be executed -delete");
    }
  } else {
    die("query cannot be prepared -delete");
  }
}
?>
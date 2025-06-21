<?php

$conn= new mysqli('localhost', 'root', '', 'transport_system');

if($conn->connect_error)
{
  echo"no connection".$conn->connect_error;
}

?>
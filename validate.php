<?php

require('SQL_Connect.inc');

if(isset($_POST['user_name']))
{
 $name=$_POST['user_name'];

 $sql=" SELECT user_name FROM liotip_users WHERE user_name='$name' ";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

  echo "Username Already Exists";
 }
 else
 {
  echo "OK";
 }
 exit();
}

if(isset($_POST['user_email']))
{
 $email=$_POST['user_email'];

 $sql=" SELECT user_email FROM liotip_users WHERE user_email='$email' ";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

  echo "Email Already Exists";
 }
 else
 {
  echo "OK";
 }
 exit();
}
?>
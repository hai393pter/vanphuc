<?php  
  @session_start();
  if(isset($_SESSION["status"])) unset($_SESSION["status"]);
  else $_SESSION["status"]="ok";
  //echo $_SESSION["status"];
?>
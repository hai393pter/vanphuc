<?php
  @session_start();
  if(isset($_SESSION["quantri"]))
  {
    $quantri=$_SESSION["quantri"];
  }else{?>
    <script language="javascript">window.location='../login.php';</script>
<?php    
  }
?>
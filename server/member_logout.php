<?php
  session_start();
  session_destroy();
  // echo "DESTROYED";
  //echo "logged out";
  header("Location: http://localhost:8888/caies/#login");
 ?>

<?php
session_start();
?>
<?php
  require 'db.php';

  $db = DbConnection::getInstance()->dbh;

  $emailOrUsername = $_POST['emailOrUsername'];
  $jsonResponse = [];

  $user = $db->query("SELECT * FROM Member WHERE `Email` = '" . strtolower($emailOrUsername) . "'");
  if($user->rowCount() == 0){
    $user = $db->query("SELECT * FROM Member WHERE `Username` = '" . strtolower($emailOrUsername) . "'");
    if($user->rowCount() == 0){
      $jsonResponse["success"] = false;
    }
  }

  $dbpassword;
  // if jsonResponse's success value isn't false, jsonResponse is still empty at this point, so the username/email exists.
  // if(count($jsonResponse) == 0){
  //   $dbpassword = $user->fetch()['password'];
  // }

  if(count($jsonResponse) > 0){
    //header("Content-Type: application/json");
    echo json_encode($jsonResponse);
  }else{
    $user = $user->fetch();
    $dbpassword = $user['password'];
    $options = [
        'cost' => 12
    ];
    if(password_verify($_POST["password"], $dbpassword)){
      $_SESSION['user'] = $user['id'];
      $_SESSION['username'] = $user['username'];
      $_SESSION['firstName'] = $user['firstName'];
      $_SESSION['lastName'] = $user['lastName'];
      $_SESSION['email'] = $user['email'];

      $jsonResponse["success"] = true;
      $jsonResponse["url"] = "http://localhost:8888/caies/";
    }else{
      $jsonResponse["success"] = false;
    }
    //header("Content-Type: application/json");
    echo json_encode($jsonResponse);
  }
?>

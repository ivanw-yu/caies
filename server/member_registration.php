<?php
  session_start();
?>

<?php
require 'db.php';

$dbc = DbConnection::getInstance();
$db = $dbc->dbh;

$fn = $_POST["firstName"];
$ln = $_POST["lastName"];
$un = $_POST["username"];
$email = $_POST["email"];


$jsonResponse = [];

$usernameCheck = $db->query("SELECT * FROM Member WHERE `Username` = '" . strtolower($un) . "'");
if($usernameCheck->rowCount() > 0){
  $jsonResponse["usernameExists"] = "Sorry, the username you have chosen already exists, please use a different username.";
}

// echo "here" . $un;
$emailCheck = $db->query("SELECT * FROM Member WHERE `Email` = '" . strtolower($email) . "'");
if($emailCheck->rowCount() > 0){
  $jsonResponse["emailExists"] = "Sorry, that email is already taken. Please use a different email.";
}

if(count($jsonResponse) > 0){

  $jsonResponse["success"] = false;

  //echo $jsonResponse;
  echo json_encode($jsonResponse);
}else{

  $options = [
      'cost' => 12
  ];
  $password = password_hash($_POST["password"], PASSWORD_BCRYPT, $options);
  $sql = "INSERT INTO member ( firstName, lastName, username, email, password, isAdmin) VALUES(:firstName,:lastName,:username,:email,:password,:isAdmin)";
  $statement = $db->prepare($sql);

  $pdoExec = $statement->execute( [":firstName" => ucfirst($fn), ":lastName" => ucfirst($ln), ":username" => strtolower($un), ":email" => strtolower($email), ":password" => $password,":isAdmin" => false]);

  if($pdoExec){
    $user = $db->query("SELECT * FROM Member WHERE `Email` = '" .$email . "'")->fetch();

    $_SESSION['user'] =  $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['firstName'] = $user['firstName'];
    $_SESSION['lastName'] = $user['lastName'];
    $_SESSION['email'] = $user['email'];

    $jsonResponse["success"] = true;
    $jsonResponse["url"] = "http://localhost:8888/caies/";
    echo json_encode($jsonResponse);

  }else{
    $jsonResponse["success"] = false;
    $jsonResponse["errorMessage"] = "Error has occurred, please try again later.";
    // header('Content-Type: application/json');
    echo json_encode($jsonResponse);
  }
}

 ?>

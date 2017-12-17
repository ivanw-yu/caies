<?php
session_start();
?>
<?php
  require 'db.php';

  $db = DbConnection::getInstance()->dbh;

  $email = $_POST['email'];
  // echo $email;

  $user = $db->query("SELECT * FROM Member WHERE `Email` = '" .$email . "'")->fetch();

  $dbpassword = $user['password'];
  $dbId = $user['id'];

  // foreach ($user as $row) {
  //       $dbpassword = $row['password'];
  //       $dbId = $row['id'];
  //       break;
  //       // print $row['username'] . "\t";
  //       // print $row['password'] . "\t";
  // }
  // echo $dbpassword;

  // echo $user->fetch()['password'] . "a\n";
  // echo password_hash($_POST["password"], PASSWORD_BCRYPT, $options);

  $options = [
      'cost' => 12
  ];
  // $hash = password_hash($_POST["password"], PASSWORD_BCRYPT, $options);
  if(password_verify($_POST["password"], $dbpassword)){
    // session_start();
    $_SESSION['user'] = $dbId;
    $_SESSION['username'] = $user['username'];
    $_SESSION['firstName'] = $user['firstName'];
    $_SESSION['lastName'] = $user['lastName'];
    $_SESSION['email'] = $user['email'];
    // print "evenasdadd";
    // print $dbpassword . " === " . password_hash($_POST["password"], PASSWORD_BCRYPT, $options);
    header("Location: http://localhost:8888/caies");
  }else{
    // print "NOT MATCH";
  }
?>

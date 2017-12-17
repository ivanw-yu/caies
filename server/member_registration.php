<?php
  session_start();
?>

<?php
require 'db.php';
// echo "Asd";
$dbc = DbConnection::getInstance();
$db = $dbc->dbh;
// var_dump($db);
//
//var_dump($dbc);
//
// $result = $db->query("SHOW TABLES");
//
// while ($row = $result->fetch(PDO::FETCH_NUM)) {
//   echo $row[0]."<br>";
// }

// $conn= new mysqli("localhost", "root", "root", "caies");
// $conn = new PDO("mysql:host=localhost;dbname=caies", "root", "root");
// $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// try {
//     $conn = new PDO("mysql:host=localhost;dbname=caies", "root", "root");
//     //echo "SUCCESSFUL";
//     $result = $conn->query("SHOW TABLES");
//
//     while ($row = $result->fetch(PDO::FETCH_NUM)) {
//       echo $row[0]."<br>";
//     }
//     foreach($conn->query('SELECT * from Member') as $row) {
//         print_r($row);
//         echo "a\n";
//     }
//     // $dbh = null;
// } catch (PDOException $e) {
//     print "Error!: " . $e->getMessage() . "<br/>";
//     die();
// }
//
//
// if($conn->connect_error){
//   die("Connect failed: " . $conn->connect_error);
// }else{
// }
//
//
// // echo $db;



$fn = $_POST["firstName"];
$ln = $_POST["lastName"];
$un = $_POST["username"];
$email = $_POST["email"];

$options = [
    'cost' => 12
];
$password = password_hash($_POST["password"], PASSWORD_BCRYPT, $options);

//echo $fn . " " . $ln . " " . $un . " " . $email . " " . $password . " ";

// $sql = "INSERT INTO `Member` (firstName, lastName, username, email, password) VALUES('$fn','$ln','$un','$email','$password')";
$sql = "INSERT INTO member ( firstName, lastName, username, email, password, isAdmin) VALUES(:firstName,:lastName,:username,:email,:password,:isAdmin)";
// var_dump($db);
//$inserted = $db->query($sql);
// if($inserted){
//   echo "INSERTED";
// }else{
//   echo "NOT INSERTED";
// }
// $stmt = $conn->prepare("INSERT INTO Member (:firstName, :lastName, username, email, password, isAdmin) VALUES(?,?,?,?,?,?));
// $stmt->bindParam('ss', $fn, $ln, $un, $email, $password, true);
//
// /* Execute the statement */
// $stmt->execute();
//
// $db->exec($sql);
// $db->close();

// $statement = $db->prepare("INSERT INTO testtable(name, lastname, age)
//     VALUES(:fname, :sname, :age)");
$statement = $db->prepare($sql);
//
// // $statement->execute(array(
// //     "firstName" => $fn,
// //     "lastName" => $ln,
// //     "username" => $un,
// //     "email" => $email,
// //     "password" => $password,
// //     "isAdmin" => true,
// // ));
//
$pdoExec = $statement->execute( [":firstName" => $fn, ":lastName" => $ln, ":username" => $un, ":email" => strtolower($email), ":password" => $password,":isAdmin" => true]);
// $pdoExec = $statement->execute( [":id" => 1,":firstName" => "z", ":lastName" => "z", ":username" => "z", ":email" => "z", ":password" => "z",":isAdmin" => true]);
//
//
if($pdoExec){
  //echo "inserted";
  $user = $db->query("SELECT * FROM Member WHERE `Email` = '" .$email . "'")->fetch();

  //echo $user['id']. $user['username'] . $user['firstName'] . $user['lastName'] . $user['email'];
  // $dbpassword = $user['password'];
  // $dbId = $user['id'];
  $_SESSION['user'] =  $user['id'];
  $_SESSION['username'] = $user['username'];
  $_SESSION['firstName'] = $user['firstName'];
  $_SESSION['lastName'] = $user['lastName'];
  $_SESSION['email'] = $user['email'];

  //header("Location: http://localhost:8888/caies/#");
  echo "http://localhost:8888/caies/";
  //echo $_SESSION['user'] . " " . $_SESSION['username'] . " " . $_SESSION['user'] . " " $_SESSION['firstName'] . " " . $_SESSION['lastName'] . " " . $_SESSION['email'];
}else{
  //echo "not inserted";
  //header("Location: http://localhost:8888/caies/#register");
  echo "http://localhost:8888/caies/#register";
}
// header("Location: localhost:8888/caies");
//
// exit;
// $db->query("INSERT INTO Member (firstName, lastName, username, email, password, isAdmin)
//           VALUES('". $fn ."','" . $ln ."','" . $un . "','" . $email . "','" . $password . ", true)");
//
// if ($conn->exec($sql) === TRUE) {
//   echo "New record created successfully";
// } else {
//   echo "Error: " . $sql . "<br>" . $con->error;
// }


// echo "bbbb";
// $con->close();


// echo "<script> window.location.href = 'http://localhost:8888/caies' </script>";
//
// $db->close();
//


// $result = $db->query("SELECT * from Member");
// while($row = $result->fetch_assoc()){
//   echo $row['firstName'];
// }

 ?>

<?php 
  //get the values from the form stored in the variables

  require_once('dbconnect.php');

  $username = $email = $password = '';
  $username = $_POST['username'];
  $email = $_POST['email'];
  $pass = $_POST['pass'];
  $password = $pass;
  if(!isset($email) && !isset($password) && !isset($username)){
    header("Location: signin.php");
    }

  //check if the values are not empty

  if (!empty($username) || !empty($email) || !empty($password)) {
    
    	//data validation and verification

  		$username = testData($username);
  		$email = testData($email);
  		$password = testData($password);

        
      
        $SELECT = "select email from users where email = ? Limit 1";
        $INSERT = "INSERT INTO users (username, email, password) values (?, ?, ?)"; 

        //prepare statement
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s",$email);//note s is for string, i is for integer, d is for double, b is for BLOB
        $stmt->execute();
        $stmt->bind_result($email);
        $stmt->store_result();
        $rnum = $stmt->num_rows;

        if ($rnum==0) {
          $stmt->close();

          $stmt = $conn->prepare($INSERT);
          $stmt->bind_param("sss",$username, $email, $password);
          $stmt->execute();
             header("location:signin.php");
        }else {
          echo "Email already in use!!";
        }
        $stmt->close();
        $conn->close();

        echo date("d/m/Y");

  }else{
    echo "All fields are required!!";
    die();
  }


  function testData($data){
	$data = stripcslashes($data);
	$data = trim($data);
	$data = htmlspecialchars($data);

	return $data;
}

?>
<?php 
  //get the values from the form stored in the variables

  require_once('dbconnect.php');

  session_start();
  $username = $_SESSION['username'];
  $message = '';
  $message = $_POST['message'];



  //check if the values are not empty

  if (!empty($message)) {
    
    	//data validation and verification

  		$message = testData($message);        
    
        $INSERT = "INSERT INTO messages (message,username) VALUES ('$message', '$username')"; 

        $result = mysqli_query($conn, $INSERT);
        if($result){
            header("Location: index.php");
        }else{
            echo "Error : ". $INSERT;
        }


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
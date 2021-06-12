<?php 
  //get the values ppassed from the login.php form


  require_once('dbconnect.php');

  $email = $password = '';
   $email = $_POST['email'];
   $password = $_POST['pass'];

   if(!isset($email) && !isset($password)){
    header("Location: signin.php");
    }
  //to prevent mysql injection

  //check if the values are not empty

  if (!empty($email) || !empty($password)) {

     $email = testData($email);
     $password = testData($password);
      
        $query = "SELECT * FROM users WHERE email='$email' AND password ='$password'";
        $result = mysqli_query($conn,$query);

        if(mysqli_num_rows($result) > 0){

          while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $user_email = $row['email'];
            $user_password = $row['password'];
            session_start();
            $_SESSION["password"] = $user_password;
            $_SESSION["email"] = $user_email;
            $_SESSION['username'] = $row['username'];
            $_SESSION["id"] = $id;
          }

          if($password == $user_password){
            header("location:index.php");
        }
        else
        {
         echo "Incorrect Password!";
        }

           
        }
        else
        {
          echo "Please check your email!!";
        }

  }else{
    echo "All fields are required!!";
    die();
  }
  $conn-> close();


 function testData($data){
    $data = stripcslashes($data);
    $data = trim($data);
    $data = htmlspecialchars($data);
    
    return $data;
}

?>
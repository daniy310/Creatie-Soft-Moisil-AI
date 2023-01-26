<?php
session_start();
include "includes/db-conn.php";

if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['phone']) && isset($_POST['city']) && isset($_POST['zipcode'])){
      function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
      }

      $email = validate($_POST['email']);
      $pass = validate($_POST['password']);
      $firstname = validate($_POST['firstname']);
      $lastname = validate($_POST['lastname']);
      $phone = validate($_POST['phone']);
      $CNP = validate($_POST['CNP']);
      $city = validate($_POST['city']);
      $zipcode = validate($_POST['zipcode']);

      //$user_data = 'email='. $email. '$firstname='. $firstname;
      //echo $user_data;

      if(empty($email)){
            header("Location: signup.php?error=Email is required!");
            exit();
      }else if(empty($pass)){
            header("Location: signup.php?error=Password is required!");
            exit();
      }else if(empty($firstname)){
            header("Location: signup.php?error=Firts name is required!");
            exit();
      }else if(empty($lastname)){
            header("Location: signup.php?error=Last name is required!");
            exit();
      }else if(empty($phone)){
            header("Location: signup.php?error=Phone number is required!");
            exit();
      }else if(empty($CNP)){
            header("Location: signup.php?error=CNP is required!");
            exit();
      }else if(empty($city)){
            header("Location: signup.php?error=City is required!");
            exit();
      }else if(empty($zipcode)){
            header("Location: signup.php?error=Zip code is required!");
            exit();
      }
      else{
            $pass = md5($pass);
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0){
                  header("Location: signup.php?error=This email has been used!");
                  exit();
            }else {
                  $sql2 = "INSERT INTO users(email, password, firstname, lastname, phone, CNP, city, zipcode) VALUES('$email', '$pass', '$firstname', '$lastname', '$phone', '$CNP', '$city', '$zipcode')";
                  $result2 = mysqli_query($conn, $sql2);
                  if($result2){
                        header("Location: signin.php?success=Your account has been created successfully! Please login!");
                        exit();
                  }else{
                        header("Location: signup.php?error=unknown error occurred");
                        exit();
                  }
            }
      }

}
else{
      header("Location: signup.php");
      exit();
}

?>
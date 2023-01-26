<?php
session_start();
include "includes/db-conn.php";

if(isset($_POST['email']) && isset($_POST['password'])){
      function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
      }

      $email = validate($_POST['email']);
      $pass = validate($_POST['password']);

      if(empty($email)){
            header("Location: signin.php?error=Email is required!");
            exit();
      }else if(empty($pass)){
            header("Location: signin.php?error=Password is required!");
            exit();
      }else{
            $pass = md5($pass);
            $sql = "SELECT * FROM users WHERE email='$email' AND password='$pass'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) === 1){
                  $row = mysqli_fetch_assoc($result);
                  if($row['email'] === $email && $row['password'] === $pass){
                        $_SESSION['email'] = $row['email'];
                        $_SESSION['password'] = $row['password'];
                        $_SESSION['id'] = $row['id'];
                        $_SESSION['firstname'] = $row['firstname'];
                        $_SESSION['lastname'] = $row['lastname'];
                        $_SESSION['phone'] = $row['phone'];
                        $_SESSION['CNP'] = $row['CNP'];
                        $_SESSION['city'] = $row['city'];
                        $_SESSION['zipcode'] = $row['zipcode'];
                              header("Location: index2.php");
                              exit();
                  }else {
                        header("Location: signin.php?error=Incorect email or password");
                        exit();
                  }
            }else{
                  header("Location: signin.php?error=Incorect email or password");
                  exit();
            }
      }

}
else{
      header("Location: signin.php");
      exit();
}

?>
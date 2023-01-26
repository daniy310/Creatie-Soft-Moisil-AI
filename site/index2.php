<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['email'])) {

?>
      <?php require_once('includes/header.php'); ?>
      <?php include('includes/db-conn.php'); ?>

      <body>
            <?php include('includes/navbarin2.php'); ?>
            <div class="page-header min-vh-75 relative row text-center" style="background-image: url('includes/images/scoala.jpg')">

                  <div class="d-flex justify-content-center align-items-center ">
                        <h1 class="text-center h1-index">Hello <?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname']; ?> !</h1>
                  </div>
            </div>
            <div class="container my-4 py-4">
                  <h2 class="h1title hello"><b><?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname']; ?> !</b></h2><br><br>
                  <div class="container">
                        <div class="row align-items-center justify-content-center">
                              <div class="card col-lg-7 me-auto mb-5 border-0">
                                    <div class="col-lg-7 card rounded border-0 shadow-lg">
                                          <div class="my-3 mx-3">
                                                      <h4>Email</h4>
                                                      <p><?php echo $_SESSION['email'] ?></p>
                                                      <h4>First Name</h4>
                                                      <p><?php echo $_SESSION['firstname'] ?></p>
                                                      <h4>Last name</h4>
                                                      <p><?php echo $_SESSION['lastname'] ?></p>
                                                      <h4>Phone number</h4>
                                                      <p><?php echo $_SESSION['phone'] ?></p>
                                                      <h4>City</h4>
                                                      <p><?php echo $_SESSION['city'] ?></p>
                                          </div>
                                    </div>
                              </div>
                              <div class="col-5">
                                    <div class="card rounded border-0 shadow-lg">
                                          <img class="shadow-lg" src="includes/images/logo.jfif" alt="Photo">
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
      </body>

      <?php require_once('includes/footer.php'); ?>

<?php
} else {
      header("Location: signin.php");
      exit();
}

?>
<?php
session_start();

if (!isset($_SESSION['id']) && !isset($_SESSION['email'])) {

?>

      <?php require_once('includes/header.php'); ?>

      <body>
            <?php include('includes/navbarin.php'); ?>
            <div class="page-header min-vh-75 relative row text-center" style="background-image: url('includes/images/scoala.jpg')">
                  
                  <div class="d-flex justify-content-center align-items-center ">     
                        <h1 class="text-center h1-index">Sign Up</h1>
                  </div>
            </div>
            <div class="container my-4 py-4">
                  <div class="d-flex justify-content-center mb-3">
                        <form class="row g-3 col-lg-6 col-11  shadow-lg signin formHack" action="signup-check.php" method="POST">
                              <?php if (isset($_GET['error'])) { ?>
                                    <div class="px-5">
                                          <div class="alert alert-danger text-center" role="alert">
                                                <?php echo ($_GET['error']); ?>
                                          </div>
                                    </div>
                              <?php } ?>
                              <?php if (isset($_GET['success'])) { ?>
                                    <div class="px-5">
                                          <div class="alert alert-success text-center" role="alert">
                                                <?php echo ($_GET['success']); ?>
                                          </div>
                                    </div>
                              <?php } ?>
                              <div class="mb-3 pt-3 px-5">
                                    <label for="email" class="form-label">Email address</label>
                                    <?php if (isset($_GET['email'])) { ?>
                                          <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" value="<?php if (isset($_POST['email'])) echo $_POST['email'] ?>" required>
                                    <?php } else { ?>
                                          <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" required>
                                    <?php } ?>
                              </div>
                              <div class="mb-3 px-5">
                                    <label for="exampleInputPassword1" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                              </div>
                              <div class="row my-3">
                                    <div class="col px-5">
                                          <input type="text" class="form-control" placeholder="First name" aria-label="First name" name="firstname">
                                    </div>
                                    <div class="col pr-4">
                                          <input type="text" class="form-control" placeholder="Last name" aria-label="Last name" name="lastname">
                                    </div>
                              </div>
                              <div class=" mb-3 px-5">
                                    <input class="form-control mb-3" type="text" placeholder="Phone Number" name="phone">
                              </div>
                              <div class="mb-3 px-5">
                                    <input class="form-control mb-3" type="text" placeholder="CNP" name="CNP" value="">
                              </div>
                              <div class="mb-3 px-5">
                                    <input class="form-control mb-3" type="text" placeholder="City" name="city">
                              </div>
                              <div class="mb-3 px-5">
                                    <input class="form-control mb-3" type="text" placeholder="Zip code" name="zipcode">
                              </div>
                              <div class="form-check mx-4 px-5">
                                    <input class="form-check-input" type="checkbox" id="gridCheck" name="gridCheck" value="gridCheck" required>
                                    <label class="form-check-label" for="gridCheck">
                                          Check me out
                                    </label>
                              </div>
                              <div class="mb-3 px-5">
                                    <button type="submit" class="btn signinbutton">Submit</button>
                              </div>
                        </form>
                  </div>
            </div>
      </body>

      <?php require_once('includes/footer.php'); ?>

<?php
} else {
            header("Location: index2.php");
            exit();

}

?>
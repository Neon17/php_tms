<?php include("../inc/header.php") ?>

<body>

  <?php include("../inc/navbar.php") ?>

  <section>
    <div class="container py-5">
      <a class="btn btn-primary btn-sm mb-4" href="index.php" role="button"> Manage User</a>

      <?php
      if (isset($_POST['save'])) {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if ($name != "" && $phone != "" && $email != "" && $password != "") {
          $query = "INSERT INTO  users (name, phone, email, password) 
          VALUES ('$name', '$phone', '$email','$password')";
          $result = mysqli_query($con, $query);
          if ($result) {
      ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Your Data is Submitted</strong>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          <?php
            header("Refresh:1; url=index.php");
          } else {
          ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>Your Data is not Submitted</strong>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          <?php
           header("Refresh:2; url=create.php");
          }
        } else {
          ?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>All Files are requires</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
      <?php
        }
      }
      ?>
      <form class="row" action="" method="POST" enctype="multipart/form-data">
        <div class=" col-lg-6 mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp">
        </div>
        <div class=" col-lg-6 mb-3">
          <label for="phone" class="form-label">Phone</label>
          <input type="tel" class="form-control" id="phone" name="phone" aria-describedby="emailHelp">
        </div>
        <div class=" col-lg-6 mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
        </div>
        <div class=" col-lg-6 mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" class="form-control" name="password" id="exampleInputPassword1">
        </div>
        <div class="col-12">
          <button type="submit" class="btn btn-primary float-end" name="save">Submit</button>
        </div>
      </form>
    </div>
  </section>

  <?php include("../inc/footer.php") ?>
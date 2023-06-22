<?php include("../inc/header.php") ?>

<body>

  <?php include("../inc/navbar.php") ?>

  <section>
    <div class="container py-5">
      <a class="btn btn-primary btn-sm mb-4" href="index.php" role="button"> Manage User</a>

      <?php
    if(isset($_GET['id'])){
        $id= $_GET['id'];
        $select= "SELECT * FROM users WHERE id=$id";
        $select_result=mysqli_query($con,$select);
        // $data= $select_result->fetch_assoc();
        $data=mysqli_fetch_assoc($select_result);
    }


      if (isset($_POST['save'])) {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];

        if ($name != "" && $phone != "" && $email != "" ) {
          $query = "UPDATE users SET name='$name', phone='$phone', email='$email' WHERE id=$id";
          $result = mysqli_query($con, $query);
          if ($result) {
      ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Your Data is Updated</strong>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          <?php
            header("Refresh:1; url=index.php");
          } else {
          ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>Your Data is not Updated</strong>
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
          <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" value="<?php echo $data['name']; ?>">
        </div>
        <div class=" col-lg-6 mb-3">
          <label for="phone" class="form-label">Phone</label>
          <input type="tel" class="form-control" id="phone" name="phone" aria-describedby="emailHelp"  value="<?php echo $data['phone']; ?>">
        </div>
        <div class=" col-lg-6 mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp"  value="<?php echo $data['email']; ?>">
        </div>
        <div class="col-12">
          <button type="submit" class="btn btn-primary float-end" name="save">Submit</button>
        </div>
      </form>
    </div>
  </section>

  <?php include("../inc/footer.php") ?>
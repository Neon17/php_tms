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
      ?>
      <form class="row" action="" method="POST" enctype="multipart/form-data">
        <div class=" col-lg-6 mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" readonly name="name" aria-describedby="emailHelp" value="<?php echo $data['name']; ?>">
        </div>
        <div class=" col-lg-6 mb-3">
          <label for="phone" class="form-label">Phone</label>
          <input type="tel" class="form-control" id="phone" readonly name="phone" aria-describedby="emailHelp"  value="<?php echo $data['phone']; ?>">
        </div>
        <div class=" col-lg-6 mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="email" class="form-control" readonly id="exampleInputEmail1" name="email" aria-describedby="emailHelp"  value="<?php echo $data['email']; ?>">
        </div>
      </form>
    </div>
  </section>

  <?php include("../inc/footer.php") ?>
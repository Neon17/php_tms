<?php include("../inc/header.php") ?>
<body>

<?php include("../inc/navbar.php") ?>

<section>
    <div class="container py-5">
        <a class="btn btn-primary btn-sm mb-4" href="index.php" role="button"> Manage Tasks</a>
       <form class="row">
         <div class=" col-lg-6 mb-3">
           <label for="exampleInputEmail1" class="form-label">Name</label>
           <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
         </div>
         <div class=" col-lg-6 mb-3">
           <label for="exampleInputEmail1" class="form-label">Address</label>
           <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
         </div>
         <div class=" col-lg-6 mb-3">
           <label for="exampleInputEmail1" class="form-label">Phone</label>
           <input type="tel" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
         </div>
         <div class=" col-lg-6 mb-3">
           <label for="exampleInputEmail1" class="form-label">Email address</label>
           <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
         </div>
         <div class=" col-lg-6 mb-3">
           <label for="exampleInputPassword1" class="form-label">Password</label>
           <input type="password" class="form-control" id="exampleInputPassword1">
         </div>
        <div class="col-12">
        <button type="submit" class="btn btn-primary float-end">Submit</button>
        </div>
       </form>
    </div>
</section>
    
<?php include("../inc/footer.php") ?>
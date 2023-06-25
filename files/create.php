<?php include "../process/config.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <!-- https://cdnjs.com/libraries/twitter-bootstrap/5.0.0-beta1 -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/css/bootstrap.min.css" />

    <!-- Icons: https://getbootstrap.com/docs/5.0/extend/icons/ -->
    <!-- https://cdnjs.com/libraries/font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />

    <title>Hello, world!</title>
</head>


<body>

    <?php include("../inc/navbar.php") ?>

    <div class="container">
        <section>
            <div class="card mx-auto my-5" style="width:18rem;">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">
                        <?php 
                            $c = 0;
                            $d = 0;
                            if (isset($_POST["submit"])){
                                $name = $_POST['name'];
                                $image_name = $_FILES['image']['name'];
                                // name is images' name but image is name of input type
                                $image_size = $_FILES['image']['size'];
                                if (!(($name=="")&&($image_name==""))){
                                    $image = explode(".",$image_name);
                                    $new_name = strtolower(str_replace(" ","",$name)."-".time().".".$image[1]);
                                    $extension = strtolower($image[1]);
                                    if (($extension=="png")||($extension=="jpg")||($extension=="jpeg")){
                                        if ($image_size<2097152){
                                            if (move_uploaded_file($_FILES['image']['tmp_name'],"../uploads/$new_name")){
                                                echo ("Success in managing files!!");
                                                $query = "INSERT INTO files (file_name, file_link) VALUES ('$name','$new_name')";
                                                if ($result = mysqli_query($con,$query)){
                                                    echo "<br>Injected in Database!";
                                                }
                                            }
                                            else {
                                                echo "File Upload Field!";
                                            }
                                        }
                                        else {
                                            echo "File size exceed 2 MB";
                                        }
                                    }
                                    else {
                                        $d = 1;
                                        echo "Extension does not match!";
                                    }
                                }
                                else {
                                    $c = 1;
                                }
                            }
                        ?>
                    <form action="#" method="POST" enctype="multipart/form-data">
                        <?php 
                            if ($c==1){
                        ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            All fields are required!!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php } ?>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Name: </label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="name"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Image: </label>
                            <input type="file" class="form-control" name="image" id="exampleInputPassword1">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                    </p>

                </div>
            </div>
        </section>
    </div>




    <?php include("../inc/footer.php") ?>
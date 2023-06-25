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

<?php 
    if(isset($_GET['id'])){
        $id= $_GET['id'];
        $select= "SELECT * FROM files WHERE id=$id";
        $select_result=mysqli_query($con,$select);
        // $data= $select_result->fetch_assoc();
        $data=mysqli_fetch_assoc($select_result);
        if (isset($_POST["submit"])){
            $name = $_POST['name'];
            $image_name = $_FILES['image']['name'];
            // name is images' name but image is name of input type
            $image_size = $_FILES['image']['size'];
            if (!($image_name=="")){
                $image = explode(".",$image_name);
                $new_name = strtolower(str_replace(" ","",$name)."-".time().".".$image[1]);
                $extension = strtolower($image[1]);
                if (($extension=="png")||($extension=="jpg")||($extension=="jpeg")){
                    if ($image_size<2097152){
                        if (move_uploaded_file($_FILES['image']['tmp_name'],"../uploads/$new_name")){
                            echo ("Success in managing files!!");
                            
                            unlink("../uploads/".$data['file_link']);
                            $query = "UPDATE files set file_name='$name',file_link='$new_name' WHERE id = '$id'";
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
                $update_query = "UPDATE files set file_name='$name' WHERE id = '$id'";
                if ($result = mysqli_query($con,$update_query)){
                    echo "<br>Updated in Database!";
                }
            }
        }
    }
?>

<body>
    <div class="container">
        <form action="#" method="POST" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name: </label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="<?php echo $data['file_name']; ?>" aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Image</label>
            <input type="file" name="image" class="form-control" id="exampleInputPassword1">
            <img src="<?php echo "../uploads/".$data['file_link'] ?>" width = "50" height = "50" class="img-fluid" alt="...">
          </div>
          <button type="submit" class="btn btn-primary" name="submit" >Submit</button>
        </form>
    </div>
</body>
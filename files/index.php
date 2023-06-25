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

    <section>
        <div class="container py-5">
            <a class="btn btn-primary btn-sm mb-4" href="create.php" role="button"> Add User</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col"> Image Name</th>
                        <th scope="col"> Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $query = "SELECT *FROM files";
                    $result = mysqli_query($con, $query);
                    $i=1;
                    while ($data = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $i++; ?></th>
                            <td><?php echo $data['file_name']; ?></td>
                            <td>
                                <img src="<?php echo "../uploads/".$data['file_link'] ?>" width = "50" height = "50" class="img-fluid" alt="...">
                            </td>
                            <td>
                                <a class="btn btn-primary btn-sm " href="edit.php?id=<?php echo $data['id'] ?>" role="button">Edit </a>
                                <a class="btn btn-info btn-sm " href="view.php?id=<?php echo $data['id'] ?>" role="button">view </a>
                                <a class="btn btn-danger btn-sm " href="delete.php?id=<?php echo $data['id'] ?>" onclick="return confirm('Are you sure to delete data??')" role="button">delete </a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </section>

    <?php include("../inc/footer.php") ?>
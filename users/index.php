<?php include("../inc/header.php") ?>

<body>

    <?php include("../inc/navbar.php") ?>

    <section>
        <div class="container py-5">
            <a class="btn btn-primary btn-sm mb-4" href="create.php" role="button"> Add User</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $query = "SELECT *FROM users";
                    $result = mysqli_query($con, $query);
                    $i=1;
                    while ($data = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $i++; ?></th>
                            <td><?php echo $data['name']; ?></td>
                            <td><?php echo $data['phone']; ?></td>
                            <td><?php echo $data['email']; ?></td>
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
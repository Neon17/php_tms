<?php include("../inc/header.php") ?>

<body>

    <?php include("../inc/navbar.php") ?>

    <section>
        <div class="container py-5">
            <a class="btn btn-primary btn-sm mb-4" href="create.php" role="button"> Add User</a>
            <?php 

                if (isset($_GET['page'])){
                    $page = $_GET['page'];
                }
                else {
                    $page = 1;
                }
                $total_data_in_page = 10;
                $offset = ($page - 1)* $total_data_in_page;
                $sn = $offset+1;
                $count_query = "SELECT * FROM users";
                $count_result = mysqli_query($con, $count_query);

                $total_data = mysqli_num_rows($count_result);
                $total_pages = ceil($total_data/$total_data_in_page)

            ?>
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
                    $query = "SELECT *FROM users LIMIT $offset, $total_data_in_page";
                    $result = mysqli_query($con, $query);
                    while ($data = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $sn++; ?></th>
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
            <nav aria-label="Page navigation example">
              <ul class="pagination pagination-sm">
                <li class="page-item">
                  <a class="page-link" href="?page = <?php $page--; echo $page; ?>" aria-label="Previous">
                    <span aria-hidden="true">Previous</span>
                  </a>
                </li>
                <?php
                    for ($i=1;$i<=$total_pages;$i++){
                ?>
                <li class="page-item"><a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                <?php } ?>


                <li class="page-item">
                  <a class="page-link" href="?page = <?php $page++; echo $page; ?>" aria-label="Next">
                    <span aria-hidden="true">Next</span>
                  </a>
                </li>
              </ul>
            </nav>
        </div>
    </section>

    <?php include("../inc/footer.php") ?>
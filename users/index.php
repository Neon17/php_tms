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
                    <th scope="col">Address</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Rama</td>
                    <td>Pokhara</td>
                    <td>45345639453</td>
                    <td>examole@gmail.com</td>
                    <td>
                        <a class="btn btn-primary btn-sm " href="#" role="button">Edit </a>
                        <a class="btn btn-info btn-sm " href="#" role="button">view </a>
                        <a class="btn btn-danger btn-sm " href="#" role="button">delete </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</section>
    
<?php include("../inc/footer.php") ?>
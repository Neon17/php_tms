<?php
require("../process/config.php");

if(isset($_GET['id'])){
    $id= $_GET['id'];
    $select= "SELECT * FROM files WHERE id=$id";
    $select_result=mysqli_query($con,$select);
    // $data= $select_result->fetch_assoc();
    $data=mysqli_fetch_assoc($select_result);
    unlink("../uploads/".$data['file_link']);
    $delete_query = "DELETE FROM files WHERE id = '$id'";
    $result = mysqli_query($con,$delete_query);


    header("Refresh:0; url=index.php");
}

?>
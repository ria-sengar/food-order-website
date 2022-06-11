<?php
include('../config/constants.php');
//get the id of admin to be deleted
$id = $_GET['id'];
//create sql query to delete admin
$sql = "DELETE FROM tbl_admin WHERE id=$id";
//Execute the query
$res = mysqli_query($conn, $sql);
//check whether query executed or not
if($res == true)
{
     //query executed successfully and admin deleted
     //echo "admin deleted";
     //Create a Session Variable to Display Message
     $_SESSION['delete'] = "Admin deleted Successfully";
     //Redirect Page to Manage Admin
     header('location:'.SITEURL.'admin/manage-admin.php');
 }
 else
 {
     //FAiled to delete admin
     //echo "Failed to delete admin";
     //Create a Session Variable to Display Message
     $_SESSION['delete'] = "Failed to delete Admin";
     header('location:'.SITEURL.'admin/add-admin.php');
 }

?>
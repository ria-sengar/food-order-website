<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>
        <br><br>

    <?php

//get the id of admin to be deleted
$id = $_GET['id'];
//create sql query to delete admin
$sql = "SELECT * FROM tbl_admin WHERE id=$id";
//Execute the query
$res = mysqli_query($conn, $sql);
//check whether query executed or not
if($res == true)
{
    $count = mysqli_num_rows($res);
    if($count==1){
        //echo "Admin Available";
        $row= mysqli_fetch_assoc($res);
        $full_name = $row['full_name'];
        $username = $row['username'];
    }
 }
 else
 {
     header('location:'.SITEURL.'admin/add-admin.php');
 }

?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td><input type="text" name="full_name" placeholder="Enter Your Name" value="<?php echo $full_name; ?>"></td>
                </tr>
                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username" placeholder=" Your Username" value="<?php echo $username; ?>"></td>
                </tr>
               
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php 
if(isset($_POST['submit']))
{
    $id = $_POST['id'];
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];

    $sql = "UPDATE tbl_admin SET
    full_name = '$full_name',
    username = '$username'
    WHERE id = '$id'
    ";
    $res = mysqli_query($conn,$sql);
    if($res == true)
{
     //query executed successfully and admin deleted
     //echo "admin deleted";
     //Create a Session Variable to Display Message
     $_SESSION['update'] = "Admin Updated Successfully";
     //Redirect Page to Manage Admin
     header('location:'.SITEURL.'admin/manage-admin.php');
 }
 else
 {
     //FAiled to delete admin
     //echo "Failed to delete admin";
     //Create a Session Variable to Display Message
     $_SESSION['update'] = "Failed to delete Admin";
     header('location:'.SITEURL.'admin/manage-admin.php');
 }
 
}



?>
<?php include('partials/footer.php') ?>
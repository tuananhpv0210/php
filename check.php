<?php
include('header.php');
if (isset($_GET['email']) ) {
        # code...
    $email = $_GET['email'];
    $hash = $_GET['hash'];

    $check = mysqli_query($conn,"SELECT * FROM users ");
    $checkEmail = mysqli_fetch_assoc($check);

    $sql = mysqli_query($conn,"SELECT * FROM passwords_resets");
    $checkHash = mysqli_fetch_assoc($sql);

    if ($hash == $checkHash["codeReset"] && $email == $checkEmail["email"]) {
            # code... 
        if (isset($_POST['submit'])) {
            $newPass = $_POST['newPass'];
            $nhapLaiPass = $_POST['nhapLaiPass'];

            if ($newPass == $nhapLaiPass) {
                    # code...
                $newPass = password_hash($_POST['newPass'], PASSWORD_DEFAULT);

                $query = "UPDATE users SET password = '$newPass' WHERE email = '$email'";
                $sql = mysqli_query($conn, $query);
                if ( $sql ) {
                    header('location: login.php');
                } else {
                    echo "thất bại";
                }
            } else{
                echo "noooo";
            }

        } 
    } else {
        echo 'ohhh';
    }

}


?>
<style type="text/css">
    .login{
        background: #B0C4DE ;
        margin-top: 100px; 
    }
</style>
<div class="col-md-5 container login" style="padding-top: 50px; padding-bottom: 30px;">
    <div class="panel panel-info">
        <!-- <div class="panel-heading">
            <h3 class="panel-title" style="text-align: center; color: #fff;"></h3>
        </div> -->
        <div class="panel-body">
            <form action="" method="POST" role="form">

                <div class="form-group">
                    <label for="">New Password</label>
                    <input type="password" class="form-control" id="" placeholder="" name="newPass">
                </div>
                <div class="form-group">
                    <label for="">Enter New Password</label>
                    <input type="password" class="form-control" id="" placeholder="Enter password" name="nhapLaiPass">

                </div>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </form>
        </div>
    </div>
</div>

<?php include('footer.php') ?>

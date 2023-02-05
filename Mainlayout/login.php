<?php
include 'header.php';

?>
<?php
include '../include/connection.php';

?>
<main>

    <div class="slider-area ">
        <div class="single-slider slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Login</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="login_part section_padding ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_text text-center">
                        <div class="login_part_text_iner">
                            <h2>New to our Shop?</h2>
                            <p>There are advances being made in science and technology
                                everyday, and a good example of this is the</p>
                            <a href="signup.php" class="btn_3">Create an Account</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_form">
                        <div class="login_part_form_iner">
                            <h3>Welcome Back ! <br>
                                Please Sign in now</h3>
                            <form class="row contact_form" action="login.php" method="post" novalidate="novalidate">
                                <div class="col-md-12 form-group p_star">
                                    <input type="email" class="form-control" id="name" name="email" value="" placeholder="Username">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control" id="password" name="password" value="" placeholder="Password">
                                </div>
                                <div class="col-md-12 form-group">
                                    <div class="creat_account d-flex align-items-center">
                                        <input type="checkbox" id="f-option" name="selector">
                                        <label for="f-option">Remember me</label>
                                    </div>
                                    <button type="submit" value="submit" class="btn_3" name="btn">
                                        log in
                                    </button>
                                    <a class="lost_pass" href="#">forget password?</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>
<?php
include 'footer.php';

?>



<?php if (isset($_POST['btn'])) {
    $Email = $_POST['email'];
    $Password = $_POST['password'];
    $emailSearch = "select * from user where Email = '$Email'";
    $query = mysqli_query($con, $emailSearch);
    $EmailCount = mysqli_num_rows($query);
    // echo $EmailCount;
    if ($EmailCount) {
        $res = mysqli_fetch_assoc($query);
        $_SESSION['db_Name'] = $res['Username']; // echo $_SESSION['db_Name'];
        $_SESSION['db_UserEmail'] = $res['Email'];
        $_SESSION['db_UserID'] = $res['User'];
        $_SESSION['db_Role'] = $res['Role'];
        $db_Pass = $res['Password'];
        $pass_decode = password_verify($Password, $db_Pass);

        
        if ($pass_decode) {
            if($_SESSION['db_Role'] == "A"){
                echo "<script>window.location.href = '../AdminLayout/index.php'</script>";
            }
            else{
                echo "<script>alert('Login Successful');window.location.href = 'index.php'</script>";
            }
           
        } else {
            echo "<script>alert('Password Incorrect');window.location.href = 'login.php'</script>";
        }
    } else {
        echo "<script>alert('Invalid Email');</script>";
    }
} ?>
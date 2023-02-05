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
                            <h2>REGISTER</h2>
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
                            <a href="login.php" class="btn_3">Login Account</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_form">
                        <div class="login_part_form_iner">
                            <h3>Welcome Back ! <br>
                                Please Sign in now</h3>
                            <form class="row contact_form" action="signup.php" method="post" novalidate="novalidate">
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="name" name="name" value="" placeholder="Username">
                                </div>
                               
                                <div class="col-md-12 form-group p_star">
                                    <input type="email" class="form-control" id="email" name="email" value="" placeholder="Email">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control" id="password" name="password" value="" placeholder="Password">
                                </div>
                                <div class="col-md-12 form-group">
                                    <div class="creat_account d-flex align-items-center">
                                        <input type="checkbox" id="f-option" name="selector">
                                        <label for="f-option">Remember me</label>
                                    </div>
                                    <button type="submit" value="submit" class="btn_3" name = "btn">
                                        Register
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



<?php
        if(isset($_POST['btn'])){

        $Name =  $_POST['name'];
        $Email = $_POST['email'];
      
        $Pass = $_POST['password'];
        

        $Password = password_hash($Pass,PASSWORD_BCRYPT);
 

           $Emailquery = "select * from user where Email = '$Email'";

           
           $res = mysqli_query($con,$Emailquery);

           if(mysqli_num_rows($res) > 0){
                echo "<script>alert('Email Already Exist');</script>";

           }
           else{
            // if($Pass === $RepPass){

                $Insquery = "insert into user (Username,Email,Password,Role) values ('$Name','$Email','$Password','V')";
                $rs = mysqli_query($con,$Insquery);

                if($rs){
                    echo "<script>alert('Data Inserted');</script>";

                }
                else{
                    echo "<script>alert('Data Not Inserted');</script>";

                }
           
           }
        }

?>
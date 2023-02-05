<?php
include 'header.php';
include '../include/connection.php';

?>




<?php
    $ID = $_GET['id']; //3
    $query = "select * from products where Productid = $ID"; //3 //img1 //abc

    $GetData = mysqli_query($con,$query);

$res = mysqli_fetch_assoc($GetData);   
?>



<div class="main-panel">
    <div class="main">




        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Product Update</h2>
                        <form action="pcrud.php" method="post" enctype="multipart/form-data" class="register-form"
                            id="register-form">

                            <input type="hidden" name="ProdId" value=<?= @$res['Productid'] ?>>

                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" value=<?= @$res['Pname'] ?> />
                            </div>

                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="price" id="name" value=<?= @$res['Prodprice'] ?> />
                            </div>

                            <div class="form-group">


                                <select class="form-control wrap-input1" id="cat" name="Category"
                                    style="border-bottom: 1px solid grey;">

                                    <option value="" selected disabled>--Select Category--</option>
                                    <!-- Get dropdown data code -->

                                    <?php
                                $query = "select * from category";
                                $rs = mysqli_query($con,$query);
                                if(mysqli_num_rows($rs) > 0){
                                    while($data  = mysqli_fetch_array($rs)){?>
                                    <option value="<?= $data['Categoryid']?>" <?php if ($res['Pcategory'] == $data['Categoryid']) {
                                echo 'selected';
                            } ?>><?= $data['Cname']?></option>
                                    <?php
                            }
                            }else{  ?>
                                    <option>NO records Found</option>
                                    <?php } ?>


                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="desc" id="name" value=<?= @$res['Pdescription'] ?> />
                            </div>

                            <div class="form-group form-button">
                                <input type="submit" name="Upd" id="signup" class="form-submit" value="Update" />
                            </div>

                    </div>
                    <div class="signup-image">

                        <div class="d-flex flex-column align-items-center text-center  user-profile-image">

                            <input class="form-control hidden" type="file" id="Pro_Image" name="uploaded"
                                style="visibility: hidden;" />

                            <?php if(@$res['Pimg'] != null){?>

                            <img class="mt-5" style="width:250px;" src="<?=@$res['Pimg']?>" id="UserImage">

                            <?php }else{
                    echo "<img class='mt-5' style='width:250px;' src='assets/images/No_Image_Available.jpg' id='UserImage'>";
                     }?>

                            <div class="upload-photo text-center ">
                                <br />
                                <button type="button" class="btn btn-success"
                                    onclick="document.getElementById('Pro_Image').click(); return false;">
                                    <i class="fas fa-download"></i> Upload Image
                                </button>
                            </div>
                        </div>
                        </form>

                    </div>
                </div>
        </section>





        <?php
include 'footer.php';

?>
        <script>
        $(document).ready(function() {


            $("#upload-photos").click(function() {
                $("#BrowseImage").trigger('click')
            })

            $("#UserImage").click(function() {
                $("#Pro_Image").trigger('click')
            })


            $("#Pro_Image").change(function() {
                if (this.files && this.files[0]) {
                    var fileReader = new FileReader();
                    fileReader.readAsDataURL(this.files[0]);
                    fileReader.onload = function(x) {

                        $("#UserImage").attr('src', x.target.result);
                    }
                }
            })
        })
        </script>
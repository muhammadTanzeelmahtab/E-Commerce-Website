<?php
include 'header.php';
include '../include/connection.php';
?>
<main>


    <?php

$ID = $_GET['id']; //3
$query = "select * from products where Pcategory = $ID"; //3 //img1 //abc

$GetData = mysqli_query($con,$query);
$rowCount = mysqli_num_rows($GetData);

?>




    <div class="slider-area ">
        <div class="single-slider slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Watch Shop</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    

<div class="popular-items section-padding30">
        <div class="container">


            <?php
if($rowCount > 0){

 ?>
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8 col-md-10">
                    <div class="section-tittle mb-70 text-center">
                        <h2>Popular Items</h2>
                        <p>Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                            aliqua. Quis ipsum suspendisse ultrices gravida.</p>
                    </div>
                </div>
            </div>
            <div class="row">

            <?php while($data = mysqli_fetch_assoc($GetData)){ echo '<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">';?>
                
         
                    <div class="single-popular-items mb-50 text-center">
                        <div class="popular-img">
                            <img src="<?=@$data['Pimg'] ?>" alt="" height="400px">
                            <div class="img-cap">
                                 <a href = "detailproduct.php?id=<?=@$data['Productid'] ?>"><span>Add to cart</span></a>
                            </div>
                            <div class="favorit-items">
                                <span class="flaticon-heart"></span>
                            </div>
                        </div>
                        <div class="popular-caption">
                            <h3><a href="product_details.html"><?=@$data['Pname'] ?></a></h3>
                            <span><?=@$data['Prodprice'] ?></span>
                        </div>
                    </div>
             
                    <?php echo '</div>';}?>
                    
            </div>

            <?php
}
else{
echo "<h5 class='text-danger'>No Record found</h5>";
}



?>
        </div>
    </div>

   
    <div class="shop-method-area">
        <div class="container">
            <div class="method-wrapper">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-method mb-40">
                            <i class="ti-package"></i>
                            <h6>Free Shipping Method</h6>
                            <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-method mb-40">
                            <i class="ti-unlock"></i>
                            <h6>Secure Payment System</h6>
                            <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-method mb-40">
                            <i class="ti-reload"></i>
                            <h6>Secure Payment System</h6>
                            <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

<?php
include 'footer.php';

?>
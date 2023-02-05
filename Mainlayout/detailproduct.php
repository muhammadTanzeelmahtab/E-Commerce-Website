<?php
include 'header.php';
include '../include/connection.php';
?>

<?php


$ID = $_GET['id']; //3
$query = "select * from products where Productid = $ID"; //3 //img1 //abc

$GetData = mysqli_query($con, $query);
$rowCount = mysqli_num_rows($GetData);

$data = mysqli_fetch_assoc($GetData)
    ?>

<?php
if ($rowCount > 0) {

    ?>
    <form action = "addtoCart.php"  method = "post">
        <main>

           <input type="hidden" name = "PId" value = "<?=@$data['Productid'] ?>" >
            <input type="hidden" name = "Pname" value = "<?=@$data['Pname'] ?>" >
            <input type="hidden" name = "Pdesc" value = "<?=@$data['Pdescription'] ?>" >
            <input type="hidden" name = "Pimg" value = "<?= @$data['Pimg'] ?>">
            <input type="hidden" name = "PPrice" value = " <?=@$data['Prodprice'] ?>">
            <input type="hidden" id = "totals" name = "ptotal" value = " <?=@$data['Prodprice'] ?>">


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


            <div class="product_image_area">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">

                            <div class="single_product_img">
                                <img src="<?=@$data['Pimg'] ?>" alt="#" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="single_product_text text-center">

                                <h3>
                                    <?=@$data['Pname'] ?>
                                </h3>
                                <p>
                                    <?=@$data['Pdescription'] ?>
                                </p>
                                <p  id = "price" onkeyup = "calc()" onclick = "calc()">
                                    <?=@$data['Prodprice'] ?>
                                </p>
                              
                                <div class="card_area">
                                    <div class="product_count_area">
                                        <p>Quantity</p>
                                        <div class="product_count d-inline-block">
                                         
                                            <input class="product_count_item input-number" type="number" value="1" min="0"
                                                max="10" id = "qty" onkeyup = "calc(this)" onclick = "calc(this)" name = "pqty">
                                            
                                        </div>
                                        
                                        <p id = "total" ><?=@$data['Prodprice'] ?></p>
                                    </div>
                                    <div class="add_to_cart">
                                        <button type="submit" class="btn_3" name="ins">ADD TO CARD</button>

                                        <!-- <a href="#" class="btn_3">add to cart</a> -->
                                    </div>
                                    <?php
                                        } else {
                                            echo "<h5 class='text-danger'>No Record found</h5>";
                                        }



                                    ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <section class="subscribe_part section_padding">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="subscribe_part_content">
                                <h2>Get promotions & updates!</h2>
                                <p>Seamlessly empower fully researched growth strategies and interoperable internal or
                                    “organic”
                                    sources
                                    credibly innovate granular internal .</p>
                                <div class="subscribe_form">
                                    <input type="email" placeholder="Enter your mail">
                                    <a href="#" class="btn_1">Subscribe</a>
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

<script>

function calc(){
    var qty = document.getElementById('qty').value;
    var price = document.getElementById('price').innerHTML;
    // console.log(price);
    document.getElementById('total').innerHTML = parseInt(qty) * parseInt(price);
    document.getElementById('totals').value = parseInt(qty) * parseInt(price);

}
</script>
<?php
include 'header.php';
include '../include/connection.php';
?>

<main>

    <div class="slider-area ">
        <div class="single-slider slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Cart List</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="cart_area section_padding">
        <form action = "checkout.php" method = "post">
            <div class="container">
                <div class="cart_inner">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Product</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $total = 0;
                                if(isset($_SESSION['Cart'])) {
                                    foreach ($_SESSION['Cart'] as $Key => $Value) { 
                                        $total = $total + $Value['ptotal'];
                                   
                                ?>
                                <tr>
                                    <td>
                                        <div class="media">
                                            <div class="d-flex">
                                                <img src="<?= $Value['prodImg'] ?>" alt="" />
                                            </div>
                                            <div class="media-body">
                                                <p  id = "price" onkeyup = "calc()" onclick = "calc()"><?= $Value['prodname'] ?></p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <h5 class = "price"><?= $Value['prodPrice'] ?></h5>
                                    </td>
                                    <td>
                                    <input type="number" value="<?= $Value['pqty'] ?>" min = 1 max = 10 class = "qty" onkeyup = "calc(this)" onclick = "calc(this)" >
                                    </td>
                                    <td>
                                        <h5 class = "total"><?= $Value['ptotal'] ?></h5>
                                    </td>
                                </tr>
                                <?php } } else{
                                    echo "<h3 class = 'text-danger'>No Items Addded in Card</h3>";
                                } ?>
                              
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <h5>Subtotal</h5>
                                    </td>
                                    <td>
                                        <h5 id = 'gtTotal'><?= @$total ?></h5>
                                        <input type="hidden" name = "gTotal" value = "<?= @$total ?>" id = "gtTotals">
                                    </td>
                                </tr>
                               
                            </tbody>
                        </table>
                        <div class="checkout_btn_inner float-right">
                            <a class="btn_1" href="#">Continue Shopping</a>
                            <button type="submit" class="btn_1 checkout_btn_1" name = "check">Proceed to checkout</button>
                        </div>
                    </div>
                </div>
        </form>
    </section>

</main>






<?php
    include 'footer.php';

?>

<script>
    var gt = 0;
    var qty = document.getElementsByClassName('qty');
    var price = document.getElementsByClassName('price');
    var iTotal = document.getElementsByClassName('total');
    var gtTotal = document.getElementById('gtTotal');
    var gtTotals = document.getElementById('gtTotals');


function calc(){

    gt = 0;
    for(i = 0;i<price.length;i++){
        iTotal[i].innerHTML =  parseInt(qty[i].value) * parseInt(price[i].innerHTML);
        gt += (parseInt(qty[i].value) * parseInt(price[i].innerHTML));
    }
    gtTotal.innerHTML = gt;
    gtTotals.value = gt;
}

</script>
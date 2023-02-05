<?php
include 'header.php';
include '../include/connection.php';
?>

<?php

if (!isset($_SESSION['db_Role'])) {
    echo "<script>alert('Please first login');window.location.href = 'login.php';</script>";
}
?>

<main>

    <div class="slider-area ">
        <div class="single-slider slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Checkout</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="checkout_area section_padding">
        <div class="container">
            <div class="billing_details">
                <div class="row">
                    <div class="col-lg-8">
                        <h1>Billing Details</h1>
                        <hr>
                        <form class="row contact_form" action="checkout.php" method="post" novalidate="novalidate">
                            <div class="col-md-12 form-group p_star">
                                <input type="text" value="<?= $_SESSION['db_UserEmail'] ?>" readonly
                                    class="form-control" id="email" name="email" />
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="first" name="fname"
                                    placeholder="First Name" />
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="last" name="lname"
                                    placeholder="Last Name" />
                            </div>

                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="number" name="number"
                                    placeholder="Phone Number" />
                            </div>

                            <div class="col-md-12 form-group p_star">
                                <select class="form-control" name="country">
                                    <option>--Select--</option>
                                    <option value="1">Pakistan</option>
                                    <option value="2">Us</option>
                                    <option value="4">Sydney</option>
                                    <option value="4">China</option>
                                    <option value="4">India</option>

                                </select>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="add1" name="address"
                                    placeholder="Address" />
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="add2" name="appartment"
                                    placeholder="Appartment, suit, etc.(Optional)" />
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="city" name="city" placeholder="City" />
                            </div>

                            <div class="col-md-6 form-group">
                                <input type="text" class="form-control" id="zip" name="zip"
                                    placeholder="Postcode/ZIP" />
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="creat_account">
                                    <input type="checkbox" id="f-option2" name="selector" />
                                    <label for="f-option2">Save this information for next time</label>
                                </div>
                            </div>


                    </div>
                    <div class="col-lg-4">
                        <div class="order_box">
                            <h2>Your Order</h2>
                            <ul class="list">
                                <li>
                                    <a href="#">Product
                                        <span>Total</span>
                                    </a>
                                </li>
                                <?php 
                                if(isset($_SESSION['Cart'])) {
                                    foreach ($_SESSION['Cart'] as $Key => $Value) { 
                                     
                                   
                                ?>

                                <li>
                                    <a href="#"><?= $Value['prodname'] ?>
                                        <span class="middle">x 0<?= $Value['pqty'] ?></span>
                                        <span class="last"><?= $Value['ptotal'] ?></span>
                                    </a>
                                </li>
                                <?php } } else{
                                    echo "<h3 class = 'text-danger'>No Items Addded in Card</h3>";
                                } ?>


                            </ul>
                            <ul class="list list_2">
                                <?php if (isset($_POST['check'])) {

                $subTotal = $_POST['gTotal'];}?>
                                <li>
                                    <a href="#">Subtotal
                                        <span id="sbTotal"><?= @$subTotal ?></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">Shipping
                                        <span id="ShTotal">200</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">Total
                                        <span id="sTotal"></span>
                                    </a>
                                    <input type="hidden" name="totals" id="sTotals">
                                </li>
                            </ul>
                            <div class="payment_item">
                                <div class="radion_btn">
                                    <input type="radio" id="f-option5" name="selector" />
                                    <label for="f-option5">Cash on delivery</label>
                                    <div class="check"></div>
                                </div>
                            </div>
                            <div class="creat_account">
                                <input type="checkbox" id="f-option4" name="selector" />
                                <label for="f-option4">I’ve read and accept the </label>
                                <a href="#">terms & conditions*</a>
                            </div>
                            <button class="btn btn_3 ml-5" type="submit" name="POrder">Proceed to Order</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

</main>



<?php include 'footer.php'; ?>

<script>
var sbTotal = document.getElementById('sbTotal').innerHTML;
var shTotal = document.getElementById('ShTotal').innerHTML;
document.getElementById('sTotal').innerHTML = parseInt(sbTotal) + parseInt(shTotal);
document.getElementById('sTotals').value = parseInt(sbTotal) + parseInt(shTotal);
</script>


<?php
if (isset($_POST['POrder'])) {
    
    $Bill = $_POST['totals'];
    $Email = $_POST['email'];
    $Fname = $_POST['fname'];
    $Lname = $_POST['lname'];
    $Number = $_POST['number'];
    $Country = $_POST['country'];
    $Address = $_POST['address'];
    $Appartment = $_POST['appartment'];
    $City = $_POST['city'];
    $Zip = $_POST['zip'];

    $UserId = $_SESSION['db_UserID'];
    $Date = date("Y/m/d");

   

    $query = "insert into invoice (userid,bill,date) values ('$UserId','$Bill','$Date')";

   
    mysqli_query($con,  $query);



$UserIDD = $_SESSION['db_UserID'];
$InvId = "select * from invoice WHERE userID  = $UserIDD";

$GetData = mysqli_query($con,  $InvId);
$res = mysqli_fetch_assoc($GetData);



    foreach ($_SESSION['Cart'] as $Key => $Value) { 

        $ProdID = $Value['prodid'];
        $ProdPrice = $Value['prodPrice'];
        $ProdQuantity = $Value['pqty'];
        $ProdTotal = $Value['ptotal'];
        $InvoicesID = $res['invoiceid'];
   
    $query = "insert into orders (Productid,price,quantity,total,invoiid) values ('$ProdID','$ProdPrice','$ProdQuantity','$ProdTotal','$InvoicesID')";

   
    mysqli_query($con,  $query);




    }
    
    $InvID = $res['invoiceid'];

    $querys = "insert into billingdetail (FirstName,LastName,PhoneNum,Country,Address,Appartment,City,PostalCode,InvId) values 
    ('$Fname','$Lname','$Number','$Country','$Address','$Appartment','$City','$Zip','$InvID')";

   
    mysqli_query($con,  $querys);

    if ($res) {
        echo "<script>alert('Order Completed Successfully');</script>";
    }
  


    session_destroy();
    echo "<script>window.location.href = 'index.php';</script>";
    

  
}
?>
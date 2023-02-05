<?php
include 'header.php';

?>

<?php
include '../include/connection.php';
?>


<?php

$querys = 'select * from invoice inner join billingdetail on invoice.invoiceid = billingdetail.billingId ';


$res = mysqli_query($con, $querys) or die ("Incorrect Query!!");

// $data = mysqli_fetch_assoc($res);

$rowCount = mysqli_num_rows($res);

// echo "<pre>";
//     print_r($data);
// echo "</pre>";
?>


<?php
if($rowCount > 0){
 ?>
<div class="main">


    <table class=" container align-item-center justify-content-center text-center m-3 table table-stripped table-bordered" >

        <tr>
            <th>First Name</th>
            <th>last Name</th>
            <th>Phone Number</th>
            <th>Country</th>
            <th>Address</th>
            <th>City</th>
            <th>Postal Code</th>
            <th>Bill</th>
        
        </tr>

        <?php while($data = mysqli_fetch_assoc($res)){ echo '<tr>';?>


                
                    
                        <td><?=@$data['FirstName'] ?></td>
                        <td><?=@$data['LastName'] ?></td>
                        <td><?=@$data['PhoneNum'] ?></td>
                        <td><?=@$data['Country'] ?></td>
                        <td><?=@$data['Address'] ?></td>
                        <td><?=@$data['City'] ?></td>
                        <td><?=@$data['PostalCode'] ?></td>
                        <td><?=@$data['bill'] ?></td>
                        
                        </td>
                

        <?php echo '</tr>';}?>
                
    </table>
    </div>
 <?php
}
else{
        echo "<h5 class='text-danger'>No Record found</h5>";
}



// error_reporting(0);
// $DelID = $_GET['Delid'];

// $quer = "delete from products where Productid = $DelID";

// $res = mysqli_query($con, $quer);

// if ($res) {
//     echo "<script>alert('Data Deleted!!');window.location.href = 'viewproduct.php';</script>";

// } 
mysqli_close($con);
 ?>
    
</div>

<?php
include 'footer.php';

?>
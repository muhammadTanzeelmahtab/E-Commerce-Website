<?php
include 'header.php';

?>

<?php
include '../include/connection.php';
?>


<?php

$querys = 'select * from products inner join category on products.Pcategory = category.Categoryid';


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


    <table class=" container align-item-center justify-content-center text-center m-5 table table-stripped table-bordered" >

        <tr>
            <th>Product Name</th>
            <th>Product Price</th>
            <th>Product Description</th>
            <th>Category Name</th>
            <th>Product Image</th>
            <th colspan = 2></th>
        </tr>

        <?php while($data = mysqli_fetch_assoc($res)){ echo '<tr>';?>


                
                    
                        <td><?=@$data['Pname'] ?></td>
                        <td><?=@$data['Prodprice'] ?></td>
                        <td><?=@$data['Pdescription'] ?></td>
                        <td><?=@$data['Cname'] ?></td>
                        <td> <img src= "<?=@$data['Pimg'] ?>"  alt="databaseImg" style = "width:100px;"> </td>
                        <td><a href="productEdit.php?id=<?=@$data['Productid']?>" class = "btn btn-primary">Edit</a>
                        <a href="viewproduct.php?Delid=<?=@$data['Productid']?>" class = "btn btn-danger" onclick = "return confirm('Are you sure you want to delete');return false;">Delete</a>
                        </td>
                

        <?php echo '</tr>';}?>
                
    </table>
    </div>
 <?php
}
else{
        echo "<h5 class='text-danger'>No Record found</h5>";
}



error_reporting(0);
$DelID = $_GET['Delid'];

$quer = "delete from products where Productid = $DelID";

$res = mysqli_query($con, $quer);

if ($res) {
    echo "<script>alert('Data Deleted!!');window.location.href = 'viewproduct.php';</script>";

} 
mysqli_close($con);
 ?>
    
</div>

<?php
include 'footer.php';

?>
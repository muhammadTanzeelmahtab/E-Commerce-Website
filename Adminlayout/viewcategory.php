<?php
include 'header.php';

?>

<?php
include '../include/connection.php';
?>


<?php

$querys = 'select * from category';


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
            <th>Category Name</th>
            <th>Category Images</th>
            <th colspan = 2></th>
        </tr>

        <?php while($data = mysqli_fetch_assoc($res)){ echo '<tr>';?>


                
                    
                        <td><?=@$data['Cname'] ?></td>
                        <td> <img src= "<?=@$data['Cimg'] ?>"  alt="databaseImg" style = "width:100px;"> </td>
                        <td><a href="categoryEdit.php?id=<?=@$data['Categoryid']?>" class = "btn btn-primary">Edit</a>
                        </td>
                

        <?php echo '</tr>';}?>
                
    </table>
    </div>
 <?php
}
else{
        echo "<h5 class='text-danger'>No Record found</h5>";
}


mysqli_close($con);
 ?>
    
</div>

<?php
include 'footer.php';

?>
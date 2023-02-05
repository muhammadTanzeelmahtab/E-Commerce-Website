<?php include 'header.php'; ?>
<?php include '../include/connection.php'; ?>


<!-- Add Cart Code -->


<?php if (isset($_POST['ins'])) {

    $prodID = $_POST['PId'];
    $prodName = $_POST['Pname'];
    $prodImg = $_POST['Pimg'];
    $PPrice = $_POST['PPrice'];
    $ProdDesc = $_POST['Pdesc'];
    $prodQty = $_POST['pqty'];
    $prodTotal = $_POST['ptotal'];
   

    $AddtoCartItems = [
        'prodid' => "$prodID",
        'prodname' => "$prodName",
        'prodImg' => "$prodImg",
        'prodPrice'=> "$PPrice",
        'prodDesc' =>"$ProdDesc ",
        'pqty' => "$prodQty",
        'ptotal' => "$prodTotal",
   
    ];

    if(isset($_SESSION['Cart'])){
        $myItems = array_column($_SESSION['Cart'],'prodname');
        if(in_array($prodName,$myItems)){

            echo "<script>alert('Item Already Added');
            window.location.href = 'index.php';</script>";
        }
        else{
            
            $Count = count($_SESSION['Cart']);
            $_SESSION['Cart'][$Count] = $AddtoCartItems;
            echo "<script>alert('Item Added Successfully');
            window.location.href = 'index.php';</script>";
        }
        

    }
    else{
        $_SESSION['Cart'][0] = $AddtoCartItems;
        echo "<script>alert('Item Added Successfully');
        window.location.href = 'index.php';</script>";
    }
    
} 
?>

<!-- REMOVE CART CODE -->
<!-- <?php
// if(isset($_POST["Remove"])){
//     foreach($_SESSION['Cart'] as $key => $Val){
//         if($Val['prodid'] == $_POST['Item_Id']){
//             unset($_SESSION['Cart'][$key]);
//             $_SESSION['Cart'] = array_values($_SESSION['Cart']);
//             echo "<script>alert('Item Removed');
//             window.location.href = 'CartDetail.php';</script>";   

//         }
//     }
// }
?> -->

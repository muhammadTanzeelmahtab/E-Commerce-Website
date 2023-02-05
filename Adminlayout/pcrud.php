<?php
include '../include/connection.php';

?>

<?php if (isset($_POST['ins'])) {
    $Name = $_POST['name'];
    $Price = $_POST['price'];
    $Desc = $_POST['desc'];
    $Category = $_POST['Category'];
    $FileProp = $_FILES['uploaded']; // echo '<pre>'; // echo '</pre>';
    //     print_r($FileProp);
    $FileName = $_FILES['uploaded']['name']; //img1.jpg
    $FileType = $_FILES['uploaded']['type'];
    $FileTempLoc = $_FILES['uploaded']['tmp_name'];
    $FileSize = $_FILES['uploaded']['size'];
    $folder = '../MainLayout/assets/images/';
    if (
        strtolower($FileType) == 'image/jpeg' ||
        strtolower($FileType) == 'image/jpg' ||
        strtolower($FileType) == 'image/png'
    ) {
        if ($FileSize <= 1000000) {
            //1MB likha hai bytes mai convert kar k
            $folder = $folder . $FileName; //../MainLayout/assts/images/img1.jpg
            $query = "insert into products (Pname,Prodprice,Pdescription,Pimg,Pcategory) values ('$Name','$Price','$Desc','$folder','$Category')";
            $res = mysqli_query($con, $query);
            if ($res) {
                echo "<script>alert('Data Inserted Successfully');window.location.href = 'viewproduct.php';</script>";
                move_uploaded_file($FileTempLoc, $folder);
            } else {
                echo "<script>alert('Data Insertion Failed');window.location.href = 'viewproduct.php';</script>";
            }
        } else {
            echo "<script>alert('Image should be less than 1MB !! ');</script>";
        }
    } else {
        echo "<script>alert('Image Formate not supported!! ');</script>";
    }
} ?>




<!-- Data Updated Code -->


<?php if (isset($_POST['Upd'])) {
    $ProdId = $_POST['ProdId'];
    $Name = $_POST['name'];
    $Price = $_POST['price'];
    $Desc = $_POST['desc'];
    $Category = $_POST['Category'];
    $FileProp = $_FILES['uploaded']; // echo '<pre>'; // echo '</pre>';
    //     print_r($FileProp);
    $FileName = $_FILES['uploaded']['name'];
    $FileType = $_FILES['uploaded']['type'];
    $FileTempLoc = $_FILES['uploaded']['tmp_name'];
    $FileSize = $_FILES['uploaded']['size'];
    $folder = '../MainLayout/assets/images/';
    if (is_uploaded_file($_FILES['uploaded']['tmp_name'])) {
        if (
            strtolower($FileType) == 'image/jpeg' ||
            strtolower($FileType) == 'image/jpg' ||
            strtolower($FileType) == 'image/png'
        ) {
            if ($FileSize <= 1000000) {
                //1MB likha hai bytes mai convert kar k
                $folder = $folder . $FileName;
                $query = "update products set Pname = '$Name',Prodprice = '$Price',Pdescription = '$Desc',Pimg= '$folder',Pcategory= '$Category'
                 where Productid  = '$ProdId'";
                $res = mysqli_query($con, $query);
                if ($res) {
                    echo "<script>alert('Data Updated Successfully');window.location.href = 'viewproduct.php';</script>";
                    move_uploaded_file($FileTempLoc, $folder);
                } else {
                    echo "<script>alert('Data Updation Failed');window.location.href  = 'viewproduct.php';</script>";
                }
            } else {
                echo "<script>alert('Image should be less than 1MB !! ');window.location.href  = 'viewproduct.php';</script>";
            }
        } else {
            echo "<script>alert('Image Formate not supported!!');window.location.href  = 'viewproduct.php';</script>";
        }
    } else {
        $query = "update products set Pname = '$Name',Prodprice = '$Price',Pdescription = '$Desc',Pcategory= '$Category'
                 where Productid  = '$ProdId'";
        echo $query;
        $res = mysqli_query($con, $query);
        if ($res) {
            move_uploaded_file($FileTempLoc, $folder);
            echo "<script>alert('Data Updated Successfully');window.location.href = 'viewproduct.php';</script>";
        } else {
            echo "<script>alert('Data Updation Failed');window.location.href = 'viewproduct.php'</script>";
        }
    }
}


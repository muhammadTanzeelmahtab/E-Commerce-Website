
<?php if (!isset($_SESSION['db_Role'])) { //A or V
    echo "<script>alert('Unauthorize to Access!!');window.location.href = '../MainLayout/index.php'</script>";
} elseif ($_SESSION['db_Role'] != 'A') { //V
    echo "<script>alert('Unauthorize!!');window.location.href = '../MainLayout/index.php'</script>";
} ?>
<?php

include("config.php");

if(isset($_POST['submit'])){
    $category = $_POST['category'];
    $cashier = $_POST['cashier'];
    $product = $_POST['product'];
    $price = $_POST['price'];    

    $sql = "INSERT INTO transaksi (cashier, product, category, price) VALUE ('$cashier', '$product', '$category', '$price')";
    $query = mysqli_query($db, $sql);

    if( $query ) {        
        header('Location: ../index.php');
    } else {
        header('Location: ../index.php');
    }

} else {
    die("Gagal Masuk");
}

?>
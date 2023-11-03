<?php
$conn = new mysqli('localhost', 'root','', 'xenspirits_database');
$product_id=$_POST['product_id'];
$account_id=$_POST['account_id'];
$sql="INSERT INTO wishlists ('id', 'product_id', 'account_id') VALUES (NULL, '$product_id', '$account_id')";
if ($conn->query($sql) === TRUE) {
    dd("data inserted");
}
else 
{
    dd("failed");
}
?>




<?php

include('./connect_db.php');
$status="";
if (isset($_POST['code']) && $_POST['code']!=""){
$code = $_POST['code'];
$result = mysqli_query(
$conn,
"SELECT * FROM `product` WHERE `code`='$code'"
);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$code = $row['code'];
$idproduct = $row['idproduct'];
$price = $row['price'];
$image = $row['image'];
$description = $row['description'];
$stock = $row['stock'];


$cartArray = array(
	$code=>array(
	'name'=>$name,
    'idproduct'=>$idproduct,
    'code'=>$code,
	'price'=>$price,
	'quantity'=>1,
    'image'=>$image,
    'description'=>$description,
    'stock'=>$stock)
);

if(empty($_SESSION["shopping_cart"])) {
    $_SESSION["shopping_cart"] = $cartArray;
    $status = "<div class='box'>Product is added to your cart!</div>";
}else{
    $array_keys = array_keys($_SESSION["shopping_cart"]);
    if(in_array($code,$array_keys)) {
	$status = "<div class='box' style='color:red;'>
	Product is already added to your cart!</div>";
    } else {
    $_SESSION["shopping_cart"] = array_merge(
    $_SESSION["shopping_cart"],
    $cartArray
    );
    $status = "<div class='box'>Product is added to your cart!</div>";
	}

	}
}
?>

<div class="alert alert-light text-center" role="alert">
  U moet ingeloged zijn om te kopen.
</div>
<div class="card-group">

<?php
$result = mysqli_query($conn,"SELECT * FROM `product`");
while($row = mysqli_fetch_assoc($result)){

    echo "
    <form method='post' action=''>


    <div class='card  h-100' style='width: 21rem; margin-right: 1rem; margin-top: 1rem; margin-left: 1rem; '>
    <input type='hidden' name='code' value=".$row['code']." />
    <img src='".$row['image']."'class='card-img-top' height='300' width='300' />
    <div class='card-body text-center'>
    <h5 class='card-title '><font size='5'>".$row['name']."</font></h5>
    <p class='card-text ' ><font size='2'>".$row['description']."</font></p>
    </div>
    <div class='card-footer text-center'>
    <p><b ><font size='6'>$".$row['price']."</font></b></p>
    <p class='card-text'><small >Aantal in voorraad: ".$row['stock']."</small></p>
    </div>
    </div>
    </form>";
        }
mysqli_close($conn);

?>
</div>
<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>


</div>

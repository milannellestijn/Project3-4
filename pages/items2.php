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
</form>

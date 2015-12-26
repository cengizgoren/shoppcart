<?php include 'core/init.php';
protect_page();

if (isset($_GET['add'])) {
	$add = sanitize($_GET['add']);
	$query = query("SELECT * FROM products WHERE p_id = $add ");
	confirm($query);
	while($row = fetch_array($query)){
		if($row['pquant'] != $_SESSION['product_' . $_GET['add']]) {
			$_SESSION['product_' . $_GET['add']]+=1;
			redirect("checkout");
		}else{
			set_message("We only have " .$row['pquant']. " " . "available");
			redirect("checkout");
		}
	}
}
if (isset($_GET['remove'])) {
	$_SESSION['product_' . $_GET['remove']]--;
	if ($_SESSION['product_' . $_GET['remove']] < 1) {
		unset($_SESSION['item_total']);
      	unset($_SESSION['item_quantity']);
		redirect("checkout");
	}else{
		redirect("checkout");
	}
}
if (isset($_GET['delete'])) {
  $_SESSION['product_' . $_GET['delete']] = '0';
  unset($_SESSION['item_total']);
  unset($_SESSION['item_quantity']);
  unset($_SESSION['product_'. $_GET['delete']]);
  redirect("checkout");


 }
function cart(){
	$total = 0;
	$item_quantity = 0;
	$item_name = 1;
	$item_number =1;
	$amount = 1;
	$quantity =1;
	foreach ($_SESSION as $name => $value) {
		if ($value > 0) {
		if (substr($name, 0, 8) == "product_") {
			$length = strlen($name - 8);
			$id = sanitize(substr($name, 8,$length));
			$query = query("SELECT * FROM products WHERE p_id = $id");
			confirm($query);
			while($row = fetch_array($query)) {
			$sub	= $row['pprice']*$value;
			$item_quantity +=$value;
			$srt = strtoupper(str_replace("_"," ","{$row['pname']}"));
			$product = <<<DELIMETER
				<tr>
				  <td><div class=row><div class=col-md-3><img width='50' src='{$row['pimage']}'>
				  </div><div class=col-sm-9><a href="{$row['pname']}"><strong>$srt</strong></a><br>
				  </div>
				  </div>
				  </td>
				  <td>&#8377; {$row['pprice']}</td>
				  <td>{$value}</td>
				  <td>&#8377; $sub</td>
				  <td><a class='btn btn-success' href="cart?add={$row['p_id']}"><span class='glyphicon glyphicon-plus'></span></a>   <a class='btn btn-warning' href="cart?remove={$row['p_id']}"><span class='glyphicon glyphicon-minus'></span></a>
				<a class='btn btn-danger' href="cart?delete={$row['p_id']}"><span class='glyphicon glyphicon-remove'></span></a></td>         
				  </tr>
DELIMETER;
			echo $product;	
			$item_name++;
			$item_number++;
			$amount++;
			$quantity++;
		
			}
			$_SESSION['item_total'] = $total += $sub;
			$_SESSION['item_quantity'] = $item_quantity;
   }
}
 }
}
?>
 

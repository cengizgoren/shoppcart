<title>Change Address | Shoppcart</title>
<?php 
include 'core/init.php';
protect_page();
?>
<?php require 'html/php/includes/head.req.php'; ?><!--This is head-->
<?php require 'html/php/includes/header.req.php'; ?><!--This is header-->
<div class="container">
    <div class="row">
        <div class="col-sm-3 col-lg-3 col-md-3">
            <div class="panel panel-warning">
              <div class="panel-body ">
                <div class="acc-header text-center">My Account</div>
                <h4>Orders</h4>
                    <ul class="nav nav-pills  nav-stacked ">
                        <li class="cp_btn acc"><a class="cp_btn"  href="orders">My Orders</a></li>
                    </ul>
                    <img src="images/home/line.png" class="line">
                <h4>My Stuff</h4>
                    <ul class="nav nav-pills  nav-stacked ">
                        <li class="cp_btn acc"><a class="cp_btn"  href="wishlist">My Wishlist</a></li>
                        <li class="cp_btn acc"><a class="cp_btn"  href="checkout">My Cart</a></li>
                    </ul>
                    <img src="images/home/line.png" class="line">   
                <h4>Settings</h4>
                    <ul class="nav nav-pills nav-stacked ">
                        <li class="cp_btn acc "><a class="cp_btn"  href="account">Personal Information</a></li>
                        <li class="cp_btn acc"><a class="cp_btn"  href="changepassword">Change Password</a></li>
                        <li class="cp_btn acc active"><a class="cp_btn"  href="address">Addresses</a></li>
                        <li class="cp_btn acc"><a class="cp_btn"  href="deactivate">Deactivate Account</a></li>
                    </ul>
              </div><!--/panel body-->
            </div><!--/panel-->
        </div><!--/col-md-3-->
        <div class="col-sm-9  col-lg-9 col-md-9">
              <h2 class="text-center">Change Address </h2>
<br>
<div class="col-md-9 col-md-offset-2">    
<form role="form" action=" " method="post" class="form-horizontal">
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label">Current Address</label>
    <div class="col-sm-9">
        <p class="form-control-static"><?php  echo $user_data['address'];?></p>
    </div>
    </div>

    <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label">New Address</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" name="address" placeholder="Type your new address here" required >
    </div>
    </div>
   <div class="col-sm-offset-4 col-sm-6">
        <button type="submit" class="btn btn-primary btn-block ">Save Changes</button>
   </div>
 </form>
</div><br>          
        </div><!--/col-md-9-->
    </div><!--/row-->
</div><!--/container-->
<?php require 'html/php/includes/footer.req.php'; ?><!--This is footer--> 
<?php include "header.php"; ?>
<?php
$postdata = $_POST;
$msg = '';
if (isset($postdata ['key'])) {
	$key				=   $postdata['key'];
	$salt				=   $postdata['salt'];
	$txnid 				= 	$postdata['txnid'];
    $amount      		= 	$postdata['amount'];
	$productInfo  		= 	$postdata['productinfo'];
	$firstname    		= 	$postdata['firstname'];
	$email        		=	$postdata['email'];
	$udf5				=   $postdata['udf5'];
	$mihpayid			=	$postdata['mihpayid'];
	$status				= 	$postdata['status'];
	$resphash				= 	$postdata['hash'];
	//Calculate response hash to verify	
	$keyString 	  		=  	$key.'|'.$txnid.'|'.$amount.'|'.$productInfo.'|'.$firstname.'|'.$email.'|||||'.$udf5.'|||||';
	$keyArray 	  		= 	explode("|",$keyString);
	$reverseKeyArray 	= 	array_reverse($keyArray);
	$reverseKeyString	=	implode("|",$reverseKeyArray);
	$CalcHashString 	= 	strtolower(hash('sha512', $salt.'|'.$status.'|'.$reverseKeyString));
	
	
	if ($status == 'success'  && $resphash == $CalcHashString) {
		$msg = "Transaction Successful and Hash Verified...";
		//Do success order processing here...
	}
	else {
		//tampered or failed
		$msg = "Payment failed for Hasn not verified...";
	} 
}
else exit(0);
?>
</div>
</header>



<!-- about  -->
<div id="about" class="about">
  <div class="container">
    <div class="row">
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
        <div class="about-box">
        <div class="dv">
    <span class="text"><label>Merchant Key:</label></span>
    <span><?php echo $key; ?></span>
    </div>
    
    <div class="dv">
    <span class="text"><label>Merchant Salt:</label></span>
    <span><?php echo $salt; ?></span>
    </div>
    
    <div class="dv">
    <span class="text"><label>Transaction/Order ID:</label></span>
    <span><?php echo $txnid; ?></span>
    </div>
    
    <div class="dv">
    <span class="text"><label>Amount:</label></span>
    <span><?php echo $amount; ?></span>    
    </div>
    
    <div class="dv">
    <span class="text"><label>Product Info:</label></span>
    <span><?php echo $productInfo; ?></span>
    </div>
    
    <div class="dv">
    <span class="text"><label>First Name:</label></span>
    <span><?php echo $firstname; ?></span>
    </div>
    
    <div class="dv">
    <span class="text"><label>Email ID:</label></span>
    <span><?php echo $email; ?></span>
    </div>
    
    <div class="dv">
    <span class="text"><label>Mihpayid:</label></span>
    <span><?php echo $mihpayid; ?></span>
    </div>
    
    <div class="dv">
    <span class="text"><label>Hash:</label></span>
    <span><?php echo $resphash; ?></span>
    </div>
    
    <div class="dv">
    <span class="text"><label>Transaction Status:</label></span>
    <span><?php echo $status; ?></span>
    </div>
    
    <div class="dv">
    <span class="text"><label>Message:</label></span>
    <span><?php echo $msg; ?></span>
    </div>
        </div>
      </div>
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
        <div class="about-box">
          <figure><img src="https://sellers.snapdeal.com/resource/1555937397000/NewUIIMG/Images1/Register_yourself_and_List_your_products.png" alt="#" style="width:400px" /></figure>
        </div>
      </div>
    </div>

  </div>
</div>
<!-- end abouts -->





    <?php include "footer.php"; ?>
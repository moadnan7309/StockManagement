<?php
//session_start();
include "header.php";
$MERCHANT_KEY = "hS2LoZvGkkk";
$SALT = "7tur6fFwWelkjklj";

// Merchant Key and Salt as provided by Payu.

$PAYU_BASE_URL = "https://sandboxsecure.payu.in";		// For Sandbox Mode
//$PAYU_BASE_URL = "https://secure.payu.in";			// For Production Mode

$action = '';

$posted = array();
if(!empty($_POST)) {
    //print_r($_POST);
  foreach($_POST as $key => $value) {    
    $posted[$key] = $value; 
	
  }
}

$formError = 0;

if(empty($posted['txnid'])) {
  // Generate random transaction id
  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
  $txnid = $posted['txnid'];
}
$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if(empty($posted['hash']) && sizeof($posted) > 0) {
  if(
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])
          || empty($posted['phone'])
          || empty($posted['productinfo'])
          || empty($posted['surl'])
          || empty($posted['furl'])
		  || empty($posted['service_provider'])
  ) {
    $formError = 1;
  } else {
    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
	$hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';	
	foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }

    $hash_string .= $SALT;


    $hash = strtolower(hash('sha512', $hash_string));
    $action = $PAYU_BASE_URL . '/_payment';
  }
} 
elseif(!empty($posted['hash'])) 
{
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';
}

//Here we have create a class and according to class Fees will disp and need to pay
$fees = 200;
//include "footer.php";
?>

<html>
<head>
<title>Payumoney Payment Gateway Integration</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../cimage25/109651text.css" rel="stylesheet" type="text/css">
<script>
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
      payuForm.submit();
    }
  </script>
<script language="JavaScript">
<!--
function mmLoadMenus() {
  if (window.mm_menu_0203103334_0) return;
        window.mm_menu_0203103334_0 = new Menu("root",91,19,"Century Gothic",13,"#FFFFFF","#000000","#660000","#FF9900","left","middle",3,0,1000,-5,7,true,true,true,0,true,true);
  mm_menu_0203103334_0.addMenuItem("History","window.open('109651history.html', '_self');");
  mm_menu_0203103334_0.addMenuItem("Objectives","window.open('109651objective.html', '_self');");
   mm_menu_0203103334_0.hideOnMouseOut=true;
   mm_menu_0203103334_0.bgColor='#555555';
   mm_menu_0203103334_0.menuBorder=1;
   mm_menu_0203103334_0.menuLiteBgColor='#FFFFFF';
   mm_menu_0203103334_0.menuBorderBgColor='#FEFFF9';
    window.mm_menu_0203103632_0 = new Menu("root",170,19,"Century Gothic",13,"#FFFFFF","#000000","#660000","#FF9900","left","middle",3,0,1000,-5,7,true,true,true,0,true,true);
  mm_menu_0203103632_0.addMenuItem("Admission","window.open('109651admission.html', '_self');");
  mm_menu_0203103632_0.addMenuItem("School Timing","window.open('109651schooltiming.html', '_self');");
  mm_menu_0203103632_0.addMenuItem("Evaluation Procedure","window.open('109651evaluation.html', '_self');");
  mm_menu_0203103632_0.addMenuItem("Co-Curricular Activities","window.open('109651cocurricular.html', '_self');");
   mm_menu_0203103632_0.hideOnMouseOut=true;
   mm_menu_0203103632_0.bgColor='#555555';
   mm_menu_0203103632_0.menuBorder=1;
   mm_menu_0203103632_0.menuLiteBgColor='#FFFFFF';
   mm_menu_0203103632_0.menuBorderBgColor='#FEFFF9';

mm_menu_0203103632_0.writeMenus();
} // mmLoadMenus()
//-->
</script>
<script language="JavaScript" src="../cimage25/109651mm_menu.js"></script>
<script type="text/javascript" src="../cimage25/109651sliderman.1.3.7.js"></script>
<link rel="stylesheet" type="text/css" href="../cimage25/109651sliderman.css" />
<style type="text/css">
.style1 {
	font-size: 16;
	font-weight: bold;
	color: #009933;
}

</style>
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" onLoad="submitPayuForm()">
<script language="JavaScript1.2">mmLoadMenus();</script>
<table width="100%" height="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#DFFFFF" class="bg">
  <tr>
    <td align="center" valign="middle"><table width="990" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td align="left" valign="top">
		<table width="990" height="60" border="0" cellpadding="0" cellspacing="0" background="../cimage25/109651_01.jpg" style="margin-top:-114px;">
          <tr>
            <td align="center" valign="middle" class="black"><a href="109651.html" target="_self">HOME</a>     |     <a href="#" name="link4" id="link1" onMouseOver="MM_showMenu(window.mm_menu_0203103334_0,-20,25,null,'link4')" onMouseOut="MM_startTimeout();">ABOUT US</a>     |     <a href="#" name="link5" id="link2" onMouseOver="MM_showMenu(window.mm_menu_0203103632_0,-10,25,null,'link5')" onMouseOut="MM_startTimeout();">GENERAL INFORMATION </a>     |     <a href="109651boardtrust.html" target="_self">BOARD OF TRUSTEES</a>     |     <a href="109651rules.html" target="_self">RULES & REGULATION</a>     |     <a href="#"><a href="109651contact.html" target="_self">CONTACT US</a>     |     <a href="109651stenquiry.html" target="_self">STUDENT ENQUIRY</a>     |     <a href="admissionform.php" target="_self">ADMISSION FORM</a>
			</td>
          </tr>
		</table>
		</td>
      </tr>

	<tr>
		<td><h2>PayU Form</h2>
		<?php if($formError) { ?>
		<tr><td><span style="color:red">Please fill all mandatory fields.</span></td></tr>
		<br/>
		<br/>
		<?php } ?>
		<form action="<?php echo $action; ?>" method="post" name="payuForm">
		<input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
		<input type="hidden" name="hash" value="<?php echo $hash ?>"/>
		<input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
		 <table>
        <tr>
          <td><b>Mandatory Parameters</b><br/></td>
        </tr>
        <tr>
          <td>First Name: </td>
          <td><input class="form-group" name="firstname"  id="firstname" 
		  value="" /></td>
        </tr>
		
		<tr>
          <td>Email: </td>
          <td><input class="form-group" name="email"  id="email" value="" /></td>
        </tr>
        
        <tr>
          <td><input type="hidden" name="serial" id="serial"  /></td>
        </tr>
        
        <tr>
          <td>Phone: </td>
          <td><input class="form-group"  name="phone" /></td>
        </tr>
        
		<tr>
          <td>Amount: </td>
          <td><input class="form-group" name="amount" value="2000" /></td><br/>
        </tr>
		
		<input type="hidden" name="serial" value="serial_no"/>
		
        <input type="hidden" name="productinfo" value="admission_form"/>
        
		<input type="hidden" name="surl" value="http://www.phptpoint.com/success.php" size="64" />
        
		<input type="hidden" name="furl" value="http://www.phptpoint.com/failure.php" size="64" />

        <tr>
          <td colspan="3"><input type="hidden" name="service_provider" value="payu_paisa" size="64" /></td>
        </tr>
        <tr>
          <?php if(!$hash)
		   { ?>
            <td colspan="4"><input type="submit" value="Pay Now" class="btn btn-primary" /></td>
          <?php } ?>
        </tr>
      </table>
		</td>
	</tr>
	  
    </table></td>
  </tr>
  
	
  
  <tr>
    <td height="3" align="center" valign="middle" class="dot"></td>
  </tr>
  
</table>
</body>
</html>
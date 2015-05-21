<?php require_once('Connections/pharma_con.php'); ?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['username'])) {
  $loginUsername=$_POST['username'];
  $password=$_POST['password'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "products.html";
  $MM_redirectLoginFailed = "login.html";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_pharma_con, $pharma_con);
  
  $LoginRS__query=sprintf("SELECT username, password FROM webusers WHERE username='%s' AND password='%s'",
    get_magic_quotes_gpc() ? $loginUsername : addslashes($loginUsername), get_magic_quotes_gpc() ? $password : addslashes($password)); 
   
  $LoginRS = mysql_query($LoginRS__query, $pharma_con) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!DOCTYPE HTML>
<head>
<title>PharmaGlobal | Login</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
<link rel="stylesheet" type="text/css" media="screen" href="css/menu/css/simple_menu.css">
<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen">
<!-- Google fonts -->
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Playfair+Display:400italic' rel='stylesheet' type='text/css' />
<!--JS FILES STARTS-->
<script src="js/jquery.min.js"></script>
<script src="js/custom.js"></script>
<script src="js/slides/slides.min.jquery.js"></script>
<script src="js/cycle-slider/cycle.js"></script>
<script src="js/nivo-slider/jquery.nivo.slider.js"></script>
<script src="js/tabify/jquery.tabify.js"></script>
<script src="js/prettyPhoto/jquery.prettyPhoto.js"></script>
<script src="js/twitter/jquery.tweet.js"></script>
<script src="js/scrolltop/scrolltopcontrol.js"></script>
<script src="js/portfolio/filterable.js"></script>
<script src="js/modernizr/modernizr-2.0.3.js"></script>
<script src="js/easing/jquery.easing.1.3.js"></script>
<script src="js/kwicks/jquery.kwicks-1.5.1.pack.js"></script>
<script src="js/swfobject/swfobject.js"></script>
<!-- get fancybox -->
<link rel="stylesheet" type="text/css" itemprop="javascript" href="js/fancybox/jquery.fancybox.css" media="all">
<script src="js/fancybox/jquery.easing.1.3.js"></script>
<script src="js/fancybox/jquery.fancybox-1.2.1.js"></script>
</head>
<body>
<div class="header">
  <div id="site_title"><a href="index.html"><img src="img/logo.jpg" alt="" width="190" 
          height="38"></a></div>
  <!-- Dynamic Menu -->
  <ol id="menu" class="simple_menu simple_menu_css horizontal black_menu">
    <li><a href="index.html">Home</a></li>
    <li><a href="news.html">News</a>
    <li><a href="products.html">Products</a></li>
    <li><a href="about.html">About</a></li>
    <li class="last"><a href="contact.html">Contact</a></li>
  </ol>
  <div class="clr"></div>
  <!-- menu 2 -->
  <ol id="menu2" class="simple_menu simple_menu_css horizontal black_menu">
    <li><a href="login.php">Login</a></li>
    <li><a href="register.php">Register</a></li>
    <li class="last"><a href="Default.aspx">E Prescriptions</a></li>
  </ol>
  <div class="clr"></div>
</div>
<!-- end header -->
<h1 class="logo">Login Account</h1>
<div id="container">
  <div class="content">
   
    <ul id="tabify_menu" class="menu_tab" style="margin: 0;">
      <li class="active"><a href="#fane1">Login</a></li>
    </ul>
    <div id="fane1" class="tab_content">
      <h3 style="text-align:center">Fill in your User accout and Password in the fields below</center></h3>
      <div>
	<form action="<?php echo $loginFormAction; ?>" method="POST" name="login" style="text-align:center">
	User Name:
	  <input name="username" type="text"><br />
	Passwword:<input name="password" type="password"><br />
	&nbsp;&nbsp;<input name="submit" type="submit" value="Login">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input name="reset" type="reset" value="Cancel">
	
	</form>
	<div style="text-align:center">Forgot Password?</div> 
	</div>
 
      
    </div>
</div>
<div style="clear:both"></div>
</div>
<!-- close container -->
<div style="clear:both; height: 40px"></div>
<div id="footer">
  <div style="width:960px; margin: auto; padding-bottom: 30px">
    <div class="one-fourth">
      <h3>Services</h3>
      <ul style="font-family: Georgia, 'Times New Roman'; margin: 0 15px 0 0">
        <li style="border-bottom: 1px dotted #737a84; border-top: 1px dotted #737a84; padding: 3px 20px; letter-spacing: 2px">Pharmaceutical sale</li>
        <li style="border-bottom: 1px dotted #737a84; padding: 3px 20px; letter-spacing: 2px">E prescription</li>
        <li style="border-bottom: 1px dotted #737a84; padding: 3px 20px; letter-spacing: 2px">Delivery</li>
        <li style="border-bottom: 1px dotted #737a84; padding: 3px 20px; letter-spacing: 2px">Customer care</li>
      </ul>
    </div>
    <div class="one-fourth">
      <h3>Investors</h3>
      <ul style="font-family: Georgia, 'Times New Roman'; margin: 0 15px 0 0">
        <li style="border-bottom: 1px dotted #737a84; border-top: 1px dotted #737a84; padding: 3px 20px; letter-spacing: 2px">Our Customers</li>
        <li style="border-bottom: 1px dotted #737a84; padding: 3px 20px; letter-spacing: 2px">Our suppliers</li>
        <li style="border-bottom: 1px dotted #737a84; padding: 3px 20px; letter-spacing: 2px">Our employees</li>
        <li style="border-bottom: 1px dotted #737a84; padding: 3px 20px; letter-spacing: 2px">Our creditors</li>
      </ul>
    </div>
    <div class="one-fourth">
      <h3>Contact Us</h3>
	  We are located at Gigiri off Limuru Rd.<br />
      Address: P.O.BOX 12345 Nairobi, Kenya<br />
	  Telephone: +254 123 4567 890<br />
	  Mobile: +254 712 345 678<br />
	  Email: info@pharmaglobal.com  
      <div id="social_icons">
	  
	  </div>
    </div>
    <div class="one-fourth last">
      <h3>Socialize</h3>
      <img src="img/icon_fb.png" alt=""> <img src="img/icon_twitter.png" alt=""> <img src="img/icon_in.png" alt=""> </div>
    <div style="clear:both"></div>
	<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
	<p>
	&copy; Copyright 2015 <a href="#" style="color:#333333">PharmaGlobal</a> All Rights Reserved
	</p>
  </div>
</div>
<div id="shadow"></div>
</body>
</html>
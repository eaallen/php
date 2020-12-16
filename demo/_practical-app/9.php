<?php include "functions.php"; ?>
<?php include "includes/header.php";?>



	<section class="content">

		<aside class="col-xs-4">

		<?php Navigation();?>
			
			
		</aside><!--SIDEBAR-->


			<article class="main-content col-xs-8">
			
		
	
	<?php session_start();
	$_SESSION['a'] = "sessions and cookies are cool, its been gr8 to see how these work and learn to do it myself \n";

	/*  Create a link saying Click Here, and set 
	the link href to pass some parameters and use the GET super global to see it

		Step 2 - Set a cookie that expires in one week

		Step 3 - Start a session and set it to value, any value you want.
	*/
	if (isset( $_GET['id'])){
		echo $_GET['id'];
		$name = $_GET['id'];
		$val = $_GET['val'];
		$expiration = time()+(60*60*60);
		// setcookie($name,$val,$expiration);
		if(isset( $_COOKIE[$name])){
			echo "<br/>".$_COOKIE[$name];
		}
	}

	
	?>

	<a href="9.php?id=cookie_name&val=chomp">click here</a>



</article><!--MAIN CONTENT-->
<?php include "includes/footer.php"; ?>